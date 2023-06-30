<x-app-layout>
    <x-slot name="header" class="pt-8">
        <div class="flex items-center py-4 overflow-x-auto whitespace-nowrap">
            <a href="{{ route('dashboard') }}" class="text-gray-600 dark:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a>

            <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="{{ route('servicos') }}" class="text-gray-600 dark:text-gray-200 hover:underline">
                {{ __('Serviços') }}
            </a>

            <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="{{ route('energia') }}" class="text-gray-600 dark:text-gray-200 hover:underline">
                {{ __('Energia e Gás') }}
            </a>

            <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="{{ route('energia') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                {{ __('Campanhas') }}
            </a>
        </div>
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight pt-4">
            {{ __('Campanhas de Enegergia e Gás') }}
        </h2>
    </x-slot>

    <!--Tables-->
    <div class="p-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="gap-x-6 gap-y-8 sm:grid-cols-6 px-6 pb-2 pt-4 rounded-2xl bg-white dark:bg-gray-800">
                    <div class="pb-4">
                        <a href="{{ route('plans.create') }}" class="pb-4">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md dark:bg-gray-700 dark:hover:bg-gray-900">
                                Inserir Campanha
                            </button>
                        </a>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 pb-4">
                        <thead>
                            <tr>
                                <th
                                    class="py-2 px-4 bg-grey-200 dark:bg-grey-700 border-b border-gray-100 font-bold  text-md text-gray-700 dark:text-gray-200 text-left">
                                    {{ 'ID' }}
                                </th>
                                <th
                                    class="py-2 px-4 bg-grey-200 dark:bg-grey-700 border-b border-gray-100 font-bold  text-md text-gray-700 dark:text-gray-200 text-left">
                                    {{ 'Empresa Associada' }}
                                </th>
                                <th
                                    class="py-2 px-4 bg-grey-200 dark:bg-grey-700 border-b border-gray-100 font-bold  text-md text-gray-700 dark:text-gray-200 text-left">
                                    {{ 'Nome' }}
                                </th>
                                <th
                                    class="py-2 px-4 bg-grey-200 dark:bg-grey-700 border-b border-gray-100 font-bold  text-md text-gray-700  dark:text-gray-200text-right">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- User rows go here -->
                            @foreach ($plans as $plan)
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-600 dark:text-gray-200">
                                        {{ $plan->id }}</td>
                                    <td class="py-2 px-4 border-b border-gray-600 dark:text-gray-200">
                                        @if ($plan->provider_id)
                                            <h4 class="text-blue-600 dark:text-blue-400">
                                                {{ $plan->provider->title }}
                                            </h4>
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 border-b border-gray-600 dark:text-gray-200">
                                        {{ $plan->title }}</td>

                                    <td class="py-2 px-4 border-b border-gray-600 text-right">
                                        <div class="flex items-stretch justify-end gap-x-6">
                                            <a href="#"
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
                                            <form action="#" method="POST">
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
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- tabela so com contratos de gás e eletricidade -->
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
