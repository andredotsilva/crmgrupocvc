<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Services\DashboardMetricsService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        protected DashboardMetricsService $dashboardMetrics
    ) {
    }

    public function index(Request $request)
    {
        $range = $request->string('range')->toString();
        $metrics = $this->dashboardMetrics->getMetrics($range);

        $contracts = Contract::query()
            ->with(['client', 'provider'])
            ->orderByDesc('updated_at')
            ->limit(10)
            ->get();

        return view('dashboard', [
            'contracts' => $contracts,
            'metrics' => $metrics,
            'range' => $metrics['period']['range'],
            'availableRanges' => DashboardMetricsService::availableRanges(),
            'contractsCount' => $metrics['summary']['contracts']['current'],
        ]);
    }

    public function export(Request $request, string $segment)
    {
        $range = $request->string('range')->toString();
        $metrics = $this->dashboardMetrics->getMetrics($range);
        $availableSegments = [
            'providers' => 'Fornecedores',
            'services' => 'Serviços',
            'commercials' => 'Comerciais',
        ];

        abort_unless(array_key_exists($segment, $availableSegments), 404);

        $dataset = $metrics['aggregations'][$segment] ?? collect();
        $filename = sprintf(
            'dashboard-%s-%s-%s.csv',
            $segment,
            $metrics['period']['range'],
            now()->format('YmdHis')
        );

        $headers = [
            'Content-Type' => 'text/csv',
        ];

        $callback = static function () use ($dataset) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Nome', 'Contratos', 'Ativos', 'Comissão (€)', 'Variação (%)']);
            foreach ($dataset as $row) {
                fputcsv($handle, [
                    $row['label'],
                    $row['total_contracts'],
                    $row['active_contracts'],
                    number_format($row['total_commission'], 2, ',', '.'),
                    $row['trend'],
                ]);
            }
            fclose($handle);
        };

        return response()->streamDownload($callback, $filename, $headers);
    }
}
