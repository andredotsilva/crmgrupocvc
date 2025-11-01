<?php

namespace App\Services;

use App\Models\Contract;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DashboardMetricsService
{
    public const DEFAULT_RANGE = 'month';

    /**
     * @return array<string, string>
     */
    public static function availableRanges(): array
    {
        return [
            'month' => 'Este mês',
            'quarter' => 'Este trimestre',
            'year' => 'Este ano',
            'rolling-30' => 'Últimos 30 dias',
        ];
    }

    /**
     * @param  string|null  $range
     * @return array{
     *     range: string,
     *     current: array{start: Carbon, end: Carbon, label: string},
     *     previous: array{start: Carbon, end: Carbon, label: string}
     * }
     */
    public function resolvePeriod(?string $range): array
    {
        $normalizedRange = array_key_exists($range ?? '', self::availableRanges()) ? $range : self::DEFAULT_RANGE;

        $now = Carbon::now();
        $currentStart = $now->copy();
        $currentEnd = $now->copy();
        $previousStart = $now->copy();
        $previousEnd = $now->copy();

        switch ($normalizedRange) {
            case 'quarter':
                $currentStart = $now->copy()->firstOfQuarter()->startOfDay();
                $currentEnd = $now->copy()->endOfQuarter()->endOfDay();
                $previousStart = $currentStart->copy()->subQuarter()->startOfQuarter()->startOfDay();
                $previousEnd = $previousStart->copy()->endOfQuarter()->endOfDay();
                break;
            case 'year':
                $currentStart = $now->copy()->firstOfYear()->startOfDay();
                $currentEnd = $now->copy()->endOfYear()->endOfDay();
                $previousStart = $currentStart->copy()->subYear()->startOfYear()->startOfDay();
                $previousEnd = $previousStart->copy()->endOfYear()->endOfDay();
                break;
            case 'rolling-30':
                $currentStart = $now->copy()->subDays(29)->startOfDay();
                $currentEnd = $now->copy()->endOfDay();
                $previousEnd = $currentStart->copy()->subDay()->endOfDay();
                $previousStart = $previousEnd->copy()->subDays(29)->startOfDay();
                break;
            case 'month':
            default:
                $currentStart = $now->copy()->firstOfMonth()->startOfDay();
                $currentEnd = $now->copy()->endOfMonth()->endOfDay();
                $previousStart = $currentStart->copy()->subMonth()->startOfMonth()->startOfDay();
                $previousEnd = $previousStart->copy()->endOfMonth()->endOfDay();
                break;
        }

        return [
            'range' => $normalizedRange ?? self::DEFAULT_RANGE,
            'current' => [
                'start' => $currentStart,
                'end' => $currentEnd,
                'label' => $this->formatDateRange($currentStart, $currentEnd),
            ],
            'previous' => [
                'start' => $previousStart,
                'end' => $previousEnd,
                'label' => $this->formatDateRange($previousStart, $previousEnd),
            ],
        ];
    }

    /**
     * @return array{
     *     period: array,
     *     summary: array<string, array<string, mixed>>,
     *     aggregations: array<string, Collection>
     * }
     */
    public function getMetrics(?string $range = null): array
    {
        $period = $this->resolvePeriod($range);

        return [
            'period' => $period,
            'summary' => $this->buildSummary($period),
            'aggregations' => [
                'providers' => $this->buildAggregation($period, 'contracts.provider_id', [
                    ['providers', 'contracts.provider_id', '=', 'providers.id'],
                ], "COALESCE(NULLIF(providers.acronym, ''), NULLIF(providers.title, ''), 'Sem fornecedor')"),
                'services' => $this->buildAggregation($period, 'contracts.service_id', [
                    ['services', 'contracts.service_id', '=', 'services.id'],
                ], "COALESCE(NULLIF(services.title, ''), 'Sem serviço')"),
                'commercials' => $this->buildAggregation($period, 'contracts.commercial_id', [
                    ['users', 'contracts.commercial_id', '=', 'users.id'],
                ], "COALESCE(NULLIF(users.name, ''), 'Sem comercial atribuído')"),
            ],
        ];
    }

    /**
     * @param  array{current: array{start: Carbon, end: Carbon}, previous: array{start: Carbon, end: Carbon}}  $period
     * @return array<string, array<string, mixed>>
     */
    protected function buildSummary(array $period): array
    {
        $currentContracts = $this->countContracts($period['current']['start'], $period['current']['end']);
        $previousContracts = $this->countContracts($period['previous']['start'], $period['previous']['end']);

        $currentCommission = $this->sumCommission($period['current']['start'], $period['current']['end']);
        $previousCommission = $this->sumCommission($period['previous']['start'], $period['previous']['end']);

        $currentNewClients = $this->countNewClients($period['current']['start'], $period['current']['end']);
        $previousNewClients = $this->countNewClients($period['previous']['start'], $period['previous']['end']);

        $currentExpiring = $this->countExpiringContracts($period['current']['start'], $period['current']['end']);
        $previousExpiring = $this->countExpiringContracts($period['previous']['start'], $period['previous']['end']);

        return [
            'contracts' => [
                'label' => 'Contratos criados',
                'current' => $currentContracts,
                'previous' => $previousContracts,
                'trend' => $this->calculateTrend($currentContracts, $previousContracts),
                'is_currency' => false,
            ],
            'commission' => [
                'label' => 'Comissão CVC (€)',
                'current' => $currentCommission,
                'previous' => $previousCommission,
                'trend' => $this->calculateTrend($currentCommission, $previousCommission),
                'is_currency' => true,
            ],
            'new_clients' => [
                'label' => 'Clientes novos',
                'current' => $currentNewClients,
                'previous' => $previousNewClients,
                'trend' => $this->calculateTrend($currentNewClients, $previousNewClients),
                'is_currency' => false,
            ],
            'expiring_contracts' => [
                'label' => 'Contratos a expirar',
                'current' => $currentExpiring,
                'previous' => $previousExpiring,
                'trend' => $this->calculateTrend($currentExpiring, $previousExpiring),
                'is_currency' => false,
            ],
        ];
    }

    protected function countContracts(Carbon $start, Carbon $end): int
    {
        return Contract::query()
            ->whereBetween('contracts.created_at', [$start, $end])
            ->count();
    }

    protected function sumCommission(Carbon $start, Carbon $end): float
    {
        return (float) Contract::query()
            ->leftJoin('commissions', 'contracts.commission_id', '=', 'commissions.id')
            ->whereBetween('contracts.created_at', [$start, $end])
            ->sum('commissions.cvc_paid_amount');
    }

    protected function countNewClients(Carbon $start, Carbon $end): int
    {
        return User::query()
            ->whereBetween('created_at', [$start, $end])
            ->whereHas('roles', function ($query) {
                $query->where('role_id', 4);
            })
            ->count();
    }

    protected function countExpiringContracts(Carbon $start, Carbon $end): int
    {
        return Contract::query()
            ->whereBetween(DB::raw('DATE_ADD(contracts.effective_at, INTERVAL 1 YEAR)'), [$start, $end])
            ->count();
    }

    /**
     * @param  array{current: array{start: Carbon, end: Carbon}, previous: array{start: Carbon, end: Carbon}}  $period
     * @param  string  $groupColumn
     * @param  array<int, array<int, string>>  $joins
     * @param  string  $labelExpression
     * @return Collection<int, array<string, mixed>>
     */
    protected function buildAggregation(array $period, string $groupColumn, array $joins, string $labelExpression): Collection
    {
        $current = $this->aggregateForRange($period['current']['start'], $period['current']['end'], $groupColumn, $joins, $labelExpression);
        $previous = $this->aggregateForRange($period['previous']['start'], $period['previous']['end'], $groupColumn, $joins, $labelExpression)
            ->keyBy('label');

        return $current->map(function (array $item) use ($previous) {
            $previousItem = $previous->get($item['label'], [
                'total_contracts' => 0,
                'total_commission' => 0.0,
            ]);

            $item['previous_contracts'] = $previousItem['total_contracts'] ?? 0;
            $item['previous_commission'] = $previousItem['total_commission'] ?? 0.0;
            $item['trend'] = $this->calculateTrend($item['total_contracts'], $item['previous_contracts']);

            return $item;
        });
    }

    /**
     * @param  Carbon  $start
     * @param  Carbon  $end
     * @param  string  $groupColumn
     * @param  array<int, array<int, string>>  $joins
     * @param  string  $labelExpression
     * @return Collection<int, array<string, mixed>>
     */
    protected function aggregateForRange(Carbon $start, Carbon $end, string $groupColumn, array $joins, string $labelExpression): Collection
    {
        $query = Contract::query()
            ->from('contracts')
            ->leftJoin('commissions', 'contracts.commission_id', '=', 'commissions.id');

        foreach ($joins as $join) {
            $query->leftJoin($join[0], $join[1], $join[2], $join[3]);
        }

        $results = $query
            ->whereBetween('contracts.created_at', [$start, $end])
            ->selectRaw("{$groupColumn} as grouping_key")
            ->selectRaw("{$labelExpression} as label")
            ->selectRaw('COUNT(contracts.id) as total_contracts')
            ->selectRaw('SUM(CASE WHEN contracts.status_id = 1 THEN 1 ELSE 0 END) as active_contracts')
            ->selectRaw('COALESCE(SUM(commissions.cvc_paid_amount), 0) as total_commission')
            ->groupBy('grouping_key', 'label')
            ->orderByDesc('total_contracts')
            ->limit(10)
            ->get();

        return $results->map(function ($row) {
            return [
                'label' => $row->label,
                'total_contracts' => (int) $row->total_contracts,
                'active_contracts' => (int) $row->active_contracts,
                'total_commission' => (float) $row->total_commission,
            ];
        });
    }

    protected function calculateTrend(float|int $current, float|int $previous): ?float
    {
        if ((float) $previous === 0.0) {
            if ((float) $current === 0.0) {
                return 0.0;
            }

            return 100.0;
        }

        return round((($current - $previous) / $previous) * 100, 1);
    }

    protected function formatDateRange(Carbon $start, Carbon $end): string
    {
        return $start->translatedFormat('d M Y') . ' - ' . $end->translatedFormat('d M Y');
    }
}
