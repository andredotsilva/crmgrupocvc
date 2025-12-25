<?php

namespace App\Console\Commands;

use App\Services\DashboardMetricsService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class SendDashboardReport extends Command
{
    protected $signature = 'dashboard:send-report {--range=}';

    protected $description = 'Gera um relatório CSV com as métricas principais do dashboard';

    public function __construct(
        protected DashboardMetricsService $dashboardMetrics
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        $range = $this->option('range');
        $metrics = $this->dashboardMetrics->getMetrics($range);

        $handle = fopen('php://temp', 'w+');
        fputcsv($handle, ['Secção', 'Nome', 'Contratos', 'Ativos', 'Comissão (€)', 'Variação (%)']);

        foreach (['providers', 'services', 'commercials'] as $segment) {
            foreach ($metrics['aggregations'][$segment] as $row) {
                fputcsv($handle, [
                    $segment,
                    $row['label'],
                    $row['total_contracts'],
                    $row['active_contracts'],
                    number_format($row['total_commission'], 2, ',', '.'),
                    $row['trend'],
                ]);
            }
        }

        rewind($handle);
        $content = stream_get_contents($handle) ?: '';
        fclose($handle);

        $path = sprintf(
            'reports/dashboard-%s-%s.csv',
            $metrics['period']['range'],
            now()->format('YmdHis')
        );

        Storage::put($path, $content);

        $this->info("Relatório gerado em storage/app/{$path}");

        return Command::SUCCESS;
    }
}
