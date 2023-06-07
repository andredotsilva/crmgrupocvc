<x-app-layout>
    <x-slot name="header" class="pt-8">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Serviços') }}
        </h2>
    </x-slot>

    <div class="py-2 bg-slate-100 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- component -->
            <div class="min-w-screen  bg-gray-100 flex items-center justify-center bg-gray-100">
                <div class="max-w-7xl w-full mx-auto py-6 sm:px-6 lg:px-8">
                    <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">

                        <div class="w-full lg:w-1/4">
                            <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-blue-400">
                                <div class="flex items-center">
                                    <div class="icon w-14 p-3.5 bg-blue-400 text-white rounded-full mr-3">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <div class="text-xl text-gray-700">
                                            <a href="{{ route('energia') }}">
                                                {{ __('Energia e Gás') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full lg:w-1/4">
                            <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-yellow-400">
                                <div class="flex items-center">
                                    <div class="icon w-14 p-3.5 bg-yellow-400 text-white rounded-full mr-3">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <div class="text-xl text-gray-700">
                                            <a href="{{ route('servicos') }}">
                                                {{ __('Inserir Serviço') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    

</x-app-layout>
