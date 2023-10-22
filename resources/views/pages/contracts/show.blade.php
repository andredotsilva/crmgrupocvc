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
        <a href="{{ route('contracts.edit', $contract->id) }}"
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
                            @if ($contract->commercial && $contract->commercial->user)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->commercial->user->code }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Nome Comercial:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->commercial)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->commercial->name }}
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
                                    {{ $contract->category->title }}
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
                                    {{ $contract->client->administrator_name }}
                                </h4>
                            @endif
                        </div>
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
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Administração de Condominio</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->client_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->client->condominium_administrator }}
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
                        @if ($contract->plan)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->plan->title }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Documentação:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->documentation)
                            @foreach ($contract->documentation as $documentation)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $documentation->title }}
                                </h4>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Status:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->status)
                            <p>{{ $contract->status->title }}</p>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Arquivo do Cliente:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract)
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
                        @if ($contract->meter && $contract->meter->tariff)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->meter->tariff->title }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">NIF:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->meter)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->meter->nif }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">CPE/CUI:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->meter)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->meter->cpe }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Potência/Escalão:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->meter)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                @if ($contract->meter->power_bracket_id === 15)
                                    {{ $contract->meter->power * 100 }}
                                @else
                                    {{ $contract->meter->powerbracket->title ?? 0 }}
                                @endif
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
                        @if ($contract->meter)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->meter->flat }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Pontas:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->meter)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->meter->peak }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Cheias:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->meter)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->meter->standard }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Vazio:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->meter)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->meter->off_peak }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Super Vazio:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->meter)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->meter->super_off_peak }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">GÁS:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->meter)
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
                        @if ($contract->client)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->client->cae }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Nome Cliente:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->client->name }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Morada de Fornecimento:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->client->address }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Andar/Fração:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->client->floor }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Código Postal:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->client->post_code }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Código de Freguesia:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client && $contract->client->district && $contract->client->municipality && $contract->client->parish)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ str_replace(' ', '', $contract->client->district->code) }}
                                {{ str_replace(' ', '', $contract->client->municipality->code) }}
                                {{ str_replace(' ', '', $contract->client->parish->code) }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Distrito:</div>
                    <div class="p-4 col-span-8 md:col-span-8">

                        @if ($contract->client && $contract->client->district)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->client->district->title }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Concelho:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client && $contract->client->municipality)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->client->municipality->title }}
                            </h4>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Freguesia:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client && $contract->client->parish)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->client->parish->title ?? null }}
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
                        @if ($contract->client && $contract->mailingAddress)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->mailingAddress->address }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Nº Porta:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client && $contract->mailingAddress)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->mailingAddress->door }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Código Postal:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client && $contract->mailingAddress)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->mailingAddress->post_code }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Freguesia:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client && $contract->mailingAddress)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->mailingAddress->parish->title ?? null }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Conselho:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client && $contract->mailingAddress)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->mailingAddress->municipality->title ?? null }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Distrito:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client && $contract->mailingAddress)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->mailingAddress->district->title ?? null }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Email:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client && $contract->mailingAddress)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->mailingAddress->email }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Contacto Telefónico:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client && $contract->mailingAddress)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->mailingAddress->phone_number }}
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">NIF Responsável:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        @if ($contract->client && $contract->mailingAddress)
                            <h4 class="text-blue-600 dark:text-blue-400">
                                {{ $contract->mailingAddress->nif }}
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
                    @foreach (Auth()->user()->roles as $role)
                        @if ($role->id === 1 || $role->id === 2)
                            <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                                <h3 class="text-lg pb-4 dark:text-gray-200">Comissões Administrador</h3>
                                <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Valor Pago ao
                                    Administrador:</div>
                                <div class="p-4 col-span-8 md:col-span-8">
                                    @if ($contract->commission)
                                        <h4 class="text-blue-600 dark:text-blue-400">
                                            {{ $contract->commission->administrator_paid_amount / 100 }} €
                                        </h4>
                                    @endif
                                </div>
                                <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Data Pagamento ao
                                    Administrador:
                                </div>
                                <div class="p-4 col-span-8 md:col-span-8">
                                    @if ($contract->commission)
                                        <h4 class="text-blue-600 dark:text-blue-400">
                                            {{ $contract->commission->administrator_payment_date }}
                                        </h4>
                                    @endif
                                </div>
                                <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Devolução ao
                                    Administrador:</div>
                                <div class="p-4 col-span-8 md:col-span-8">
                                    @if ($contract->commission)
                                        <h4 class="text-blue-600 dark:text-blue-400">
                                            {{ $contract->commission->refund_administrator_paid_amount / 100 }} €
                                        </h4>
                                    @endif
                                </div>
                                <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Data Devolução ao
                                    Administrador:
                                </div>
                                <div class="p-4 col-span-8 md:col-span-8">
                                    @if ($contract->commission)
                                        <h4 class="text-blue-600 dark:text-blue-400">
                                            {{ $contract->commission->refund_administrator_payment_date }}
                                        </h4>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if ($role->id <= 3)
                            <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                                <h3 class="text-lg pb-4 dark:text-gray-200">Comissões Comercial</h3>
                                <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Valor Pago ao Comercial:
                                </div>
                                <div class="p-4 col-span-8 md:col-span-8">
                                    @if ($contract->commission)
                                        <h4 class="text-blue-600 dark:text-blue-400">
                                            {{ $contract->commission->commercial_paid_amount / 100 }} €
                                        </h4>
                                    @endif
                                </div>
                                <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Data Pagamento ao
                                    Comercial:</div>
                                <div class="p-4 col-span-8 md:col-span-8">
                                    @if ($contract->commission)
                                        <h4 class="text-blue-600 dark:text-blue-400">
                                            {{ $contract->commission->commercial_payment_date }}
                                        </h4>
                                    @endif
                                </div>
                                <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Devolução ao Comercial:
                                </div>
                                <div class="p-4 col-span-8 md:col-span-8">
                                    @if ($contract->commission)
                                        <h4 class="text-blue-600 dark:text-blue-400">
                                            {{ $contract->commission->refund_commercial_paid_amount / 100 }} €
                                        </h4>
                                    @endif
                                </div>
                                <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Data Devolução ao
                                    Comercial:</div>
                                <div class="p-4 col-span-8 md:col-span-8">
                                    @if ($contract->commission)
                                        <h4 class="text-blue-600 dark:text-blue-400">
                                            {{ $contract->commission->refund_commercial_payment_date }}
                                        </h4>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if ($role->id === 1)
                            <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                                <h3 class="text-lg pb-4 dark:text-gray-200">Comissões CVC</h3>
                                <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Valor Pago ao CVC:</div>
                                <div class="p-4 col-span-8 md:col-span-8">
                                    @if ($contract->commission)
                                        <h4 class="text-blue-600 dark:text-blue-400">
                                            {{ $contract->commission->cvc_paid_amount / 100 }} €
                                        </h4>
                                    @endif
                                </div>
                                <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Data Pagamento ao CVC:
                                </div>
                                <div class="p-4 col-span-8 md:col-span-8">
                                    @if ($contract->commission)
                                        <h4 class="text-blue-600 dark:text-blue-400">
                                            {{ $contract->commission->cvc_payment_date }}
                                        </h4>
                                    @endif
                                </div>
                                <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Devolução ao CVC:</div>
                                <div class="p-4 col-span-8 md:col-span-8">
                                    @if ($contract->commission)
                                        <h4 class="text-blue-600 dark:text-blue-400">
                                            {{ $contract->commission->refund_cvc_paid_amount / 100 }} €
                                        </h4>
                                    @endif
                                </div>
                                <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Data Devolução ao CVC:
                                </div>
                                <div class="p-4 col-span-8 md:col-span-8">
                                    @if ($contract->commission)
                                        <h4 class="text-blue-600 dark:text-blue-400">
                                            {{ $contract->commission->refund_cvc_payment_date }}
                                        </h4>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        @foreach (Auth()->user()->roles as $role)
            @if ($role->id === 1 || $role->id === 2)
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
                    <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                        <h1 class="text-lg pb-4 dark:text-gray-200">Comissões Mensais</h1>
                        <div class="grid grid-cols-6 gap-4 mb-4">
                            @for ($i = 1; $i <= 12; $i++)
                                <div class="bg-slate-100 dark:bg-gray-700 p-4 rounded-2xl">
                                    <div class="p-4 dark:text-gray-200">{{ $i }}_12:</div>
                                    <div class="p-4 col-span-8 md:col-span-8">
                                        @if ($contract->monthlyCommission)
                                            <div class="flex flex-row gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-circle-dollar-sign">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8" />
                                                    <path d="M12 18V6" />
                                                </svg>
                                                <h4 class="text-blue-600 dark:text-blue-400">
                                                    &euro;
                                                    {{ ($contract->monthlyCommission->{'amount_' . str_pad($i, 2, '0', STR_PAD_LEFT) . '_12'} ?? null) / 100 }}
                                                </h4>
                                            </div>
                                            <div class="flex flex-row gap-2 mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-calendar">
                                                    <rect width="18" height="18" x="3" y="4" rx="2"
                                                        ry="2" />
                                                    <line x1="16" x2="16" y1="2"
                                                        y2="6" />
                                                    <line x1="8" x2="8" y1="2"
                                                        y2="6" />
                                                    <line x1="3" x2="21" y1="10"
                                                        y2="10" />
                                                </svg>
                                                <h4 class="text-blue-600 dark:text-blue-400">
                                                    {{ $contract->monthlyCommission->{'date_' . str_pad($i, 2, '0', STR_PAD_LEFT) . '_12'} ?? null }}
                                                </h4>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <div>
            <p>
                {{ $contract->notes->text }}}
            </p>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                <h1 class="text-lg pb-4 dark:text-gray-200">Documentos deste Contrato</h1>
                @if ($contract->files->count() > 0)
                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                        @foreach ($contract->files as $file)
                            <div class="p-4 bg-gray-200 rounded-sm flex flex-col justify-center items-center">
                                <a href="{{ route('download', ['id' => $file->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="#000000" viewBox="0 0 256 256">
                                        <path
                                            d="M224,152a8,8,0,0,1-8,8H192v16h16a8,8,0,0,1,0,16H192v16a8,8,0,0,1-16,0V152a8,8,0,0,1,8-8h32A8,8,0,0,1,224,152ZM92,172a28,28,0,0,1-28,28H56v8a8,8,0,0,1-16,0V152a8,8,0,0,1,8-8H64A28,28,0,0,1,92,172Zm-16,0a12,12,0,0,0-12-12H56v24h8A12,12,0,0,0,76,172Zm88,8a36,36,0,0,1-36,36H112a8,8,0,0,1-8-8V152a8,8,0,0,1,8-8h16A36,36,0,0,1,164,180Zm-16,0a20,20,0,0,0-20-20h-8v40h8A20,20,0,0,0,148,180ZM40,112V40A16,16,0,0,1,56,24h96a8,8,0,0,1,5.66,2.34l56,56A8,8,0,0,1,216,88v24a8,8,0,0,1-16,0V96H152a8,8,0,0,1-8-8V40H56v72a8,8,0,0,1-16,0ZM160,80h28.69L160,51.31Z">
                                        </path>
                                    </svg>
                                    <span class="text-sm">{{ $file->filename }}</span>
                                </a>
                                <a href="{{ route('delete', ['id' => $file->id]) }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('delete-form').submit();">
                                    Excluir
                                </a>

                                <form id="delete-form" action="{{ route('delete', ['id' => $file->id]) }}"
                                    method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                {{-- <a href="{{ route('delete', ['id' => $file->id]) }}"
                                    class="text-red-500 hover:text-red-700">Apagar</a> --}}
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 dark:text-gray-200">Nenhum arquivo associado a este contrato.</p>
                @endif
            </div>
        </div>

    </div>
</x-app-layout>
