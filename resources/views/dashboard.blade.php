<x-app-layout>
    <x-slot name="header" class="pt-8">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

   
    <!--Tables-->
    <div class="px-10 py-10 ">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 leading-tight flex justify-between items-center">
            <div class="overflow-hidden sm:rounded-lg">

                <div class="leading-tight flex justify-between items-center px-4 py-4">
                    <div class="flex justify-left">
                        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Contratos</h2>
                        <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-md dark:bg-gray-600 dark:text-gray-200">
                            {{ $contractsCount }}
                        </span>
                    </div>
                    
                    <div class="justify-right">
                        @if (auth()->user()->roles()->min('id') != 4)
                        <a href="{{ route('contracts.create') }}"
                        class="w-[100%] bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-md dark:bg-gray-700">{{ __('Inserir Novo Contrato') }}</a>
                        @endif
                        <a href="{{ route('contracts.index') }}"
                        class="w-[100%] bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-md dark:bg-gray-700">{{ __('Ver todos') }}</a>
                    
                    </div>
                </div>

                <div class="text-black dark:text-gray-100">
                    <x-table :contracts="$contracts" :contractsCount="$contractsCount" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
