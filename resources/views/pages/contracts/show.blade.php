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

            <a href="{{ route('servicos') }}" class="text-gray-600 dark:text-gray-200 hover:underline">
                {{ __('Serviços') }}
            </a>

            <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">
                {{ __('Energia e Gás') }}
            </a>
        </div>
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight pt-4 mb-4">
            {{ __(' Contrato - ') }}{{ $contract->id }}
        </h2>
        <a href="#"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-4">{{ __('Editar Contrato') }}</a>
    </x-slot>



    <!--Tables-->
    <div class="p-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                    <h1 class="text-lg pb-4 dark:text-gray-200">Back Office</h1>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Back Office:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->backofficer)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->backofficer->name }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Código Comerciante:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->commercial_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->commercial_id }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Nome Comercial:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->commercial_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->commercialName->name }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Serviço:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->service_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->service->title }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Soluções:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->category_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->solutions->title }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Tipo de Adesão:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->client_type_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->clientType->title }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Cliente / Administrador</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->client_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->client->name }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Administração de Condominio</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->client_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->client->name }}
                                </h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <!--Dados organização-->
            <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                <h1 class="text-lg pb-4 dark:text-gray-200">Dados da organização</h1>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Adesão:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->provider_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->provider->title }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Campanha:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->plan_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->plan->title }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Documentação:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->documentation_status_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->documentation->title }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Arquivo do Cliente:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->contract_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->archive }}
                            </h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <!--Dados organização-->
            <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                <h1 class="text-lg pb-4 dark:text-gray-200">Dados do Contador</h1>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Tensão:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->tariff_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->tariff->title }}{{ $contract->tariff->description }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">NIF:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->meter_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->meter->nif }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">CPE/CUI:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->meter_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->meter->cpe }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Potência/Escalão:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->meter_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->meter->power }}
                            </h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <!--Dados organização-->
            <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                <h1 class="text-lg pb-4 dark:text-gray-200">Consumos</h1>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Simples:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->meter_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->meter->flat }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Pontas:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->meter_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->meter->peak }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Cheias:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->meter_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->meter->standard }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Vazio:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->meter_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->meter->off_peak }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Super Vazio:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->meter_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->meter->super_off_peak }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">GÁS:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->meter_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->meter->gas }}
                            </h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <!--Dados organização-->
            <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                <h1 class="text-lg pb-4 dark:text-gray-200">Datas de Contrato</h1>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Inserido:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->inserted_at }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Assinado:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->signed_at }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Alta:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->effective_at }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Renovação:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->renewal_at }}
                            </h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <!--Dados organização-->
            <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                <h1 class="text-lg pb-4 dark:text-gray-200">Dados do Cliente</h1>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">CAE:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->clientData->cae }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Nome Cliente:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->clientData->administrator_name }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Morada de Fornecimento:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->clientData->address }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Andar/Fração:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->clientData->floor }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Código Postal:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->clientData->post_code }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Código de Freguesia:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->clientData->dmp_code }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Distrito:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->district_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->district->title }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Conselho:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->municipality_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->municipality->title }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Freguesia:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->parish_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->parish->title }}
                            </h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <!--Dados organização-->
            <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                <h1 class="text-lg pb-4 dark:text-gray-200">Forma de Pagamento</h1>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">NIB:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->nib }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Fatura:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->invoice_type_id)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->invoiceType->title }}
                            </h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                <h1 class="text-lg pb-4 dark:text-gray-200">Dados de Correspondência</h1>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Morada:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->client->mailingAddress->address }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Nº Porta:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->client->mailingAddress->door }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Código Postal:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->client->mailingAddress->post_code }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Freguesia:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->client->mailingAddress->parish_id }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Conselho:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->client->mailingAddress->municipality_id }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Distrito:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->client->mailingAddress->district_id }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Email:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->client->mailingAddress->email }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Contacto Telefónico:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->client->mailingAddress->phone_number }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">NIF Responsável:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->client->mailingAddress->nif }}
                            </h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                <h1 class="text-lg pb-4 dark:text-gray-200">Assinatura</h1>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Email Assinatura:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->signatory_email }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Contacto Assinatura:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->signatory_phone }}
                            </h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                <h1 class="text-lg pb-4 dark:text-gray-200">Comissões, Data de Pagamento e Devoluções</h1>
                <div class="grid grid-cols-3 gap-4">
                    <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                        <h3 class="text-lg pb-4 dark:text-gray-200">Comissões Administrador</h3>
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Valor Pago ao Administrador:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->commission->administrator_paid_amount }}
                                </h4>
                            @endif
                        </div>
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Data Pagamento ao Administrador:
                        </div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->commission->administrator_payment_date }}
                                </h4>
                            @endif
                        </div>
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Devolução ao Administrador:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->commission->refund_administrator_paid_amount }}
                                </h4>
                            @endif
                        </div>
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Data Devolução ao Administrador:
                        </div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->commission->refund_administrator_payment_date }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                        <h3 class="text-lg pb-4 dark:text-gray-200">Comissões Comercial</h3>
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Valor Pago ao Comercial:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->commission->commercial_paid_amount }}
                                </h4>
                            @endif
                        </div>
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Data Pagamento ao Comercial:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->commission->commercial_payment_date }}
                                </h4>
                            @endif
                        </div>
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Devolução ao Comercial:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->commission->refund_commercial_paid_amount }}
                                </h4>
                            @endif
                        </div>
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Data Devolução ao Comercial:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->commission->refund_commercial_payment_date }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                        <h3 class="text-lg pb-4 dark:text-gray-200">Comissões CVC</h3>
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Valor Pago ao CVC:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->commission->cvc_paid_amount }}
                                </h4>
                            @endif
                        </div>
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Data Pagamento ao CVC:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->commission->cvc_payment_date }}
                                </h4>
                            @endif
                        </div>
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Devolução ao CVC:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->commission->refund_cvc_paid_amount }}
                                </h4>
                            @endif
                        </div>
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Data Devolução ao CVC:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->commission->refund_cvc_payment_date }}
                                </h4>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                <h1 class="text-lg pb-4 dark:text-gray-200">Comissões Mensais</h1>
                <div class="grid grid-cols-6 gap-4 mb-4">
                    <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                        <div class="p-4 dark:text-gray-200">1_12:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->monthly_commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->monthlyCommission->ammount_01_12 }}
                                </h4>
                                <span>{{ $contract->monthlyCommission->date_01_12 }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                        <div class="p-4 dark:text-gray-200">2_12:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->monthly_commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->monthlyCommission->ammount_02_12 }}
                                </h4>
                                <span>{{ $contract->monthlyCommission->date_02_12 }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                        <div class="p-4 dark:text-gray-200">3_12:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->monthly_commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->monthlyCommission->ammount_03_12 }}
                                </h4>
                                <span>{{ $contract->monthlyCommission->date_03_12 }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                        <div class="p-4 dark:text-gray-200">4_12:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->monthly_commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->monthlyCommission->ammount_04_12 }}
                                </h4>
                                <span>{{ $contract->monthlyCommission->date_04_12 }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                        <div class="p-4 dark:text-gray-200">5_12:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->monthly_commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->monthlyCommission->ammount_05_12 }}
                                </h4>
                                <span>{{ $contract->monthlyCommission->date_05_12 }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                        <div class="p-4 dark:text-gray-200">6_12:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->monthly_commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->monthlyCommission->ammount_06_12 }}
                                </h4>
                                <span>{{ $contract->monthlyCommission->date_06_12 }} </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-6 gap-4 mb-4">
                    <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                        <div class="p-4 dark:text-gray-200">7_12:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->monthly_commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->monthlyCommission->ammount_07_12 }}
                                </h4>
                                <span>{{ $contract->monthlyCommission->date_07_12 }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                        <div class="p-4 dark:text-gray-200">8_12:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->monthly_commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->monthlyCommission->ammount_08_12 }}
                                </h4>
                                <span>{{ $contract->monthlyCommission->date_08_12 }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                        <div class="p-4 dark:text-gray-200">9_12:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->monthly_commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->monthlyCommission->ammount_09_12 }}
                                </h4>
                                <span>{{ $contract->monthlyCommission->date_09_12 }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                        <div class="p-4 dark:text-gray-200">10_12:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->monthly_commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->monthlyCommission->ammount_10_12 }}
                                </h4>
                                <span>{{ $contract->monthlyCommission->date_10_12 }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                        <div class="p-4 dark:text-gray-200">11_12:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->monthly_commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->monthlyCommission->ammount_11_12 }}
                                </h4>
                                <span>{{ $contract->monthlyCommission->date_11_12 }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                        <div class="p-4 dark:text-gray-200">12_12:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->monthly_commission_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->monthlyCommission->ammount_012_12 }}
                                </h4>
                                <span>{{ $contract->monthlyCommission->date_12_12 }} </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                <h1 class="text-lg pb-4 dark:text-gray-200">Documentos deste Contrato</h1>
            </div>
        </div>
    </div>



</x-app-layout>
