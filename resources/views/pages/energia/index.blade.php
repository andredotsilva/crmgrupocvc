<x-app-layout>
    <x-slot name="header" class="pt-8">
        <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-300 flex-wrap">
            <a href="{{ route('dashboard') }}" class="hover:text-blue-600 dark:hover:text-blue-300">Dashboard</a>
            <span>/</span>
            <a href="{{ route('servicos') }}" class="hover:text-blue-600 dark:hover:text-blue-300">{{ __('Serviços') }}</a>
            <span>/</span>
            <span class="text-blue-600 dark:text-blue-300 font-semibold">{{ __('Energia e Gás') }}</span>
        </div>
        <div class="mt-4 flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Energia & Gás') }}
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Acede rapidamente às campanhas e fornecedores, e filtra os contratos de eletricidade e gás.
                </p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('plans.index') }}"
                    class="inline-flex items-center justify-center rounded-full bg-blue-500 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-blue-600 transition dark:bg-blue-500 dark:hover:bg-blue-600">
                    {{ __('Campanhas') }}
                </a>
                <a href="{{ route('providers.index') }}"
                    class="inline-flex items-center justify-center rounded-full border border-gray-200 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 transition dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                    {{ __('Empresas Fornecedoras') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="bg-slate-100 dark:bg-gray-900 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <section class="rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <header class="border-b border-slate-100 px-6 py-4 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('Filtrar por') }}</h2>
                </header>

                <form id="filters-form" action="{{ route('energia') }}" method="GET" class="px-6 py-6 space-y-6">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                        <div class="flex flex-col gap-1">
                            <label for="cpe" class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">CPE</label>
                            <input id="cpe" name="cpe" type="search"
                                value="{{ request('cpe') }}"
                                class="rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm focus:border-blue-400 focus:outline-none focus:ring dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100">
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="nif" class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">NIF</label>
                            <input id="nif" name="nif" type="search"
                                value="{{ request('nif') }}"
                                class="rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm focus:border-blue-400 focus:outline-none focus:ring dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100">
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="year" class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Ano') }}</label>
                            <input id="year" name="year" type="search"
                                value="{{ request('year') }}"
                                class="rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm focus:border-blue-400 focus:outline-none focus:ring dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100">
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="condominium_administrator" class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                {{ __('ADM de Condomínio') }}
                            </label>
                            <input id="condominium_administrator" name="condominium_administrator" type="search"
                                value="{{ request('condominium_administrator') }}"
                                class="rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm focus:border-blue-400 focus:outline-none focus:ring dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100">
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="status_id" class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Estado') }}</label>
                            <select id="status_id" name="status_id"
                                class="rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm focus:border-blue-400 focus:outline-none focus:ring dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100">
                                <option value="">{{ __('Escolher Estado') }}</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}" @selected(request('status_id') == $status->id)>{{ $status->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-wrap justify-end gap-3">
                        <button type="button" onclick="document.getElementById('filters-form').reset();"
                            class="inline-flex items-center justify-center rounded-full border border-blue-500 px-4 py-2 text-sm font-semibold text-blue-600 hover:border-blue-600 hover:text-blue-700 transition dark:border-blue-400 dark:text-blue-300 dark:hover:border-blue-300 dark:hover:text-blue-200">
                            {{ __('Limpar') }}
                        </button>
                        <button type="submit"
                            class="inline-flex items-center justify-center rounded-full bg-blue-500 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-blue-600 transition dark:bg-blue-500 dark:hover:bg-blue-600">
                            {{ __('Filtrar') }}
                        </button>
                    </div>
                </form>
            </section>

            <section class="rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <header class="border-b border-slate-100 px-6 py-4 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('Contratos de Energia & Gás') }}</h2>
                </header>
                <div class="px-6 py-6 text-gray-900 dark:text-gray-100">
                    <x-table :contracts="$contracts" :contractsCount="$contractsCount" hasPagination="true" />
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
