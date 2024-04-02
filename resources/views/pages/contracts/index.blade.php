<x-app-layout>
    @if (session('success'))
        <div class="bg-green-500 text-white px-4 py-2 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <x-slot name="header">
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

            <a href="{{ route('contracts.index') }}" class="text-gray-600 dark:text-gray-200 hover:underline">
                {{ __('Lista de Contratos') }}
            </a>
        </div>
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight pt-4">
            {{ __('Lista de Contratos') }}
        </h2>
    </x-slot>

    <div class="p-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="p-2 text-gray-900 dark:text-gray-100">
                    @if (auth()->user()->roles()->min('id') != 4)
                        <a href="{{ route('contracts.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">{{ __('Inserir Novo Contrato') }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- @foreach (Auth()->user()->roles as $role)
        @if (!$role->id === 4) --}}
    @if (auth()->user()->roles()->min('id') != 4)

        <div class="p-1">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">

                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h4 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Filtrar por:') }}
                        </h4>
                    </div>

                    <form action="{{ route('contracts.index') }}" method="GET">
                        <div class="gap-x-6 gap-y-8 sm:grid-cols-6 px-6 pb-2 rounded-2xl bg-white dark:bg-gray-800"
                            id="dadosorg">
                            <div
                                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                                <!-- Column 1 -->
                                <div class="p-4">
                                    <input
                                        class="border-2 border-gray-300 bg-white rounded-lg text-sm focus:outline-none"
                                        type="search" name="cpe" placeholder="CPE" value="{{ old('cpe') }}">
                                    {{-- <button type="submit" class="absolute right-4 top-0 mt-5">
                                        <svg class="text-gray-600 h-4 w-4 fill-current"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                            x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                            style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                            width="512px" height="512px">
                                            <path
                                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                        </svg>
                                    </button> --}}
                                </div>

                                <div class="p-4">
                                    <input
                                        class="border-2 border-gray-300 bg-white rounded-lg text-sm focus:outline-none"
                                        type="search" name="nif" placeholder="NIF" value="{{ old('nif') }}">
                                    <button type="submit" class="absolute right-4 top-0 mt-5 ">
                                        <svg class="text-gray-600 h-4 w-4 fill-current"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                            x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                            style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                            width="512px" height="512px">
                                            <path
                                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Column 2 -->
                                <div class="p-4">
                                    <input
                                        class="border-2 border-gray-300 bg-white rounded-lg text-sm focus:outline-none"
                                        type="search" name="year" placeholder="Ano" value="{{ old('year') }}">
                                    <button type="submit" class="absolute right-4 top-0 mt-5">
                                        <svg class="text-gray-600 h-4 w-4 fill-current"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                            x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                            style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                            width="512px" height="512px">
                                            <path
                                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                        </svg>
                                    </button>
                                </div>
                                <!-- Column 4 -->
                                <div class="p-4">
                                    <input
                                        class="border-2 border-gray-300 bg-white rounded-lg text-sm focus:outline-none"
                                        type="search" n ame="administrator_name" placeholder="Administração de Condominio"
                                        value="{{ old('administrator_name') }}">
                                    <button type="submit" class="absolute right-4 top-0 mt-5">
                                        <svg class="text-gray-600 h-4 w-4 fill-current"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                            x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                            style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                            width="512px" height="512px">
                                            <path
                                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                        </svg>
                                    </button>
                                </div>
                                <!-- Column 5 -->
                                <div class="p-4">
                                    <select name="status_id"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                        <option value="">Escolher Estado da Documentação</option>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex justify-end gap-1">
                                <div class="mt-2">
                                    <a href="{{ route('contracts.export', request()->query()) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Exportar para Excel</a>

                                </div>

                                <button onclick="resetForm()"
                                    class="bg-gray-300 hover:bg-gray-400 text-white font-bold py-1 px-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eraser">
                                        <path
                                            d="m7 21-4.3-4.3c-1-1-1-2.5 0-3.4l9.6-9.6c1-1 2.5-1 3.4 0l5.6 5.6c1 1 1 2.5 0 3.4L13 21" />
                                        <path d="M22 21H7" />
                                        <path d="m5 11 9 9" />
                                    </svg>
                                </button>
                                <script>
                                    function resetForm() {
                                        document.getElementById('dadosorg').reset();
                                    }
                                </script>
                                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        fill="#FFFFFF" viewBox="0 0 256 256" class="h-8 w-8">
                                        <path
                                            d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- @endif
    @endforeach --}}
    @endif
    <div class="pt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-bottom: 100px;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-table :contracts="$contracts" :contractsCount="$contractsCount" hasPagination="true" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
