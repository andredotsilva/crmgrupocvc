<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard - Lista de Contratos') }}
        </h2>
    </x-slot>

    <div class="p-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('contracts.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">{{ __('Inserir Novo Contrato') }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="p-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- <x-table :contracts="$contracts" :contractsCount="$contractsCount" /> --}}
                    <x-table />
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
