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
                {{ __('Editar Contrato') }}
            </a>

        </div>
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight pt-4">
            {{ __('Editar Contrato') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

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
                <div class="flex-1 overflow-hidden overflow-y-scroll scrollbar-hidden" id="scrollableColumn"
                    style="max-height: 600px">
                    <form action="{{ route('contracts.update', ['contract' => $contract->id]) }}" method="POST"
                        style="margin-bottom: 40px;">
                        @csrf
                        @method('PUT')
                        <div class="space-y-12 ">
                            <div class="border-b border-gray-900/10 pb-12">
                                <!--Dados Back Office-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800"
                                    id="backoffice">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">Back Office</h1>
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Back Office" name="back_officer_id" :value="$contract->backofficer"
                                                :collection="$backofficers" hasAuth :errors="$errors->first('back_officer_id')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Comercial" name="commercial_id" :value="$contract->commercial"
                                                :collection="$commercials" hasAuth :errors="$errors->first('commercial_id')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Serviço" name="service_id" :value="$contract->service"
                                                :collection="$services" :errors="$errors->first('service_id')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Soluções" name="category_id" :value="$contract->category"
                                                :collection="$categories" :errors="$errors->first('category_id')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Tipo de Adesão" name="client_type_id"
                                                :value="$contract->clientType" :collection="$clientTypes" :errors="$errors->first('client_type_id')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string title="Cliente/Administrador" name="administrator_name"
                                                idLabel="administrator_name_label" :value="$contract->client->administrator_name"
                                                :errors="$errors->first('administrator_name')" />
                                        </div>
                                        <script>
                                            const clientTypeSelect = document.getElementById('client_type_id');
                                            const clientLabel = document.getElementById('administrator_name_label');

                                            clientTypeSelect.addEventListener('change', function() {
                                                switch (clientTypeSelect.value) {
                                                    case '1':
                                                        clientLabel.textContent = 'Administrador';
                                                        break;
                                                    case '2':
                                                        clientLabel.textContent = 'Sócio Gerente';
                                                        break;
                                                    case '3':
                                                        clientLabel.textContent = 'Cliente';
                                                        break;
                                                    default:
                                                        clientLabel.textContent = 'Tipo de Cliente';
                                                };
                                            });
                                        </script>
                                        <div class="sm:col-span-2">
                                            <x-input-string
                                                title="Administração
                                                de Condominio"
                                                name="condominium_administrator" :value="$contract->client->condominium_administrator"
                                                :errors="$errors->first('condominium_administrator')" />
                                        </div>
                                    </div>
                                </div>
                                <!--Dados ORGANIZAÇÃO-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="dadosorganizacao">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">DADOS DA ORGANIZAÇÃO</h1>
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Adesão" name="provider_id" :value="$contract->provider"
                                                :collection="$providers" :errors="$errors->first('provider_id')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Campanha" name="plan_id" :value="$contract->plan"
                                                :collection="$plans" :errors="$errors->first('plan_id')" />
                                        </div>

                                        <div class="sm:col-span-2">
                                            <x-input-string
                                                title="Arquivo
                                            do Cliente"
                                                name="archive" :value="$contract->archive" :errors="$errors->first('archive')" />
                                        </div>
                                    </div>
                                </div>

                                <!--Dados Contador-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="dadoscontador">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">DADOS Contador</h1>
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Tensão" name="tariff_id" :value="$contract->meter->tariff"
                                                :collection="$tariffs" :errors="$errors->first('tariff_id')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Potência/Escalão" name="power_bracket_id" :value="$contract->meter->powerbracket"
                                                :collection="$powerBrackets" :errors="$errors->first('power_bracket_id')" />
                                        </div>
                                        @if (optional($contract)->meter && optional($contract->meter)->powerbracket && optional($contract->meter->powerbracket)->id == 15)

                                            <div class="sm:col-span-2" id="powerParent">
                                                <x-input-string title="Pôtencia/CUI" id="power" name="power" :value="$contract->meter->power / 100"
                                                    :errors="$errors->first('power')" />
                                            </div>
                                        @endif


                                        <script>
                                            const powerBracketInput = document.getElementById('power_bracket_id');
                                            const powerParent = document.getElementById('powerParent');

                                            powerBracketInput.addEventListener('change', async function() {

                                                if (powerBracketInput.value == 15) {
                                                    powerParent.removeAttribute('hidden');
                                                } else {
                                                    powerParent.setAttribute('hidden', 'true');
                                                }
                                            });
                                        </script>
                                        <div class="sm:col-span-2">
                                            <x-input-string title="NIF" name="nif" :value="$contract->meter->nif"
                                                :errors="$errors->first('nif')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string title="CPE/CUI" name="cpe" :value="$contract->meter->cpe"
                                                :errors="$errors->first('cpe')" />
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
                                            <x-input-number title="Simples" name="flat" :value="$contract->meter->flat"
                                                :errors="$errors->first('flat')" :errors="$errors->first('flat')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-number title="Pontas" name="peak" :value="$contract->meter->peak"
                                                :errors="$errors->first('peak')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-number title="Cheias" name="standard" :value="$contract->meter->standard"
                                                :errors="$errors->first('standard')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-number title="Vazio" name="off_peak" :value="$contract->meter->off_peak"
                                                :errors="$errors->first('off_peak')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-number title="Super Vazio" name="super_off_peak"
                                                :value="$contract->meter->super_off_peak" :errors="$errors->first('super_off_peak')" />
                                        </div>
                                        <div class="form-group">
                                            <label for="radio-group" class="text-gray-200">Gás:</label>
                                            <div class="mt-2 flex space-x-4">
                                                <label class="inline-flex items-center">
                                                    <input type="radio"
                                                        class="form-radio text-indigo-600  dark:text-purple-500"
                                                        name="gas" value="1"
                                                        {{ $contract && $contract->meter && $contract->meter->gas == '1' ? 'checked' : '' }} />
                                                    <span class="ml-2 dark:text-gray-200"">1</span>
                                                </label>
                                                <label class="inline-flex items-center">
                                                    <input type="radio"
                                                        class="form-radio text-indigo-600  dark:text-purple-500" s
                                                        name="gas" value="2"
                                                        {{ $contract && $contract->meter && $contract->meter->gas == '2' ? 'checked' : '' }} />
                                                    <span class="ml-2 dark:text-gray-200"">2</span>
                                                </label>
                                                <label class="inline-flex items-center">
                                                    <input type="radio"
                                                        class="form-radio text-indigo-600  dark:text-purple-500"
                                                        name="gas" value="3"
                                                        {{ $contract && $contract->meter && $contract->meter->gas == '3' ? 'checked' : '' }} />
                                                    <span class="ml-2 dark:text-gray-200"">3</span>
                                                </label>
                                                <label class="inline-flex items-center">
                                                    <input type="radio"
                                                        class="form-radio text-indigo-600  dark:text-purple-500"
                                                        name="gas" value="4"
                                                        {{ $contract && $contract->meter && $contract->meter->gas == '4' ? 'checked' : '' }} />
                                                    <span class="ml-2 dark:text-gray-200"">4</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-price title="Preço da Potência" name="fixed_price" :value="$contract->meter->fixed_price" :errors="$errors->first('fixed_price')" />
                                        </div>

                                        <div class="sm:col-span-2">
                                            <x-input-price title="Preço da Energia Cheias" name="energy_price_standard"
                                                :value="$contract->energy_price_standard" :errors="$errors->first('energy_price_standard')" pattern="^\d{1,}\,?\d{0,2}$"/>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-price title="Preço Energia Vazio" name="energy_price_off_peak"
                                                :value="$contract->energy_price_off_peak" :errors="$errors->first('energy_price_off_peak')" pattern="^\d{1,}\,?\d{0,2}$"/>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-price title="Preço Energia Super Vazio" name="energy_price_super_off_peak"
                                                :value="$contract->energy_price_super_off_peak" :errors="$errors->first('energy_price_super_off_peak')" pattern="^\d{1,}\,?\d{0,2}$"/>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-price title="Preço Energia" name="energy_price"
                                                :value="$contract->energy_price" :errors="$errors->first('energy_price')" pattern="^\d{1,}\,?\d{0,2}$"/>
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
                                            <x-input-date title="Inserido" name="inserted_at"
                                                value="{{ $contract->inserted_at }}" :errors="$errors->first('inserted_at')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-date title="Assinado" name="signed_at"
                                                value="{{ $contract->signed_at }}" :errors="$errors->first('signed_at')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-date title="Alta" name="effective_at"
                                                value="{{ $contract->effective_at }}" :errors="$errors->first('effective_at')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-date title="Renovação" name="renewal_at"
                                                value="{{ $contract->renewal_at }}" :errors="$errors->first('renewal_at')" />
                                        </div>
                                    </div>
                                </div>
                                <!--Dados Cliente-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="dadoscliente">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">Dados Cliente</h1>
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-2">
                                            <x-input-number
                                                title="CAE
                                            de Condominio"
                                                name="cae" :value="$contract->client->cae" :errors="$errors->first('cae')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string title="Nome" name="name" :value="$contract->client->name"
                                                :errors="$errors->first('name')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string title="Morada De Fornecimento" name="address"
                                                :value="$contract->client->address" :errors="$errors->first('address')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string title="Andar/Fração" name="floor" :value="$contract->client->floor"
                                                :errors="$errors->first('floor')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string title="Codigo Postal" name="post_code" :value="$contract->client->post_code"
                                                :errors="$errors->first('post_code')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string title="Codigo Freguesia" name="dmp_code"
                                                :value="$contract->client->dmp_code" :errors="$errors->first('dmp_code')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Distrito" name="district_id" :value="$contract->client->district"
                                                :collection="$districts" :errors="$errors->first('district_id')" />
                                        </div>

                                        <div class="sm:col-span-2">
                                            <x-input-select title="Concelho" name="municipality_id" :value="$contract->client->municipality"
                                                :errors="$errors->first('municipality_id')" />
                                        </div>

                                        <div class="sm:col-span-2">
                                            <x-input-select title="Freguesia" name="parish_id" :value="$contract->client->parish"
                                                :errors="$errors->first('parish_id')" />
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
                                                <x-input-string title="NIB" name="nib" :errors="$errors->first('nib')"
                                                    :value="$contract->nib" />

                                            </div>

                                            <div class="sm:col-span-2">
                                                <x-input-select title="Fatura" name="invoice_type_id" :value="$contract->invoiceType"
                                                    id="invoice_type_id" :collection="$invoiceTypes" :errors="$errors->first('invoice_type_id')" />
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
                                            <x-input-string title="Morada" name="mail_address" :errors="$errors->first('mail_address')"
                                                :value="$contract->mailingAddress->address ?? ''" />
                                        </div>
                                        <div class="sm:col-span-1">
                                            <x-input-string title="Nº Porta" name="mail_door" :errors="$errors->first('mail_door')"
                                                :value="$contract->mailingAddress->door ?? ''" />
                                        </div>

                                        <div class="sm:col-span-2">
                                            <x-input-string title="Codigo Postal" name="mail_post_code"
                                                :errors="$errors->first('mail_post_code')" :value="$contract->mailingAddress->post_code ?? ''" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            {{-- @php
                                                dd($contract->mailingAddress);
                                            @endphp --}}
                                            <x-input-select title="Distrito" name="mail_district_id"
                                                :errors="$errors->first('mail_district_id')" :value="$contract->mailingAddress->district ?? null" :collection="$districts" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Concelho" name="mail_municipality_id"
                                                :errors="$errors->first('mail_municipality_id')" :value="$contract->mailingAddress->municipality ?? null" />
                                        </div>
                                        {{-- @php
                                            dd($contract->mailingAddress->parish);
                                        @endphp --}}
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Freguesia" name="mail_parish_id" :errors="$errors->first('mail_parish_id')"
                                                :value="$contract->mailingAddress->parish ?? null" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string title="Email" name="mail" :errors="$errors->first('mail')"
                                                :value="$contract->mailingAddress->email ?? null" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string
                                                title="Contacto
                                            Telefónico"
                                                name="phone_number" :value="$contract->mailingAddress->phone_number ?? null" :errors="$errors->first('phone_number')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string title="NIF" name="nif" :value="$contract->mailingAddress->nif ?? null"
                                                :errors="$errors->first('mail_nif')" />
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
                                            <x-input-string
                                                title="Email
                                                Assinatura do Cliente"
                                                name="signatory_email" :value="$contract->signatory_email" :errors="$errors->first('signatory_email')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string
                                                title="Contacto
                                                Assinatura"
                                                name="signatory_phone" :value="$contract->signatory_phone" :errors="$errors->first('signatory_phone')" />
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
                                            <h3 class="text-md pb-4 dark:text-gray-200">Comissões Administrador</h3>
                                            <div class="sm:col-span-2">
                                                <x-input-price title="Valor Pago ao Administrador"
                                                    name="administrator_paid_amount"
                                                    value="{{ $contract->commission->administrator_paid_amount }}"
                                                    :errors="$errors->first('administrator_paid_amount')" />
                                            </div>
                                            <div class="sm:col-span-2">
                                                <x-input-date title="Data Pagamento ao Administrador"
                                                    name="administrator_payment_date"
                                                    value="{{ $contract->commission->administrator_payment_date }}"
                                                    :errors="$errors->first('administrator_payment_date')" />
                                            </div>
                                            <div class="sm:col-span-2">
                                                <x-input-price title="Devolução ao Administrador"
                                                    name="refund_administrator_paid_amount"
                                                    value="{{ $contract->commission->refund_administrator_paid_amount }}"
                                                    :errors="$errors->first('refund_adminstrator_paid_amount')" />
                                            </div>
                                            <div class="sm:col-span-2">
                                                <x-input-date title="Data Devolução ao Administrador"
                                                    name="refund_administrator_payment_date"
                                                    value="{{ $contract->commission->refund_administrator_payment_date }}"
                                                    :errors="$errors->first('refund_administrator_payment_date')" />
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="text-md pb-4 dark:text-gray-200">Comissões Comercial</h3>
                                            <div class="sm:col-span-2">
                                                <x-input-price title="Valor Pago ao Comercia"
                                                    name="commercial_paid_amount"
                                                    value="{{ $contract->commission->commercial_paid_amount }}"
                                                    :errors="$errors->first('commercial_paid_amount')" />
                                            </div>
                                            <div class="sm:col-span-2">
                                                <x-input-date title="Data Pagamento ao Comercial"
                                                    name="commercial_payment_date"
                                                    value="{{ $contract->commission->commercial_payment_date }}"
                                                    :errors="$errors->first('commercial_payment_date')" />
                                            </div>
                                            <div class="sm:col-span-2">
                                                <x-input-price title="Devolução ao Comercial"
                                                    name="refund_commercial_paid_amount"
                                                    value="{{ $contract->commission->refund_commercial_paid_amount }}"
                                                    :errors="$errors->first('refund_commercial_paid_amount')" />
                                            </div>
                                            <div class="sm:col-span-2">
                                                <x-input-date title="Data Devolução ao Administrador"
                                                    name="refund_commercial_payment_date"
                                                    value="{{ $contract->commission->refund_commercial_payment_date }}"
                                                    :errors="$errors->first('refund_commercial_payment_date')" />
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="text-md pb-4 dark:text-gray-200">Comissões CVC</h3>
                                            <div class="sm:col-span-2">
                                                <x-input-price title="Valor Pago ao CVC" name="cvc_paid_amount"
                                                    value="{{ $contract->commission->cvc_paid_amount }}"
                                                    :errors="$errors->first('cvc_paid_amount')" />
                                            </div>
                                            <div class="sm:col-span-2">
                                                <x-input-date title="Data Pagamento ao CVC" name="cvc_payment_date"
                                                    value="{{ $contract->commission->cvc_payment_date }}"
                                                    :errors="$errors->first('cvc_payment_date')" />
                                            </div>
                                            <div class="sm:col-span-2">
                                                <x-input-price title="Devolução ao CVC" name="refund_cvc_paid_amount"
                                                    value="{{ $contract->commission->refund_cvc_paid_amount }}"
                                                    :errors="$errors->first('refund_cvc_paid_amount')" />
                                            </div>
                                            <div class="sm:col-span-2">
                                                <x-input-date title="Data Devolução ao CVC"
                                                    name="refund_cvc_payment_date"
                                                    value="{{ $contract->commission->refund_cvc_payment_date }}"
                                                    :errors="$errors->first('refund_cvc_payment_date')" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--END Comissões-->

                                   <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="comissoesdatas">
                                    <h1 class="text-md pb-4 dark:text-gray-200">
                                       AQUI Comissões de Energia
                                    </h1>
                                    <div class="grid grid-cols-3 gap-4">

                                        <div>
                                            <h3 class="text-md pb-4 dark:text-gray-200">Comissões CVC</h3>
                                            <div class="sm:col-span-2">
                                                <x-input-price title="Valor Pago ao CVC" name="energy_cvc_paid_amount"
                                                    value="{{ $contract->commission->energy_cvc_paid_amount }}"
                                                    :errors="$errors->first('energy_cvc_paid_amount')" />
                                            </div>
                                            <div class="sm:col-span-2">
                                                <x-input-date title="Data Pagamento ao CVC" name="energy_cvc_payment_date"
                                                    value="{{ $contract->commission->energy_cvc_payment_date }}"
                                                    :errors="$errors->first('energy_cvc_payment_date')" />
                                            </div>
                                            <div class="sm:col-span-2 mt-5">
                                                <x-input-price title="Devolução ao CVC" name="refund_energy_cvc_paid_amount"
                                                    value="{{ $contract->commission->refund_energy_cvc_paid_amount }}"
                                                    :errors="$errors->first('refund_energy_cvc_paid_amount')" />
                                            </div>
                                            <div class="sm:col-span-2">
                                                <x-input-date title="Data Devolução ao CVC"
                                                    value="{{ $contract->commission->refund_energy_cvc_payment_date }}"
                                                    name="refund_energy_cvc_payment_date" :errors="$errors->first('refund_energy_cvc_payment_date')" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800">
                                    <div class="sm:col-span-2">
                                        <x-input-select title="Status" name="status_id" :collection="$statuses" :value="$contract->statuses"
                                            :errors="$errors->first('status_id')" />
                                    </div>
                                    <div hidden class="grid grid-cols-1 gap-x-6 gap-y-8"
                                        @if($contract->notes) style="display: block" @endif id="messageParent">
                                        <div class="sm:col-span-4">
                                            <label for="message"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Observações</label>
                                            <div class="mt-2">
                                                <textarea id="message" rows="4" name="text"
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:dark:bg-gray-600 dark:focus:border-blue-500"
                                                    placeholder="">{{ $contract->notes->text }}
                                                </textarea>
                                                <span style="color:white">Nota editada por:
                                                {{
                                                    $contract->notes->backOfficer->name
                                                }}
                                                a
                                                {{
                                                    $contract->notes->updated_at
                                                }}
                                                </span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    const select = document.getElementById('status_id');
                                    const message = document.getElementById('messageParent');

                                    select.addEventListener('change', function() {
                                        if (select.value == 2 || select.value == 4) {
                                            message.style.display = 'grid';
                                            console.log(messageParent.style.display);
                                        } else {
                                            message.style.display = 'none';
                                        }
                                    });
                                </script>
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
                                <div class="mt-10 gap-x-10 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="comissoesmensais">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">Comissões Mensais</h1>
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-2">
                                        @foreach ($values as $label => $name)
                                            <div class="sm:col-span-1">
                                                <x-input-price title="{{ $label }}" :errors="$errors->first(
                                                    'amount_' . str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) . '_12',
                                                )"
                                                    name="{{ $name }}" disabled
                                                    value="{{ $contract->monthlyCommission->{'amount_' . str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) . '_12'} ?? null }}" />
                                            </div>
                                            <div>
                                                <x-input-date title="{{ $label }}"
                                                    name="{{ 'date_' . $label }}" :errors="$errors->first($name)"
                                                    value="{{ $contract->monthlyCommission->{'date_' . str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) . '_12'} ?? null }}" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!--END comissões mensais-->

                                <div class="gap-x-6 gap-y-8 mt-5 bg-white p-6 rounded-2xl dark:bg-gray-800">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">Documentos deste Contrato</h1>
                                    <div class="p-3">
                                        @if ($contract->files->count() > 0)
                                            <div class="grid grid-cols-6 gap-3">
                                                @foreach ($contract->files as $file)
                                                    <a href="{{ route('download', ['id' => $file->id]) }}"
                                                        class="bg-gray-200 p-4 flex flex-col justify-center items-center rounded-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                            height="32" fill="#000000" viewBox="0 0 256 256">
                                                            <path
                                                                d="M224,152a8,8,0,0,1-8,8H192v16h16a8,8,0,0,1,0,16H192v16a8,8,0,0,1-16,0V152a8,8,0,0,1,8-8h32A8,8,0,0,1,224,152ZM92,172a28,28,0,0,1-28,28H56v8a8,8,0,0,1-16,0V152a8,8,0,0,1,8-8H64A28,28,0,0,1,92,172Zm-16,0a12,12,0,0,0-12-12H56v24h8A12,12,0,0,0,76,172Zm88,8a36,36,0,0,1-36,36H112a8,8,0,0,1-8-8V152a8,8,0,0,1,8-8h16A36,36,0,0,1,164,180Zm-16,0a20,20,0,0,0-20-20h-8v40h8A20,20,0,0,0,148,180ZM40,112V40A16,16,0,0,1,56,24h96a8,8,0,0,1,5.66,2.34l56,56A8,8,0,0,1,216,88v24a8,8,0,0,1-16,0V96H152a8,8,0,0,1-8-8V40H56v72a8,8,0,0,1-16,0ZM160,80h28.69L160,51.31Z">
                                                            </path>
                                                        </svg>
                                                        {{ $file->filename }}
                                                    </a>
                                                    <button type="button"
                                                        onclick="apagarInformacao('{{ $file->id }}')">Apagar</button>
                                                @endforeach
                                            </div>
                                        @else
                                            <p class="text-dark-800 dark:text-gray-200">Nenhum arquivo associado a este
                                                contrato.</p>
                                        @endif
                                    </div>
                                </div>

                                <!--Ficheiros-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="documentacao">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">Inserir Ficheiros</h1>
                                    <div class="sm:col-span-2">
                                        <div class="mt-2">
                                            <input type="file" class="filepond" name="filepond" multiple
                                                data-allow-reorder="true" data-max-file-size="10MB"
                                                data-max-files="10" credits="false">
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
    document.getElementById('mail_district_id').addEventListener('change', function() {
        var state = document.getElementById('mail_municipality_id');
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
                state.innerHTML = '<option selected>Escolher Concelho</option>';
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

        document.getElementById('mail_municipality_id').value = "";
        document.getElementById('mail_parish_id').value = "";
    });

    document.getElementById('mail_municipality_id').addEventListener('change', function() {
        var $parish = document.getElementById('mail_parish_id');
        var url = "{{ route('parish.index') }}";
        var params = "municipality_id=" + encodeURIComponent(this.value);

        fetch(url + '?' + params)
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


<script>
    function apagarInformacao(id) {
        fetch(`/delete/${id}`, {
                method: 'DELETE',
            })
            .then(response => {

                console.log(id);

                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Erro ao apagar a informação.');
                }
            })
            .then(data => {
                exibirToast(data.message);
            })
            .catch(error => {
                exibirToast('Erro ao fazer a requisição: ' + error.message);
            });
    }

    function exibirToast(mensagem) {
        Toastify({
            text: mensagem,
            duration: 3000,
            gravity: 'top',
            position: 'right',
            style: {
                background: 'linear-gradient(to right, #00b09b, #96c93d)'
            }
        }).showToast();
    }
</script>
