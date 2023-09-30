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

            <a href="{{ route('cae.index') }}" class="text-gray-600 dark:text-gray-200 hover:underline">
                {{ __('Codigos CAE') }}
            </a>
        </div>

        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight pt-4">
            {{ __('Inserir Codigo CAE') }}
        </h2>
        
    </x-slot>



    <!--Tables-->
    <div class="p-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden  sm:rounded-lg">
                <div class="gap-x-6 gap-y-8 sm:grid-cols-6 px-6 pb-2 pt-4 rounded-2xl bg-white dark:bg-gray-800">
                    <div class="max-w-md mx-auto bg-white rounded-md p-6 dark:bg-gray-800">
                        <h2 class="text-lg font-semibold mb-4 dark:text-gray-200">Inserir Codigo CAE:</h2>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('cae.store') }}">
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2 dark:text-gray-200" for="text">Código:</label>
                                <input type="number" id="code" name="code" required
                                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2 dark:text-gray-200" for="text">Nome
                                    da Código:</label>
                                <input type="text" id="title" name="title" required
                                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
                            </div>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md">{{ __('Guardar') }}</button>
                        </form>
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- tabela so com contratos de gás e eletricidade -->
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
