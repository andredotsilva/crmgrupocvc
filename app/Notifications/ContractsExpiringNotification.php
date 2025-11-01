<?php

namespace App\Notifications;

use App\Models\Contract;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ContractsExpiringNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected Contract $contract,
        protected string $expiryDate
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'contract_expiring',
            'contract_id' => $this->contract->id,
            'contract_code' => strtoupper(substr($this->contract->id, 0, 8)),
            'client_name' => $this->contract->client?->administrator_name ?? $this->contract->client?->name,
            'provider' => $this->contract->provider?->acronym ?? $this->contract->provider?->title,
            'expiry_date' => $this->expiryDate,
            'message' => __('Contrato expira em :date', ['date' => $this->expiryDate]),
        ];
    }
}
