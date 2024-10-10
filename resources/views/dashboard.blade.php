<x-app-layout>
    <x-slot name="header" class="pt-8">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2 bg-slate-100 dark:bg-gray-800">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <!-- component -->
            @if (auth()->user()->roles()->min('id') != 4)
                <div class="flex items-center text-gray-800">
                    <div class="p-4 w-full">
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                <div
                                    class="flex flex-row bg-white shadow-sm rounded-lg p-4 dark:bg-gray-700 dark:text-blue-400">
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            fill="#000000" viewBox="0 0 256 256">
                                            <path
                                                d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212ZM128,176a32,32,0,1,0-32-32A32,32,0,0,0,128,176ZM72,120a8,8,0,0,0-8-8A24,24,0,1,1,87.24,82a8,8,0,1,0,15.5-4A40,40,0,1,0,37,117.51,67.94,67.94,0,0,0,9.6,139.19a8,8,0,1,0,12.8,9.61A51.6,51.6,0,0,1,64,128,8,8,0,0,0,72,120Z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-sm text-gray-500 dark:text-slate-400">Clientes</div>
                                        <div class="font-bold text-lg">{{ $clientsCount }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                <div
                                    class="flex flex-row bg-white shadow-sm rounded-lg p-4 dark:bg-gray-700 dark:text-blue-400">
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-green-100 text-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            fill="#000000" viewBox="0 0 256 256">
                                            <path
                                                d="M213.66,66.34l-40-40A8,8,0,0,0,168,24H88A16,16,0,0,0,72,40V56H56A16,16,0,0,0,40,72V216a16,16,0,0,0,16,16H168a16,16,0,0,0,16-16V200h16a16,16,0,0,0,16-16V72A8,8,0,0,0,213.66,66.34ZM168,216H56V72h76.69L168,107.31v84.53c0,.06,0,.11,0,.16s0,.1,0,.16V216Zm32-32H184V104a8,8,0,0,0-2.34-5.66l-40-40A8,8,0,0,0,136,56H88V40h76.69L200,75.31Zm-56-32a8,8,0,0,1-8,8H88a8,8,0,0,1,0-16h48A8,8,0,0,1,144,152Zm0,32a8,8,0,0,1-8,8H88a8,8,0,0,1,0-16h48A8,8,0,0,1,144,184Z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-sm text-gray-500 dark:text-slate-400">Contratos</div>
                                        <div class="font-bold text-lg">{{ $contractsCount }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                <div
                                    class="flex flex-row bg-white shadow-sm rounded-lg p-4 dark:bg-gray-700 dark:text-blue-400">
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-orange-100 text-orange-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            fill="#000000" viewBox="0 0 256 256">
                                            <path
                                                d="M225.86,102.82c-3.77-3.94-7.67-8-9.14-11.57-1.36-3.27-1.44-8.69-1.52-13.94-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52-3.56-1.47-7.63-5.37-11.57-9.14C146.28,23.51,138.44,16,128,16s-18.27,7.51-25.18,14.14c-3.94,3.77-8,7.67-11.57,9.14C88,40.64,82.56,40.72,77.31,40.8c-9.76.15-20.82.31-28.51,8S41,67.55,40.8,77.31c-.08,5.25-.16,10.67-1.52,13.94-1.47,3.56-5.37,7.63-9.14,11.57C23.51,109.72,16,117.56,16,128s7.51,18.27,14.14,25.18c3.77,3.94,7.67,8,9.14,11.57,1.36,3.27,1.44,8.69,1.52,13.94.15,9.76.31,20.82,8,28.51s18.75,7.85,28.51,8c5.25.08,10.67.16,13.94,1.52,3.56,1.47,7.63,5.37,11.57,9.14C109.72,232.49,117.56,240,128,240s18.27-7.51,25.18-14.14c3.94-3.77,8-7.67,11.57-9.14,3.27-1.36,8.69-1.44,13.94-1.52,9.76-.15,20.82-.31,28.51-8s7.85-18.75,8-28.51c.08-5.25.16-10.67,1.52-13.94,1.47-3.56,5.37-7.63,9.14-11.57C232.49,146.28,240,138.44,240,128S232.49,109.73,225.86,102.82Zm-11.55,39.29c-4.79,5-9.75,10.17-12.38,16.52-2.52,6.1-2.63,13.07-2.73,19.82-.1,7-.21,14.33-3.32,17.43s-10.39,3.22-17.43,3.32c-6.75.1-13.72.21-19.82,2.73-6.35,2.63-11.52,7.59-16.52,12.38S132,224,128,224s-9.15-4.92-14.11-9.69-10.17-9.75-16.52-12.38c-6.1-2.52-13.07-2.63-19.82-2.73-7-.1-14.33-.21-17.43-3.32s-3.22-10.39-3.32-17.43c-.1-6.75-.21-13.72-2.73-19.82-2.63-6.35-7.59-11.52-12.38-16.52S32,132,32,128s4.92-9.15,9.69-14.11,9.75-10.17,12.38-16.52c2.52-6.1,2.63-13.07,2.73-19.82.1-7,.21-14.33,3.32-17.43S70.51,56.9,77.55,56.8c6.75-.1,13.72-.21,19.82-2.73,6.35-2.63,11.52-7.59,16.52-12.38S124,32,128,32s9.15,4.92,14.11,9.69,10.17,9.75,16.52,12.38c6.1,2.52,13.07,2.63,19.82,2.73,7,.1,14.33.21,17.43,3.32s3.22,10.39,3.32,17.43c.1,6.75.21,13.72,2.73,19.82,2.63,6.35,7.59,11.52,12.38,16.52S224,124,224,128,219.08,137.15,214.31,142.11ZM120,136V80a8,8,0,0,1,16,0v56a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,172Z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-sm text-gray-500 dark:text-slate-400">Contratos a Expirar</div>
                                        <div class="font-bold text-lg">{{ $contractsFinishing }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                <div
                                    class="flex flex-row bg-white shadow-sm rounded-lg p-4 dark:bg-gray-700 dark:text-blue-400">
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
                                        <div class="text-sm text-gray-500 dark:text-slate-400">CPEs em alta</div>
                                        <div class="font-bold text-lg">{{$alta}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!--Tables-->
    <div class="px-10">
        <div class=" max-w-screen-xl mx-auto sm:px-6 lg:px-8 leading-tight flex justify-between items-center">
            <div class="overflow-hidden sm:rounded-lg">

                <div class="leading-tight flex justify-between items-center px-4 py-4">
                    <div class="flex justify-left">
                        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Contratos</h2>
                        <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-600 dark:text-gray-200">
                            {{ $contractsCount }}
                        </span>
                    </div>
                    
                    <div class="justify-right">
                        @if (auth()->user()->roles()->min('id') != 4)
                        <a href="{{ route('contracts.create') }}"
                        class="w-[100%] bg-blue-300 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-full dark:bg-gray-700">{{ __('Inserir Novo Contrato') }}</a>
                        @endif
                        <a href="{{ route('contracts.index') }}"
                        class="w-[100%] bg-blue-300 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-full dark:bg-gray-700">{{ __('Ver todos') }}</a>
                    
                    </div>
                </div>

                <div class="text-black dark:text-gray-100">
                    <x-table :contracts="$contracts" :contractsCount="$contractsCount" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
