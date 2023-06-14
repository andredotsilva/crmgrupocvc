<x-app-layout>
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

            <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="{{ route('contracts.create') }}" class="text-gray-600 dark:text-gray-200 hover:underline">
                {{ __('Inserir Novo Contrato') }}
            </a>

        </div>
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight pt-4">
            {{ __('Inserir Novo Contrato') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex" style="margin-bottom: 100px;">

                <!-- Fixed sidebar -->
                <div class="w-64 pt-12 ">
                    <div class=" py-1">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full dark:bg-gray-700"
                            onclick="scrollToSection('backoffice')">
                            Back Office
                        </button>
                    </div>
                    <div class="py-1">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full dark:bg-gray-700"
                            onclick="scrollToSection('dadosorganizacao')">
                            Dados Organização
                        </button>
                    </div>
                    <div class="py-1">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full dark:bg-gray-700"
                            onclick="scrollToSection('dadoscontador')">
                            Dados Contador
                        </button>
                    </div>
                    <div class="py-1">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full dark:bg-gray-700"
                            onclick="scrollToSection('consumos')">
                            Consumos
                        </button>
                    </div>
                    <div class="py-1">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full dark:bg-gray-700"
                            onclick="scrollToSection('datascontrato')">
                            Datas Contrato
                        </button>
                    </div>
                    <div class="py-1">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full dark:bg-gray-700"
                            onclick="scrollToSection('dadoscliente')">
                            Dados Cliente
                        </button>
                    </div>
                    <div class="py-1">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full dark:bg-gray-700"
                            onclick="scrollToSection('pagamento')">
                            Forma Pagamento
                        </button>
                    </div>
                    <div class="py-1">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full dark:bg-gray-700"
                            onclick="scrollToSection('dadoscorespondencia')">
                            Dados Correspondência
                        </button>
                        </a>
                    </div>
                    <div class="py-1">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full dark:bg-gray-700"
                            onclick="scrollToSection('assinatura')">
                            Assinatura
                        </button>
                    </div>
                    <div class="py-1">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full dark:bg-gray-700"
                            onclick="scrollToSection('comissoesdatas')">
                            Comissões e Datas
                        </button>
                    </div>
                    <div class="py-1">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full dark:bg-gray-700"
                            onclick="scrollToSection('comissoesmensais')">
                            Comissões Mensais
                        </button>
                    </div>

                    <div class="py-1">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full dark:bg-gray-700"
                            onclick="scrollToSection('documentacao')">
                            Documentação
                        </button>
                    </div>
                </div>
                <!-- Scroll wrapper -->
                <div class="flex-1 overflow-hidden overflow-y-scroll scrollbar-hidden" id="scrollableColumn"
                    style="max-height: 600px">
                    <!-- Scrollable container -->
                    <!-- Your content -->
                    <form action="{{ route('contracts.store') }}" method="POST" style="margin-bottom: 40px;">
                        @csrf
                        <div class="space-y-12 ">
                            <div class="border-b border-gray-900/10 pb-12">
                                <!--Dados Back Office-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800"
                                    id="backoffice">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">Back Office</h1>
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-2">
                                            <label for="provider"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Back
                                                Office</label>
                                            <div class="mt-2">
                                                <select name="back_officer_id"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                                    <option value="">Escolha</option>
                                                    @foreach ($backofficers as $backofficer)
                                                        <option value="{{ $backofficer->id }}"
                                                            {{ old('backofficer') == $backofficer->id || $backofficer->id == auth()->id() ? 'selected' : '' }}>
                                                            {{ $backofficer->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="commercial_id"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Código
                                                Comerciante</label>
                                            <div class="mt-2">
                                                <input type="text" name="commercial_id" id="commercial_id"
                                                    autocomplete="given-name"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="provider"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Nome
                                                Comercial</label>
                                            <div class="mt-2">
                                                <select name="commercial_id"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                                    <option value="">Escolha</option>
                                                    @foreach ($commercials as $commercial)
                                                        <option value="{{ $commercial->id }}"
                                                            {{ old('commercial') == $commercial->id || $commercial->id == auth()->id() ? 'selected' : '' }}>
                                                            {{ $commercial->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="sm:col-span-2">
                                            <label for="service_id"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Serviço</label>
                                            <div class="mt-2">
                                                <select id="service_id" name="service_id"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                                    @foreach ($services as $service)
                                                        <option value="{{ $service->id }}">
                                                            {{ $service->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="category_id"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Soluções</label>
                                            <div class="mt-2">
                                                <select id="category_id" name="category_id"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="client_type_id"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Tipo
                                                de Adesão</label>
                                            <div class="mt-2">
                                                <select id="client_type_id" name="client_type_id"
                                                    autocomplete="tariff"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                                    @foreach ($clientTypes as $clientType)
                                                        <option value="{{ $clientType->id }}">
                                                            {{ $clientType->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="cod-contador"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Cliente
                                                / Administrador</label>
                                            <div class="mt-2">
                                                <input type="text" name="administrator_name" id="cod-contador"
                                                    autocomplete="given-name"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="cod-contador"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Administração
                                                de Condominio</label>
                                            <div class="mt-2">
                                                <input type="text" name="condominium_administrator"
                                                    id="cod-contador" autocomplete="given-name"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Dados ORGANIZAÇÃO-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="dadosorganizacao">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">DADOS DA ORGANIZAÇÃO</h1>
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-2">
                                            <label for="provider"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Adesão</label>
                                            <div class="mt-2">
                                                <select id="provider" name="provider_id"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                                    @foreach ($providers as $provider)
                                                        <option value="{{ $provider->id }}"> {{ $provider->acronym }}
                                                            -
                                                            {{ $provider->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="plan_id"
                                                class="block text-sm font-medium leading-6 text-gray-900">Campanha</label>
                                            <div class="mt-2">
                                                <select id="plan_id" name="plan_id"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                                    @foreach ($plans as $plan)
                                                        <option value="{{ $plan->id }}"> {{ $plan->acronym }} -
                                                            {{ $plan->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="documentation_status_id"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Documentação</label>
                                            <div class="mt-2">
                                                <select id="documentation_status_id" name="documentation_status_id"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                                    @foreach ($documentationStatus as $documentationStatus)
                                                        <option value="{{ $documentationStatus->id }}">
                                                            {{ $documentationStatus->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="archive"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Arquivo
                                                do Cliente</label>
                                            <div class="mt-2">
                                                <input type="text" name="archive" id="archive"
                                                    autocomplete="archive"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Dados Contador-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="dadoscontador">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">DADOS Contador</h1>
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-2">
                                            <label for="tariff"
                                                class="block text-sm font-medium leading-6 text-gray-900">Tenção</label>
                                            <div class="mt-2">
                                                <select id="tariff" name="tariff_id" autocomplete="tariff"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                                    @foreach ($tariffs as $tariff)
                                                        <option value="{{ $tariff->id }}">{{ $tariff->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="nif"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">NIF</label>
                                            <div class="mt-2">
                                                <input type="nif" name="nif" id="nif"
                                                    autocomplete="nif" oninput="validateNIF(this)"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>

                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="cpe"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">CPE/CUI</label>
                                            <div class="mt-2">
                                                <input type="text" name="cpe" id="cpe"
                                                    autocomplete="cpe"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            {{-- <label for="power"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Potência/Escalão</label>
                                            <div class="mt-2">
                                                <input type="text" name="power" id="power"
                                                    autocomplete="power" value="{{ old('power') }}"
                                                    class="form-control @error('power') is-invalid @enderror format-number block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                    placeholder="0,00" oninput="formatarNumero(this)">
                                            </div> --}}
                                            <div class="sm:col-span-2">
                                                <label for="power"
                                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                    Potência/Escalão
                                                </label>
                                                <div class="mt-2">
                                                    <input type="text" name="power" id="power"
                                                        class="format-number block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                        placeholder="0,00" oninput="formatarNumero(this)">
                                                </div>
                                            </div>
                                            @error('power')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!--END Dados Contador-->

                                <!--Consumos-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="consumos">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">Consumos</h1>
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                        <div class="sm:col-span-2">
                                            <label for="flat"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Simples</label>
                                            <div class="mt-2">
                                                <input type="number" name="flat" id="flat"
                                                    autocomplete="flat"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="peak"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Pontas</label>
                                            <div class="mt-2">
                                                <input type="number" name="peak" id="peak"
                                                    autocomplete="peak"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="standard"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Cheias</label>
                                            <div class="mt-2">
                                                <input type="number" name="standard" id="standard"
                                                    autocomplete="standard"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="off_peak"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Vazio</label>
                                            <div class="mt-2">
                                                <input type="number" name="off_peak" id="off_peak"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="super_off_peak"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Super
                                                Vazio</label>
                                            <div class="mt-2">
                                                <input type="number" name="super_off_peak" id="super_off_peak"
                                                    autocomplete="super_off-peak"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="radio-group" class="text-gray-700">Gás:</label>
                                            <div class="mt-2 flex space-x-4">
                                                <label class="inline-flex items-center">
                                                    <input type="radio" class="form-radio text-indigo-600"
                                                        name="gas" value="1">
                                                    <span class="ml-2">1</span>
                                                </label>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" class="form-radio text-indigo-600"
                                                        name="gas" value="2">
                                                    <span class="ml-2">2</span>
                                                </label>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" class="form-radio text-indigo-600"
                                                        name="gas" value="3">
                                                    <span class="ml-2">3</span>
                                                </label>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" class="form-radio text-indigo-600"
                                                        name="gas" value="4">
                                                    <span class="ml-2">4</span>
                                                </label>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <!--END Consumos-->

                                <!--Datas Contrato-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="datascontrato">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">Datas de contrato</h1>
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-2">
                                            <label for="inserted_at"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Inserido</label>
                                            <div class="mt-2">
                                                <input type="date" name="inserted_at" id="inserted_at"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="signed_at"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Assinado</label>
                                            <div class="mt-2">
                                                <input type="date" name="signed_at" id="signed_at"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="effective_at"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Alta</label>
                                            <div class="mt-2">
                                                <input type="date" name="effective_at" id="effective_at"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="renewal_at"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Renovação</label>
                                            <div class="mt-2">
                                                @php
                                                    $renewalAt = isset($renewalAt) ? date('Y-m-d', strtotime($renewalAt)) : '';
                                                @endphp
                                                <input type="date" name="renewal_at" id="renewal_at"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600"
                                                    value="{{ $renewalAt }}">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!--Dados Cliente-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="dadoscliente">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">Dados Cliente</h1>
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                        <div class="sm:col-span-2">
                                            <label for="cae"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">CAE</label>
                                            <div class="mt-2">
                                                <input type="number" name="cae" id="cae"
                                                    autocomplete="cae"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="name"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Nome
                                                Cliente</label>
                                            <div class="mt-2">
                                                <input type="text" name="name" id="name"
                                                    autocomplete="name"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="address"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Morada
                                                De Fornecimento</label>
                                            <div class="mt-2">
                                                <input type="text" name="address" id="address"
                                                    autocomplete="address"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="floor"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Andar/Fração</label>
                                            <div class="mt-2">
                                                <input type="text" name="floor" id="floor"
                                                    autocomplete="floor"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="post_code"
                                                class="block text-sm font-medium leading-6 text-gray-900">Codigo
                                                Postal</label>
                                            <div class="mt-2">
                                                <select id="post_code" name="post_code" autocomplete="post_code"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                                    <option>4000-011</option>
                                                    <option>4000-211</option>
                                                    <option>4000-445</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="dmp_code"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Codigo
                                                Freguesia</label>
                                            <div class="mt-2">
                                                <input type="number" name="dmp_code" id="dmp_code"
                                                    autocomplete="dmp_code"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="district_id"
                                                class="block text-sm font-medium leading-6 text-gray-900">Distrito</label>
                                            <div class="mt-2">
                                                <select id="district_id" name="district_id"
                                                    autocomplete="district_id"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}">{{ $district->title }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="municipality_id"
                                                class="block text-sm font-medium leading-6 text-gray-900">Concelho</label>
                                            <div class="mt-2">
                                                <select id="municipality_id" name="municipality_id"
                                                    autocomplete="municipality_id"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                                    <option value="" selected>Escolher Concelho</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="parish_id"
                                                class="block text-sm font-medium leading-6 text-gray-900">Freguesia</label>
                                            <div class="mt-2">
                                                <select id="parish_id" name="parish_id" autocomplete="parish_id"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                                    <option value="" selected>Escolher Freguesia</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--END Dados Cliente-->

                                <!--Forma Pagamento-->
                                <section id="pagamento">
                                    <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                        id="pagamento">
                                        <h1 class="text-lg pb-4 dark:text-gray-200">Forma de Pagamento</h1>
                                        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                            <div class="sm:col-span-2">
                                                <label for="nif"
                                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">NIB</label>
                                                <div class="mt-2">
                                                    <input type="number" name="nib" id="nif"
                                                        autocomplete="nif"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="invoice_type_id"
                                                    class="block text-sm font-medium leading-6 text-gray-900">Fatura</label>
                                                <div class="mt-2">
                                                    <select id="invoice_type_id" name="invoice_type_id"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                                        @foreach ($invoiceTypes as $invoiceType)
                                                            <option value="{{ $invoiceType->id }}">
                                                                {{ $invoiceType->title }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!--END Forma Pagamento-->

                                <!--Dados Correspondência-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="dadoscorespondencia">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">Dados de Correspondência</h1>
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                        <div class="sm:col-span-2">
                                            <label for="nif"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Morada</label>
                                            <div class="mt-2">
                                                <input type="nif" name="address" id="nif"
                                                    autocomplete="nif"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="nif"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Nº
                                                Porta</label>
                                            <div class="mt-2">
                                                <input type="nif" name="door" id="nif"
                                                    autocomplete="nif"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="nif"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Codigo
                                                Postal</label>
                                            <div class="mt-2">
                                                <input type="text" name="mail_postal_code" id="mail_postal_code"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600"
                                                    oninput="postCodeFormatter(this)"
                                                    onblur="postCodeValidator(this)">
                                                <span id="mail_postal_code_error" style="color: red;"></span>
                                            </div>

                                            <script>
                                                function postCodeValidator(input) {
                                                    var postalCode = input.value.trim().replace('-', ''); // Remover o traço (-) do código postal
                                                    var postCodeError = document.getElementById('mail_postal_code_error');
                                                    var regex = /^\d{4}\d{3}$/;

                                                    if (!regex.test(postalCode)) {
                                                        postCodeError.textContent = 'Formato inválido. Digite no formato XXXX-XXX';
                                                    } else if (!/^\d+$/.test(postalCode)) {
                                                        postCodeError.textContent = 'Digite apenas números no código postal';
                                                    } else {
                                                        postCodeError.textContent = '';
                                                    }
                                                }

                                                function postCodeFormatter(input) {
                                                    var postCode = input.value.trim().replace(/[-\s]/g, '');
                                                    var formattedPostCode = '';

                                                    if (postCode.length > 7) {
                                                        postCode = postCode.substring(0, 7);
                                                    }

                                                    if (postCode.length <= 4) {
                                                        formattedPostCode = postCode;
                                                    } else if (postCode.length <= 7) {
                                                        formattedPostCode = postCode.substring(0, 4) + "-" + postCode.substring(4, 7);
                                                    }
                                                    input.value = formattedPostCode;
                                                }
                                            </script>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="nif"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Freguesia</label>
                                            <div class="mt-2">
                                                <input type="nif" name="mail_parish_id" id="nif"
                                                    autocomplete="nif"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="nif"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Concelho</label>
                                            <div class="mt-2">
                                                <input type="nif" name="mail_municipality_id" id="nif"
                                                    autocomplete="nif"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="nif"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Distrito</label>
                                            <div class="mt-2">
                                                <input type="nif" name="mail_district_id" id="nif"
                                                    autocomplete="nif"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="nif"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Email</label>
                                            <div class="mt-2">
                                                <input type="nif" name="email" id="email"
                                                    autocomplete="email"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="nif"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Contacto
                                                Telefónico</label>
                                            <div class="mt-2">
                                                <input type="tel" name="phone_number" id="nif"
                                                    autocomplete="nif"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="nif"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">NIF
                                                Responsável</label>
                                            <div class="mt-2">
                                                <input type="nif" name="nif" id="nif"
                                                    autocomplete="nif"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--END Dados Correspondência-->

                                <!--Assinatura-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="assinatura">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">Assinatura</h1>
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                        <div class="sm:col-span-2">
                                            <label for="nif"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Email
                                                Assinatura</label>
                                            <div class="mt-2">
                                                <input type="nif" name="signatory_email" id="nif"
                                                    autocomplete="nif"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="nif"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Contacto
                                                Assinatura</label>
                                            <div class="mt-2">
                                                <input type="nif" name="signatory_phone" id="nif"
                                                    autocomplete="nif"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--END Assinatura-->

                                <!--Comissões-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="comissoesdatas">
                                    <h1 class="text-md pb-4 dark:text-gray-200">Comissões, Data de Pagamento e
                                        Devoluções</h1>
                                    <div class="grid grid-cols-3 gap-4">
                                        <div>
                                            <h3 class="text-lg pb-4 dark:text-gray-200">Comissões Administrador</h3>
                                            <div class="sm:col-span-2">
                                                <label for="nif"
                                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                    Valor Pago ao Administrador</label>
                                                <div class="mt-2">
                                                    <input type="text" name="administrator_paid_amount"
                                                        id="administrator_paid_amount"
                                                        class="format-number block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                        placeholder="0,00" oninput="formatarNumero(this)">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="nif"
                                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                    Data Pagamento ao Administrador</label>
                                                <div class="mt-2">
                                                    <input type="date" name="nif" id="nif"
                                                        autocomplete="nif"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600 dark:focus:border-blue-500">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="nif"
                                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                    Devolução ao Administrador</label>
                                                <div class="mt-2">
                                                    <input type="nif" name="nif" id="nif"
                                                        autocomplete="nif"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600 dark:focus:border-blue-500">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="nif"
                                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                    Data Devolução ao Administrador</label>
                                                <div class="mt-2">
                                                    <input type="date" name="administrator_payment_date"
                                                        id="nif" autocomplete="nif"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600 dark:focus:border-blue-500">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="text-md pb-4 dark:text-gray-200">Comissões Comercial</h3>
                                            <div class="sm:col-span-2">
                                                <label for="nif"
                                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                    Valor Pago ao Comercial</label>
                                                <div class="mt-2">
                                                    <input type="text" name="commercial_paid_amount"
                                                        id="commercial_paid_amount"
                                                        class="format-number block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                        placeholder="0,00" oninput="formatarNumero(this)">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="nif"
                                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                    Data Pagamento ao Comercial</label>
                                                <div class="mt-2">
                                                    <input type="date" name="commercial_payment_date"
                                                        id="nif" autocomplete="nif"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600 dark:focus:border-blue-500">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="nif"
                                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                    Devolução ao Comercial</label>
                                                <div class="mt-2">
                                                    <input type="nif" name="nif" id="nif"
                                                        autocomplete="nif"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600 dark:focus:border-blue-500">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="nif"
                                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                    Data Devolução ao Comercial</label>
                                                <div class="mt-2">
                                                    <input type="date" name="nif" id="nif"
                                                        autocomplete="nif"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600 dark:focus:border-blue-500">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="text-md pb-4 dark:text-gray-200">Comissões CVC</h3>
                                            <div class="sm:col-span-2">
                                                <label for="nif"
                                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                    Valor Pago ao CVC</label>
                                                <div class="mt-2">
                                                    <input type="text" name="cvc_paid_amount" id="cvc_paid_amount"
                                                        class="format-number block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                        placeholder="0,00" oninput="formatarNumero(this)">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="nif"
                                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                    Data Pagamento ao CVC</label>
                                                <div class="mt-2">
                                                    <input type="date" name="cvc_payment_date" id="nif"
                                                        autocomplete="nif"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600 dark:focus:border-blue-500">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="nif"
                                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                    Devolução ao CVC</label>
                                                <div class="mt-2">
                                                    <input type="nif" name="nif" id="nif"
                                                        autocomplete="nif"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600 dark:focus:border-blue-500">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="nif"
                                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                    Data Devolução ao CVC</label>
                                                <div class="mt-2">
                                                    <input type="date" name="nif" id="nif"
                                                        autocomplete="nif"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600 dark:focus:border-blue-500">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--END Comissões-->

                                <div
                                    class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800">
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8">
                                        <div class="sm:col-span-4">
                                            <label for="message"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Observações</label>
                                            <div class="mt-2">
                                                <textarea id="message" rows="4" name="text"
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:dark:bg-gray-600 dark:focus:border-blue-500"
                                                    placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <!-- Adicione mais elementos aqui, se necessário -->
                                    </div>
                                </div>
                                <!--comissões mensais-->
                                @php
                                    $values = [
                                        '01_12' => 'amount_01_12',
                                        '02_12' => 'amount_02_12',
                                        '03_12' => 'amount_03_12',
                                        '04_12' => 'amount_04_12',
                                        '05_12' => 'amount_05_12',
                                        '06_12' => 'amount_06_12',
                                        '07_12' => 'amount_07_12',
                                        '08_12' => 'amount_08_12',
                                        '09_12' => 'amount_09_12',
                                        '10_12' => 'amount_10_12',
                                        '11_12' => 'amount_11_12',
                                        '12_12' => 'amount_12_12',
                                    ];
                                @endphp
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="comissoesmensais">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">Comissões Mensais</h1>
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        @foreach ($values as $label => $name)
                                            <div class="sm:col-span-1">
                                                <label for="{{ $name }}"
                                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">{{ $label }}</label>
                                                <div class="mt-2">
                                                    <input type="number" name="{{ $name }}"
                                                        id="{{ $name }}"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!--END comissões mensais-->

                                <!--Ficheiros-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="documentacao">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">Inserir Ficheiros</h1>
                                    <div class="sm:col-span-2">
                                        <div class="mt-2">
                                            <input type="file" class="filepond" name="filepond" multiple
                                                data-allow-reorder="true" data-max-file-size="3MB"
                                                data-max-files="5">
                                        </div>
                                    </div>
                                </div>
                                <!--END Ficheiros-->
                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="button"
                                class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button>
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function formatarNumero(input) {
        let numero = input.value.replace(/[^\d,]/g, ''); // Remove caracteres não numéricos, exceto vírgula
        let partes = numero.split(','); // Separa a parte inteira da parte decimal

        // Remove todos os espaços da parte inteira
        partes[0] = partes[0].replace(/\s/g, '');

        // Formata a parte inteira com espaços como separador de milhares
        partes[0] = partes[0].replace(/\B(?=(\d{3})+(?!\d))/g, ' ');

        // Limita a parte decimal a dois dígitos
        if (partes.length > 1) {
            partes[1] = partes[1] ? partes[1].slice(0, 2) : ''; // Verifica se há parte decimal
        }

        // Atualiza o valor do input com o número formatado
        input.value = partes.join(',') + (partes.length > 1 ? ',' : '');
    }

    // Adiciona evento para limitar o número de vírgulas nos campos "Valor Pago ao Administrador" e "Valor Pago ao Comercial"
    document.getElementById('administrator_paid_amount').addEventListener('input', function() {
        let partes = this.value.split(',');

        if (partes.length > 2) {
            partes.splice(2);
            this.value = partes.join(',');
        }
    });

    document.getElementById('commercial_paid_amount').addEventListener('input', function() {
        let partes = this.value.split(',');

        if (partes.length > 2) {
            partes.splice(2);
            this.value = partes.join(',');
        }
    });

    document.getElementById('cvc_paid_amount').addEventListener('input', function() {
        let partes = this.value.split(',');

        if (partes.length > 2) {
            partes.splice(2);
            this.value = partes.join(',');
        }
    });

    document.getElementById('power').addEventListener('input', function() {
        let partes = this.value.split(',');

        if (partes.length > 2) {
            partes.splice(2);
            this.value = partes.join(',');
        }
    });
</script>

<script>
    document.getElementById('district_id').addEventListener('change', function() {
        var state = document.getElementById('municipality_id');
        var url = "{{ route('municipality.index') }}";
        var params = "district_id=" + encodeURIComponent(this.value);

        fetch(url + '?' + params)
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Houve um erro na solicitação AJAX.');
                }
            })
            .then(function(data) {
                state.innerHTML = '<option value="" selected>Escolher Concelho</option>';
                for (var id in data) {
                    if (data.hasOwnProperty(id)) {
                        var value = data[id].title;
                        var option = document.createElement('option');
                        option.value = data[id].id;
                        option.innerHTML = value;
                        state.appendChild(option);
                    }
                }
            })
            .catch(function(error) {
                console.error(error);
            });

        document.getElementById('municipality_id').value = "";
        document.getElementById('parish_id').value = "";
    });

    document.getElementById('municipality_id').addEventListener('change', function() {
        var $parish = document.getElementById('parish_id');
        var url = "{{ route('parish.index') }}";
        var mparams = "municipality_id=" + encodeURIComponent(this.value);

        console.log(mparams);

        fetch(url + '?' + mparams)
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Houve um erro na solicitação AJAX.');
                }
            })
            .then(function(data) {
                console.log(data);
                $parish.innerHTML = '<option value="" selected>Escolher Freguesia</option>';

                for (var id in data) {
                    if (data.hasOwnProperty(id)) {
                        var title = data[id].title;
                        var option = document.createElement('option');
                        option.value = data[id].id;
                        option.innerHTML = title;
                        $parish.appendChild(option);
                    }
                }
            })
            .catch(function(error) {
                console.error(error);
            });
    });
</script>

<script>
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[type="file"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);

    FilePond.setOptions({
        server: {
            url: '/upload',
            revert: '/destroy',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
    });
</script>

<script>
    function scrollToSection(sectionId) {
        const section = document.getElementById(sectionId);
        const scrollableColumn = document.getElementById('scrollableColumn');

        scrollableColumn.scrollTop = section.offsetTop - scrollableColumn.offsetTop;
        section.scrollIntoView({
            behavior: 'smooth'
        });
    }

    const scrollableColumn = document.getElementById('scrollableColumn');
    scrollableColumn.addEventListener('wheel', (event) => {
        event.preventDefault();
        scrollableColumn.scrollTop += event.deltaY;
    });
</script>
