<x-app-layout>
    @if (session('success'))
        <div class="bg-green-500 text-white px-4 py-2 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <x-slot name="header">
        <nav class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-300 py-2">
            <a href="{{ route('dashboard') }}" class="hover:underline flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                </svg>
                Dashboard
            </a>
            <span>/</span>
            <a href="{{ route('contracts.index') }}" class="hover:underline">
                {{ __('Contratos') }}
            </a>
        </nav>
        <div class="flex justify-between items-center pt-2">
            <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Contratos') }}
            </h2>
            <div class="flex gap-2 items-center">
            @if (auth()->user()->roles()->min('id') != 4)
                <a href="{{ route('contracts.create') }}"
                class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-1 px-2 rounded-md text-sm dark:bg-gray-700">
                {{ __('Inserir Novo Contrato') }}
                </a>
            @endif
            <a href="{{ route('contracts.export', request()->query()) }}"
                class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-1 px-2 rounded-md text-sm dark:bg-gray-700">
                Exportar para Excel
            </a>
            <!-- Button to open modal -->
            <button
                type="button"
                onclick="document.getElementById('uploadCsvModal').classList.remove('hidden')"
                class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-1 px-2 rounded-md text-sm dark:bg-gray-700"
            >
                Carregar CSV
            </button>
            </div>
            <!-- Modal -->
            <div id="uploadCsvModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-md p-6 relative">
                <button
                type="button"
                onclick="document.getElementById('uploadCsvModal').classList.add('hidden')"
                class="absolute top-2 right-2 text-gray-400 hover:text-gray-700 dark:hover:text-gray-200"
                >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                </button>
                <div class="text-gray-900 dark:text-gray-100">
                <form action="{{ route('contracts.uploadCsv') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
                    @csrf
                    <input type="file" name="csv_file" required class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-100 dark:bg-gray-700 dark:border-gray-600 focus:outline-none">
                    <button type="submit" class="bg-blue-400 hover:bg-blue-500 dark:bg-gray-700 text-white font-bold py-2 px-4 rounded-md text-sm">
                    Carregar
                    </button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </x-slot>

    

    {{-- @foreach (Auth()->user()->roles as $role)
        @if (!$role->id === 4) --}}
    @if (auth()->user()->roles()->min('id') != 4)

        <div class="py-4">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="py-4 text-gray-900 dark:text-gray-100">
                        <h4 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Filtrar por:') }}
                        </h4>
                    </div>
                    <form action="{{ route('contracts.index') }}" method="GET" id="dadosorg">
                        <div class="pb-6">
                            <div class="flex flex-wrap gap-4">
                                <!-- CPE -->
                                <div class="flex-1 min-w-[150px]">
                                    <input
                                        class="w-full border-2 border-gray-300 bg-white rounded-lg text-sm focus:outline-none px-3 py-2"
                                        type="search" name="cpe" placeholder="CPE" value="{{ request('cpe') }}">
                                </div>
                                <!-- NIF -->
                                <div class="flex-1 min-w-[150px]">
                                    <input
                                        class="w-full border-2 border-gray-300 bg-white rounded-lg text-sm focus:outline-none px-3 py-2"
                                        type="search" name="nif" placeholder="NIF" value="{{ request('nif') }}">
                                </div>
                                <!-- Ano -->
                                <div class="flex-1 min-w-[150px]">
                                    <input
                                        class="w-full border-2 border-gray-300 bg-white rounded-lg text-sm focus:outline-none px-3 py-2"
                                        type="search" name="year" placeholder="Ano" value="{{ request('year') }}">
                                </div>
                                <!-- Administração de Condominio -->
                                <div class="flex-1 min-w-[200px]">
                                    <input
                                        class="w-full border-2 border-gray-300 bg-white rounded-lg text-sm focus:outline-none px-3 py-2"
                                        type="search" name="administrator_name" placeholder="Administração de Condominio"
                                        value="{{ request('administrator_name') }}">
                                </div>
                                <!-- Status -->
                                <div class="flex-1 min-w-[200px]">
                                    <select name="status_id"
                                        class="w-full rounded-lg border-2 border-gray-300 py-2 text-sm text-gray-900 bg-white dark:bg-gray-700 dark:text-gray-100 focus:outline-none">
                                        <option value="">Escolher Estado da Documentação</option>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}" @if(request('status_id') == $status->id) selected @endif>
                                                {{ $status->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Buttons -->
                                <div class="flex items-center gap-2 ml-auto">
                                    <button type="button" onclick="resetForm()"
                                        class="bg-blue-400 hover:bg-blue-500 dark:bg-gray-700 text-white font-bold py-2 px-3 rounded-md flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eraser mr-1">
                                            <path
                                                d="m7 21-4.3-4.3c-1-1-1-2.5 0-3.4l9.6-9.6c1-1 2.5-1 3.4 0l5.6 5.6c1 1 1 2.5 0 3.4L13 21" />
                                            <path d="M22 21H7" />
                                            <path d="m5 11 9 9" />
                                        </svg>
                                        Limpar
                                    </button>
                                    <button type="submit"
                                        class="bg-blue-400 hover:bg-blue-500 dark:bg-gray-700 text-white font-bold py-2 px-3 rounded-md flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="#FFFFFF" viewBox="0 0 256 256" class="mr-1">
                                            <path
                                                d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z">
                                            </path>
                                        </svg>
                                        Pesquisar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <script>
                        function resetForm() {
                            window.location.href = "{{ route('contracts.index') }}";
                        }
                    </script>
                </div>
            </div>
        </div>
        {{-- @endif
    @endforeach --}}
    @endif
    <div class="py-4">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8" style="margin-bottom: 100px;">
            <div class="sm:rounded-lg">
                <!--<div class=" text-gray-900 dark:text-gray-100">
                    <form action="{{ route('contracts.uploadCsv') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-4">
                        @csrf
                        <input type="file" name="csv_file" required class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-100 dark:bg-gray-700 dark:border-gray-600 focus:outline-none">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 dark:bg-gray-700 text-white font-bold py-2 px-4 rounded-md text-sm">
                            Carregar
                        </button>
                    </form>
                </div>-->
                <div class="text-gray-900 dark:text-gray-100">
                    <x-table :contracts="$contracts" :contractsCount="$contractsCount" hasPagination="true" />

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
