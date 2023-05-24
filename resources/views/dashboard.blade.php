<x-app-layout>
    <x-slot name="header" class="pt-8">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2 bg-slate-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- component -->
            <div class="flex items-center text-gray-800">
                <div class="p-4 w-full">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6 md:col-span-3">
                            <div class="flex flex-row bg-white shadow-sm rounded-lg p-4 dark:bg-gray-800 dark:text-blue-400">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex flex-col flex-grow ml-4">
                                    <div class="text-sm text-gray-500 dark:text-slate-400">Utilizadores</div>
                                    <div class="font-bold text-lg">1259</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-3">
                            <div class="flex flex-row bg-white shadow-sm rounded-lg p-4 dark:bg-gray-800 dark:text-blue-400">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-green-100 text-green-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                </div>
                                <div class="flex flex-col flex-grow ml-4">
                                    <div class="text-sm text-gray-500 dark:text-slate-400">Contratos</div>
                                    <div class="font-bold text-lg">{{ $contractsCount }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-3">
                            <div class="flex flex-row bg-white shadow-sm rounded-lg p-4 dark:bg-gray-800 dark:text-blue-400">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-orange-100 text-orange-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex flex-col flex-grow ml-4">
                                    <div class="text-sm text-gray-500 dark:text-slate-400">Dados a Inserir</div>
                                    <div class="font-bold text-lg">190</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-3">
                            <div class="flex flex-row bg-white shadow-sm rounded-lg p-4 dark:bg-gray-800 dark:text-blue-400">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-red-100 text-red-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex flex-col flex-grow ml-4">
                                    <div class="text-sm text-gray-500 dark:text-slate-400">Dados a Inserir</div>
                                    <div class="font-bold text-lg">32</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Tables-->
    <div class="p-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('contracts.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">{{ __('Inserir Novo Contrato') }}</a>
                    <a href="{{ route('contracts.index') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">{{ __('Ver todos') }}</a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-table :contracts="$contracts" :contractsCount="$contractsCount" />
                </div>
            </div>
        </div>
    </div>

    <div class="p-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto">
                        <div class="grid grid-cols-3 gap-3 p-4">
                            <div>
                                <div class="max-w-sm rounded overflow-hidden shadow-lg rounded-lg">
                                    <div class="px-6 py-4">
                                        <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                                        <p class="text-gray-700 text-base dark:text-slate-400">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia,
                                            nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                                        </p>
                                    </div>
                                    <div class="px-6 pt-4 pb-2">
                                        <button
                                            class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                            Primary
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- ... -->
                            <div>
                                <div class="max-w-sm rounded overflow-hidden shadow-lg rounded-lg">
                                    <div class="px-6 py-4">
                                        <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                                        <p class="text-gray-700 text-base dark:text-slate-400">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia,
                                            nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                                        </p>
                                    </div>
                                    <div class="px-6 pt-4 pb-2">
                                        <button
                                            class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                            Primary
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="max-w-sm rounded overflow-hidden shadow-lg rounded-lg">
                                    <div class="px-6 py-4">
                                        <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                                        <p class="text-gray-700 text-base dark:text-slate-400">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia,
                                            nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                                        </p>
                                    </div>
                                    <div class="px-6 pt-4 pb-2">
                                        <button
                                            class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                            Primary
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Footer container-->
<footer class="fixed bottom-0 left-0 right-0">
      
    <div class="flex items-center p-6 bg-white text-gray-800 dark:bg-gray-800 h-12">
        <div><p class="text-black dark:text-blue-400 text-xs">© 2023 Copyright: Desenvolvido pela </p></div>
        <div class="mx-2"><a class="text-black dark:text-blue-400 text-xs" href="https://caseof.pt/"
            >CaseOf Creative Agency</a
          ></div>
      </div>
  </footer>

</x-app-layout>
