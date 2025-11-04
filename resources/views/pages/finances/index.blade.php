<x-app-layout>
    <x-slot name="header">
        <nav class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-300 py-2">
            <a href="{{ route('dashboard') }}" class="hover:underline flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                Dashboard
            </a>
            <span>/</span>
            <span class="font-medium text-gray-700 dark:text-gray-100">
                {{ __('Finanças') }}
            </span>
        </nav>

        <div class="flex justify-between items-center pt-2">
            <div>
                <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Resumo Financeiro') }}
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Acompanhe clientes e desempenho financeiro.') }}
                </p>
            </div>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-500 text-white px-4 py-2 rounded-md">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="py-4">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <section class="rounded-2xl bg-white dark:bg-gray-800 shadow-sm border border-gray-100 dark:border-gray-700">
                    <div class="px-6 py-6">
                        <div class="flex flex-col gap-6">
                            <div class="flex flex-col gap-2">
                                <h3 class="font-semibold text-gray-800 dark:text-gray-100 text-base">
                                    {{ __('Indicadores de Finanças') }}
                                </h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ __('Visão rápida sobre clientes e provedores.') }}
                                </p>
                            </div>

                            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                                <div class="rounded-xl border border-gray-100 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 shadow-sm">
                                    <p class="text-xs uppercase tracking-wide text-gray-400">{{ __('Clientes') }}</p>
                                    <p class="mt-1 text-2xl font-semibold text-gray-800 dark:text-gray-100">{{ $clients->count() }}</p>
                                </div>
                                <div class="rounded-xl border border-gray-100 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 shadow-sm">
                                    <p class="text-xs uppercase tracking-wide text-gray-400">{{ __('Comissões por Provedor') }}</p>
                                    <p class="mt-1 text-2xl font-semibold text-gray-800 dark:text-gray-100">{{ count($commissionsByProvider) }}</p>
                                </div>
                                <div class="rounded-xl border border-gray-100 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 shadow-sm">
                                    <p class="text-xs uppercase tracking-wide text-gray-400">{{ __('Contratos por Cliente') }}</p>
                                    <p class="mt-1 text-2xl font-semibold text-gray-800 dark:text-gray-100">{{ number_format($clients->avg('contracts_count') ?? 0, 1) }}</p>
                                </div>
                                <div class="rounded-xl border border-gray-100 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 shadow-sm">
                                    <p class="text-xs uppercase tracking-wide text-gray-400">{{ __('Lucro Total (Estimado)') }}</p>
                                    <p class="mt-1 text-2xl font-semibold text-gray-800 dark:text-gray-100">€{{ number_format(collect($commissionsByProvider)->sum('totalCompanyProfit') / 100, 2, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8" style="margin-bottom: 40px;">
            <div class="sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 rounded-2xl bg-white dark:bg-gray-900 shadow-sm">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wide">{{ __('Cliente') }}</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wide">{{ __('Contratos') }}</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wide">{{ __('Administrador do Condomínio') }}</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wide">{{ __('Email') }}</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wide">{{ __('Ações') }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-800">
                                @forelse ($clients as $client)
                                    <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-800/80">
                                        <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">
                                            <div class="flex flex-col">
                                                <span class="font-semibold">{{ $client->name }}</span>
                                                <span class="text-xs text-gray-500 dark:text-gray-400">{{ $client->client->name ?? __('Sem registo de cliente') }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ $client->contracts_count }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ $client->client->condominium_administrator ?? __('Sem informação') }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ $client->email ?? __('Sem email') }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">
                                            <div class="flex justify-end gap-3">
                                                <a href="{{ route('finances.showContractsByClient', $client->id) }}" class="inline-flex items-center justify-center rounded-md border border-blue-500 px-3 py-1 text-xs font-medium text-blue-600 hover:bg-blue-50 dark:text-blue-300 dark:hover:bg-blue-500/20">
                                                    {{ __('Ver contratos') }}
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-6 text-center text-sm text-gray-500 dark:text-gray-400">
                                            {{ __('Sem clientes associados a finanças.') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8" style="margin-bottom: 100px;">
            <section class="rounded-2xl bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 shadow-sm">
                <div class="px-6 py-6">
                    <h3 class="font-semibold text-gray-800 dark:text-gray-100 text-base mb-4">{{ __('Comissões por Provedor') }}</h3>
                    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                        @forelse($commissionsByProvider as $providerData)
                            <article class="rounded-xl border border-gray-100 dark:border-gray-700 bg-white dark:bg-gray-900 px-5 py-4 shadow-sm">
                                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ $providerData['name'] }}</h4>
                                <dl class="mt-3 space-y-1 text-sm text-gray-600 dark:text-gray-300">
                                    <div class="flex justify-between">
                                        <dt>{{ __('Pago à CVC') }}</dt>
                                        <dd>€{{ number_format($providerData['totalPaidToCVC'] / 100, 2, ',', '.') }}</dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt>{{ __('Pago aos Administradores') }}</dt>
                                        <dd>€{{ number_format($providerData['totalPaidToAdministrators'] / 100, 2, ',', '.') }}</dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt>{{ __('Pago aos Comerciais') }}</dt>
                                        <dd>€{{ number_format($providerData['totalPaidToCommercials'] / 100, 2, ',', '.') }}</dd>
                                    </div>
                                    <div class="flex justify-between font-semibold text-gray-800 dark:text-gray-100">
                                        <dt>{{ __('Lucro da Empresa') }}</dt>
                                        <dd>€{{ number_format($providerData['totalCompanyProfit'] / 100, 2, ',', '.') }}</dd>
                                    </div>
                                </dl>
                            </article>
                        @empty
                            <div class="col-span-full rounded-xl border border-dashed border-gray-200 dark:border-gray-700 px-6 py-10 text-center text-sm text-gray-500 dark:text-gray-400">
                                {{ __('Sem dados de comissões disponíveis.') }}
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
