<x-app-layout>
    <x-slot name="header" class="pt-8">
        <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-300 flex-wrap">
            <a href="{{ route('dashboard') }}" class="hover:text-blue-600 dark:hover:text-blue-300">Dashboard</a>
            <span>/</span>
            <a href="{{ route('servicos') }}" class="hover:text-blue-600 dark:hover:text-blue-300">{{ __('Serviços') }}</a>
            <span>/</span>
            <a href="{{ route('energia') }}" class="hover:text-blue-600 dark:hover:text-blue-300">{{ __('Energia e Gás') }}</a>
            <span>/</span>
            <span class="text-blue-600 dark:text-blue-300 font-semibold">{{ __('Provedores') }}</span>
        </div>
        <div class="mt-4 flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Provedores de Energia e Gás') }}
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Consulta todos os fornecedores registados e gere a informação de forma rápida.
                </p>
            </div>
            <a href="{{ route('providers.create') }}"
               class="inline-flex items-center justify-center rounded-full bg-blue-500 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-blue-600 transition dark:bg-blue-500 dark:hover:bg-blue-600">
                {{ __('Inserir Provedor') }}
            </a>
        </div>
    </x-slot>

    <div class="bg-slate-100 dark:bg-gray-900 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <section class="rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <header class="border-b border-slate-100 px-6 py-4 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('Lista de Provedores') }}</h2>
                </header>

                <div class="px-6 py-6 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700 dark:divide-gray-700 dark:text-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-900">
                            <tr>
                                <th scope="col" class="py-3 px-4 text-left font-semibold uppercase tracking-wide">{{ __('ID') }}</th>
                                <th scope="col" class="py-3 px-4 text-left font-semibold uppercase tracking-wide">{{ __('Acrónimo') }}</th>
                                <th scope="col" class="py-3 px-4 text-left font-semibold uppercase tracking-wide">{{ __('Nome') }}</th>
                                <th scope="col" class="py-3 px-4 text-right font-semibold uppercase tracking-wide">{{ __('Ações') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($providers as $provider)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-900/40 transition">
                                    <td class="py-3 px-4 font-semibold text-gray-900 dark:text-gray-100">{{ $provider->id }}</td>
                                    <td class="py-3 px-4">{{ $provider->acronym }}</td>
                                    <td class="py-3 px-4">{{ $provider->title }}</td>
                                    <td class="py-3 px-4 text-right">
                                        <div class="flex items-center justify-end gap-3">
                                            <a href="{{ route('providers.edit', $provider->id) }}"
                                               class="inline-flex items-center gap-2 rounded-full border border-yellow-400 px-3 py-1 text-xs font-semibold text-yellow-500 hover:bg-yellow-50 transition dark:border-yellow-500 dark:text-yellow-300 dark:hover:bg-yellow-500/10">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                                <span>{{ __('Editar') }}</span>
                                            </a>
                                            <form action="{{ route('providers.destroy', $provider->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center gap-2 rounded-full border border-red-400 px-3 py-1 text-xs font-semibold text-red-500 hover:bg-red-50 transition dark:border-red-500 dark:text-red-300 dark:hover:bg-red-500/10">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                    <span>{{ __('Excluir') }}</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-6 px-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                        {{ __('Nenhum provedor registado.') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
