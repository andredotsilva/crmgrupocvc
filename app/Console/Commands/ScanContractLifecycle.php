<?php

namespace App\Console\Commands;

use App\Models\Contract;
use App\Models\User;
use App\Notifications\ContractsExpiringNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ScanContractLifecycle extends Command
{
    protected $signature = 'contracts:scan-lifecycle';

    protected $description = 'Gera notificações para eventos do ciclo de vida dos contratos';

    public function handle(): void
    {
        $this->line('A analisar contratos com expiração iminente...');

        $today = Carbon::today();
        $threshold = $today->copy()->addDays(30);

        $contracts = Contract::query()
            ->with(['provider', 'client', 'backofficer', 'commercial'])
            ->where(function ($query) use ($today, $threshold) {
                $query->whereBetween('renewal_at', [$today->toDateString(), $threshold->toDateString()])
                    ->orWhere(function ($inner) use ($today, $threshold) {
                        $inner->whereNull('renewal_at')
                            ->whereNotNull('effective_at')
                            ->whereBetween(DB::raw('DATE_ADD(effective_at, INTERVAL 1 YEAR)'), [$today->toDateString(), $threshold->toDateString()]);
                    });
            })
            ->get();

        if ($contracts->isEmpty()) {
            $this->info('Nenhum contrato a expirar dentro de 30 dias.');
            return;
        }

        $adminUsers = User::query()
            ->whereHas('roles', fn ($query) => $query->whereIn('role_id', [1]))
            ->get();

        $generated = 0;

        foreach ($contracts as $contract) {
            $expiryDate = $contract->renewal_at
                ? Carbon::parse($contract->renewal_at)
                : ($contract->effective_at ? Carbon::parse($contract->effective_at)->addYear() : null);

            if (! $expiryDate) {
                continue;
            }

            $recipients = $this->gatherRecipients($contract, $adminUsers);

            foreach ($recipients as $user) {
                if ($this->notificationExists($user, $contract->id, $expiryDate)) {
                    continue;
                }

                $user->notify(new ContractsExpiringNotification($contract, $expiryDate->format('d/m/Y')));
                $generated++;
            }
        }

        $this->info("Notificações geradas: {$generated}");
    }

    /**
     * @return \Illuminate\Support\Collection<int, \App\Models\User>
     */
    protected function gatherRecipients(Contract $contract, Collection $adminUsers): Collection
    {
        $recipients = collect();

        if ($contract->backofficer) {
            $recipients->push($contract->backofficer);
        }

        if ($contract->commercial) {
            $recipients->push($contract->commercial);
        }

        return $recipients
            ->merge($adminUsers)
            ->unique(fn ($user) => $user->id)
            ->values();
    }

    protected function notificationExists(User $user, string $contractId, Carbon $expiryDate): bool
    {
        return DB::table('notifications')
            ->where('notifiable_id', $user->getKey())
            ->where('notifiable_type', get_class($user))
            ->where('type', ContractsExpiringNotification::class)
            ->whereNull('read_at')
            ->where('data', 'like', '%"contract_id":"' . $contractId . '"%')
            ->where('data', 'like', '%"expiry_date":"' . $expiryDate->format('d/m/Y') . '"%')
            ->exists();
    }
}
