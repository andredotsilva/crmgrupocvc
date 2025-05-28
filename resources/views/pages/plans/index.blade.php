<x-app-layout>
    <x-slot name="header">
        <nav class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-300 py-2">
            <a href="{{ route('dashboard') }}" class="hover:underline flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                </svg>
                Dashboard
            </a>
            <span>/</span>
            <a href="{{ route('servicos') }}" class="hover:underline">Serviços</a>
            <span>/</span>
            <a href="{{ route('energia') }}" class="hover:underline">Energia e Gás</a>
            <span>/</span>
            <span class="text-gray-600 dark:text-gray-200">{{ __('Campanhas') }}</span>
        </nav>
        <div class="flex justify-between items-center pt-2">
            <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Campanhas de Energia e Gás') }}
            </h2>
            <div>
                <a href="{{ route('plans.create') }}"
                   class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-1 px-2 rounded-md text-sm dark:bg-gray-700">
                    Inserir Campanha
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8" style="padding-bottom: 100px;">
            <div class="overflow-hidden">
                <div class="inline-block min-w-full py-2 align-middle">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 dark:text-gray-400">ID</th>
                                    <th class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 dark:text-gray-400">Empresa Associada</th>
                                    <th class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 dark:text-gray-400">Nome da Campanha</th>
                                    <th class="py-3.5 px-4 text-sm font-normal text-right text-gray-500 dark:text-gray-400"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                @foreach ($plans as $plan)
                                    <tr>
                                        <td class="px-4 py-4 text-sm text-gray-700 dark:text-gray-300 whitespace-nowrap">
                                            {{ $plan->id }}
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-700 dark:text-gray-300 whitespace-nowrap">
                                            @if ($plan->provider_id)
                                                <span class="text-blue-600 dark:text-blue-400">
                                                    {{ $plan->provider->title }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-700 dark:text-gray-300 whitespace-nowrap">
                                            {{ $plan->title }}
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap text-right">
                                            <div class="flex items-center gap-x-6 justify-end">
                                                <a href="{{ route('plans.edit', $plan->id) }}"
                                                    class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                                                    <button>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                        </svg>
                                                    </button>
                                                </a>
                                                <form action="{{ route('plans.destroy', $plan->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- Pagination (if needed) --}}
                        {{-- <div class="flex items-center justify-between mt-6 px-4 pb-4">
                            {{ $plans->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
