<x-app-layout>
    <x-slot name="header" class="pt-8">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-slate-100 dark:bg-gray-900">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            @if (auth()->user()->roles()->min('id') != 4)
                <div class="space-y-6 text-gray-800 dark:text-gray-100">
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                        <div>
                            <p class="text-base font-semibold text-gray-700 dark:text-gray-100">
                                Período atual:
                                <span class="font-normal text-gray-600 dark:text-gray-300">
                                    {{ $metrics['period']['current']['label'] }}
                                </span>
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Comparado com {{ $metrics['period']['previous']['label'] }}
                            </p>
                        </div>
                        <form method="GET" action="{{ route('dashboard') }}"
                              class="flex items-center gap-3 bg-white dark:bg-gray-800 px-4 py-2 rounded-lg shadow-sm">
                            <label for="range" class="text-sm font-medium text-gray-600 dark:text-gray-300">
                                Período
                            </label>
                            <select id="range" name="range"
                                    class="border-gray-200 dark:border-gray-700 dark:bg-gray-900 text-sm rounded-md"
                                    onchange="this.form.submit()">
                                @foreach ($availableRanges as $value => $label)
                                    <option value="{{ $value }}" @selected($value === $range)>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
                        @foreach ($metrics['summary'] as $card)
                            @php
                                $currentValue = $card['is_currency']
                                    ? number_format($card['current'], 2, ',', '.')
                                    : number_format($card['current'], 0, ',', '.');
                                $previousValue = $card['is_currency']
                                    ? number_format($card['previous'], 2, ',', '.')
                                    : number_format($card['previous'], 0, ',', '.');
                                $trend = $card['trend'] ?? 0;
                                $trendClass = $trend >= 0 ? 'text-green-600' : 'text-red-600';
                                $trendPrefix = $trend > 0 ? '+' : '';
                            @endphp
                            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-5 border border-slate-100 dark:border-gray-700">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                            {{ $card['label'] }}
                                        </p>
                                        <p class="mt-2 text-2xl font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $currentValue }}
                                        </p>
                                    </div>
                                    <span class="text-xs font-semibold {{ $trendClass }}">
                                        {{ $trendPrefix . number_format($trend, 1, ',', '.') }}%
                                    </span>
                                </div>
                                <p class="mt-3 text-xs text-gray-500 dark:text-gray-400">
                                    Período anterior: {{ $previousValue }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

        <div class="px-6 lg:px-10 pb-8">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden sm:rounded-lg bg-white dark:bg-gray-800 shadow">
                    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between px-4 py-4">
                        <div class="flex items-center gap-3">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                Contratos (últimas atualizações)
                            </h2>
                            <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-700 dark:text-blue-200">
                                {{ number_format($contractsCount, 0, ',', '.') }}
                            </span>
                        </div>
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:gap-2">
                            @if (auth()->user()->roles()->min('id') != 4)
                                <a href="{{ route('contracts.create') }}"
                                   class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full shadow transition">
                                    {{ __('Inserir Novo Contrato') }}
                                </a>
                            @endif
                            <a href="{{ route('contracts.index') }}"
                               class="inline-flex items-center justify-center bg-blue-100 hover:bg-blue-200 text-blue-700 font-semibold py-2 px-4 rounded-full transition">
                                {{ __('Ver todos') }}
                            </a>
                        </div>
                    </div>

                    <div class="text-black dark:text-gray-100">
                        <x-table :contracts="$contracts" :contractsCount="$contractsCount" />
                    </div>
                </div>
            </div>
        </div>

        

    @if (auth()->user()->roles()->min('id') != 4)
        <div class="px-6 lg:px-10 pb-12">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
                    @php
                        $aggregationTitles = [
                            'providers' => 'Desempenho por fornecedor',
                            'services' => 'Desempenho por serviço',
                            'commercials' => 'Desempenho por comercial',
                        ];
                    @endphp

                    @foreach ($aggregationTitles as $segment => $title)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-slate-100 dark:border-gray-700 p-6">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ $title }}</h3>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Top 10 · {{ $metrics['period']['current']['label'] }}
                                    </p>
                                </div>
                                <a href="{{ route('dashboard.export', ['segment' => $segment, 'range' => $range]) }}"
                                   class="text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400">
                                    Exportar
                                </a>
                            </div>
                            <div class="mt-4 overflow-x-auto">
                                <table class="min-w-full text-sm text-left">
                                    <thead class="text-xs uppercase text-gray-500 dark:text-gray-400">
                                        <tr>
                                            <th class="py-2 pr-4 font-medium">Nome</th>
                                            <th class="py-2 pr-4 font-medium text-right">Contratos</th>
                                            <th class="py-2 pr-4 font-medium text-right">Ativos</th>
                                            <th class="py-2 pr-4 font-medium text-right">Comissão (€)</th>
                                            <th class="py-2 font-medium text-right">Δ %</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                        @forelse ($metrics['aggregations'][$segment] as $row)
                                            @php
                                                $rowTrend = $row['trend'] ?? 0;
                                                $rowTrendClass = $rowTrend >= 0 ? 'text-green-600' : 'text-red-600';
                                                $rowTrendPrefix = $rowTrend > 0 ? '+' : '';
                                            @endphp
                                            <tr>
                                                <td class="py-3 pr-4 font-medium text-gray-700 dark:text-gray-200">
                                                    {{ $row['label'] }}
                                                </td>
                                                <td class="py-3 pr-4 text-right text-gray-700 dark:text-gray-200">
                                                    {{ number_format($row['total_contracts'], 0, ',', '.') }}
                                                </td>
                                                <td class="py-3 pr-4 text-right text-gray-500 dark:text-gray-400">
                                                    {{ number_format($row['active_contracts'], 0, ',', '.') }}
                                                </td>
                                                <td class="py-3 pr-4 text-right text-gray-700 dark:text-gray-200">
                                                    {{ number_format($row['total_commission'], 2, ',', '.') }}
                                                </td>
                                                <td class="py-3 text-right {{ $rowTrendClass }}">
                                                    {{ $rowTrendPrefix . number_format($rowTrend, 1, ',', '.') }}%
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="py-6 text-center text-gray-400 dark:text-gray-500">
                                                    Sem dados para o período selecionado.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
