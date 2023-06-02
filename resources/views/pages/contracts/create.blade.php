<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard - Inserir Novo Contrato') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <ul class="grid grid-flow-col text-center text-gray-500 rounded-full pt-20">
                <li>
                    <a href="#backofficesection"
                        class="flex justify-center bg-white rounded-full shadow text-indigo-900 py-2">Back Office
                    </a>
                </li>
                <li>
                    <a href="#dadosorg"
                        class="flex justify-center bg-white rounded-full shadow text-indigo-900 py-2">Dados Organização
                    </a>
                </li>
                <li>
                    <a href="#dadoscontador"
                        class="flex justify-center bg-white rounded-full shadow text-indigo-900 py-2">Dados Contador</a>
                </li>
                <li>
                    <a href="#dadoscliente"
                        class="flex justify-center bg-white rounded-full shadow text-indigo-900 py-2">Dados Cliente</a>
                </li>
                <li>
                    <a href="#pagamento"
                        class="flex justify-center bg-white rounded-full shadow text-indigo-900 py-2">Forma
                        Pagamento</a>
                </li>
                <li>
                    <a href="#corespondencia"
                        class="flex justify-center bg-white rounded-full shadow text-indigo-900 py-2">Correspondência</a>
                </li>
                <li>
                    <a href="#assinatura"
                        class="flex justify-center bg-white rounded-full shadow text-indigo-900 py-2">Assinatura</a>
                </li>
                <li>
                    <a href="#comissoes"
                        class="flex justify-center bg-white rounded-full shadow text-indigo-900 py-2">Comissões - Data
                        Pagamento</a>
                </li>
            </ul>

            <form action="{{ route('contracts.store') }}" method="POST">
                @csrf
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <!--Dados Back Office-->
                        <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800"
                            id="backofficesection">
                            <h1 class="text-lg pb-4 dark:text-gray-200">Back Office</h1>
                            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-2">
                                    <label for="cod-contador"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">BO</label>
                                    <div class="mt-2">
                                        <input type="text" name="back_officer_id" id="cod-contador"
                                            autocomplete="given-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="cod-contador"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Código
                                        Comerciante</label>
                                    <div class="mt-2">
                                        <input type="text" name="commercial_id" id="cod-contador"
                                            autocomplete="given-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nome
                                        Comercial</label>
                                    <div class="mt-2">
                                        <select id="name" name="name" autocomplete="name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">

                                            @foreach ($comercials as $comercial)
                                                <option value="{{ $comercial->id }}">{{ $comercial->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="services"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Serviço</label>
                                    <div class="mt-2">
                                        <input type="text" name="service_id" id="services" autocomplete="services"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="cod-contador"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Soluções</label>
                                    <div class="mt-2">
                                        <input type="text" name="category_id" id="cod-contador"
                                            autocomplete="given-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="client_type_id"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Tipo
                                        de Adesão</label>
                                    <div class="mt-2">
                                        <select id="client_type_id" name="client_type_id" autocomplete="tariff"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                            @foreach ($clientTypes as $clientType)
                                                <option value="{{ $clientType->id }}">{{ $clientType->title }}</option>
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
                                        <input type="text" name="condominium_administrator" id="cod-contador"
                                            autocomplete="given-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Dados ORGANIZAÇÃO-->
                        <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                            id="dadosorg">
                            <h1 class="text-lg pb-4 dark:text-gray-200">DADOS DA ORGANIZAÇÃO</h1>
                            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-2">
                                    <label for="provider"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Adesão</label>
                                    <div class="mt-2">
                                        <input type="provider" name="provider_id" id="provider"
                                            autocomplete="provider"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="plan"
                                        class="block text-sm font-medium leading-6 text-gray-900">Campanha</label>
                                    <div class="mt-2">
                                        <select id="plan" name="plan_id" autocomplete="plan"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                            <option>Energia Verde</option>
                                            <option>Teste</option>
                                            <option>Teste</option>
                                            <option>Teste</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="documentation_status"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Documentação</label>
                                    <div class="mt-2">
                                        <input type="text" name="documentation_status_id"
                                            id="documentation_status" autocomplete="documentation_status"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="archive"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Arquivo
                                        do Cliente</label>
                                    <div class="mt-2">
                                        <input type="text" name="archive" id="archive" autocomplete="archive"
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
                                                <option value="{{ $tariff->id }}">{{ $tariff->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="nif"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">NIF</label>
                                    <div class="mt-2">
                                        <input type="nif" name="nif" id="nif" autocomplete="nif"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="cpe"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">CPE</label>
                                    <div class="mt-2">
                                        <input type="text" name="cpe" id="cpe" autocomplete="cpe"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="power"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Potência</label>
                                    <div class="mt-2">
                                        <input type="text" name="power" id="power" autocomplete="power"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
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
                                        <input type="text" name="flat" id="flat" autocomplete="flat"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="peak"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Pontas</label>
                                    <div class="mt-2">
                                        <input type="text" name="peak" id="peak" autocomplete="peak"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="standard"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Cheias</label>
                                    <div class="mt-2">
                                        <input type="text" name="standard" id="standard" autocomplete="standard"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="off-peak"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Vazio</label>
                                    <div class="mt-2">
                                        <input type="text" name="off-peak" id="off-peak" autocomplete="off-peak"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="super_off-peak"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Super
                                        Vazio</label>
                                    <div class="mt-2">
                                        <input type="text" name="super_off-peak" id="super_off-peak"
                                            autocomplete="super_off-peak"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--END Consumos-->

                        <!--Dados Cliente-->
                        <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                            id="dadoscliente">
                            <h1 class="text-lg pb-4 dark:text-gray-200">Dados Cliente</h1>
                            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                <div class="sm:col-span-2">
                                    <label for="cae"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">CAE</label>
                                    <div class="mt-2">
                                        <input type="number" name="cae" id="cae" autocomplete="cae"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="name"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Nome
                                        Cliente</label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name" autocomplete="name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="address"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Morada
                                        De Fornecimento</label>
                                    <div class="mt-2">
                                        <input type="text" name="address" id="address" autocomplete="address"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="floor"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Andar/Fração</label>
                                    <div class="mt-2">
                                        <input type="text" name="floor" id="floor" autocomplete="floor"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="post_code"
                                        class="block text-sm font-medium leading-6 text-gray-900">Codigo Postal</label>
                                    <div class="mt-2">
                                        <select id="npost_code" name="post_code" autocomplete="post_code"
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
                                        <input type="text" name="dmp_code" id="dmp_code" autocomplete="dmp_code"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="district_id"
                                        class="block text-sm font-medium leading-6 text-gray-900">Distrito</label>
                                    <div class="mt-2">
                                        <select id="district_id" name="district_id" autocomplete="district_id"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->title }}</option>
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
                        <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                            id="pagamento">
                            <h1 class="text-lg pb-4 dark:text-gray-200">Forma de Pagamento</h1>
                            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                <div class="sm:col-span-2">
                                    <label for="nif"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">NIB</label>
                                    <div class="mt-2">
                                        <input type="nif" name="nif" id="nif" autocomplete="nif"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="nivel-tensao"
                                        class="block text-sm font-medium leading-6 text-gray-900">Fatura</label>
                                    <div class="mt-2">
                                        <select id="nivel-tensao" name="invoice_type_id" autocomplete="nivel-tensao"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                            <option>Eletronica</option>
                                            <option>Papel</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--END Forma Pagamento-->

                        <!--Dados Correspondência-->
                        <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                            id="corespondencia">
                            <h1 class="text-lg pb-4 dark:text-gray-200">Dados de Correspondência</h1>
                            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                <div class="sm:col-span-2">
                                    <label for="nif"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Morada</label>
                                    <div class="mt-2">
                                        <input type="nif" name="address" id="nif" autocomplete="nif"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="nif"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Nº
                                        Porta</label>
                                    <div class="mt-2">
                                        <input type="nif" name="door" id="nif" autocomplete="nif"
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
                                            oninput="postCodeFormatter(this)" onblur="postCodeValidator(this)">
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




                                {{-- <div class="sm:col-span-2">
                                    <label for="nivel-tensao"
                                        class="block text-sm font-medium leading-6 text-gray-900">Codigo Postal</label>
                                    <div class="mt-2">
                                        <select id="mail_postal_code" name="tensao" autocomplete="nivel-tensao"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                            <option>4040-123</option>
                                            <option>4000-022</option>
                                        </select>
                                    </div>
                                </div> --}}
                                {{-- <div>
                                    <label for="codigo_postal">Código Postal:</label>
                                    <input type="text" name="codigo_postal" id="codigo_postal" required
                                        pattern="[0-9]{4}-[0-9]{3}"
                                        title="Formato inválido. Digite no formato XXXX-XXX"
                                        onblur="validarCodigoPostal(this)">
                                    <span id="codigo_postal_error" style="color: red;"></span>
                                </div> --}}

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
                                        <input type="nif" name="email" id="email" autocomplete="email"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="nif"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Contacto
                                        Telefónico</label>
                                    <div class="mt-2">
                                        <input type="nif" name="phone_number" id="nif" autocomplete="nif"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="nif"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">NIF
                                        Responsável</label>
                                    <div class="mt-2">
                                        <input type="nif" name="nif" id="nif" autocomplete="nif"
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
                            id="comissoes">
                            <h1 class="text-lg pb-4 dark:text-gray-200">Comissões e Data de Pagamento</h1>
                            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                <div class="sm:col-span-2">
                                    <label for="price"
                                        class="block text-sm font-medium leading-6 text-gray-900">Valor
                                        Pago ao Administrador</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <div
                                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                            <span class="text-gray-500 sm:text-sm">€</span>
                                        </div>
                                        <input type="text" name="price" id="price"
                                            class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            placeholder="0.00">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <div class="relative max-w-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input datepicker datepicker-buttons type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date">
                                    </div>

                                </div>
                                <div class="sm:col-span-2">
                                    <label for="price"
                                        class="block text-sm font-medium leading-6 text-gray-900">Valor
                                        Pago ao Comercial</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <div
                                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                            <span class="text-gray-500 sm:text-sm">€</span>
                                        </div>
                                        <input type="text" name="price" id="price"
                                            class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            placeholder="0.00">
                                    </div>
                                </div>


                                <div class="sm:col-span-2">
                                    <label for="nif"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Data
                                        Pagamento ao Administrador</label>
                                    <div class="mt-2">
                                        <input type="nif" name="nif" id="nif" autocomplete="nif"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="nif"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Data
                                        Pagamento ao Comercial</label>
                                    <div class="mt-2">
                                        <input type="nif" name="nif" id="nif" autocomplete="nif"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600 dark:focus:border-blue-500">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="nif"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Observações</label>
                                    <div class="mt-2">
                                        <textarea id="message" rows="4"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:dark:bg-gray-600 dark:focus:border-blue-500"
                                            placeholder="Write your thoughts here..."></textarea>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--END Comissões-->

                        <input type="file" class="filepond" name="filepond" multiple data-allow-reorder="true"
                            data-max-file-size="3MB" data-max-files="5">
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

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
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }

    });
</script>
