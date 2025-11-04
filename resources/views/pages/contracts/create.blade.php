<x-app-layout>
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
            {{ __('Inserir novo contrato') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-4 dark:bg-gray-900/40">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">

            @php
                $formSections = [
                    ['id' => 'backoffice', 'label' => 'Back Office', 'hint' => 'Responsável interno e adesão.'],
                    ['id' => 'dadosorganizacao', 'label' => 'Dados da Organização', 'hint' => 'Informação do fornecedor e plano.'],
                    ['id' => 'dadoscontador', 'label' => 'Dados do Contador', 'hint' => 'Identificação do contador e dados técnicos.'],
                    ['id' => 'consumos', 'label' => 'Consumos', 'hint' => 'Perfis e histórico de consumos.'],
                    ['id' => 'datascontrato', 'label' => 'Datas do Contrato', 'hint' => 'Calendarização do contrato.'],
                    ['id' => 'dadoscliente', 'label' => 'Dados do Cliente', 'hint' => 'Informação do cliente e endereço.'],
                    ['id' => 'pagamento', 'label' => 'Forma de Pagamento', 'hint' => 'Detalhes de faturação e IBAN.'],
                    ['id' => 'dadoscorespondencia', 'label' => 'Correspondência', 'hint' => 'Dados para envio de comunicações.'],
                    ['id' => 'assinatura', 'label' => 'Assinatura', 'hint' => 'Dados do signatário e consentimentos.'],
                    ['id' => 'comissoesdatas', 'label' => 'Comissões e Datas', 'hint' => 'Pagamentos e prazos de comissões.'],
                    ['id' => 'comissoesenergia', 'label' => 'Comissões Energia', 'hint' => 'Pagamentos associados à energia.'],
                    ['id' => 'comissoesmensais', 'label' => 'Comissões Mensais', 'hint' => 'Tabela de comissionamento mensal.'],
                    ['id' => 'documentacao', 'label' => 'Documentação', 'hint' => 'Ficheiros e checklist documental.'],
                ];
            @endphp

            <div class="grid gap-6 lg:grid-cols-[280px_1fr]" style="margin-bottom: 100px;">
                <aside class="hidden lg:block">
                    <div class="sticky top-28 rounded-2xl border border-gray-200 bg-white/95 backdrop-blur dark:border-gray-700 dark:bg-gray-800/90 shadow-sm">
                        <div class="px-5 py-4 border-b border-gray-100 dark:border-gray-700">
                            <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-200">{{ __('Etapas do Contrato') }}</h3>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ __('Use os atalhos para navegar rapidamente pelo formulário.') }}</p>
                        </div>
                        <ol class="divide-y divide-gray-100 dark:divide-gray-700" id="contractStepsNav">
                            @foreach ($formSections as $index => $section)
                                <li>
                                    <button type="button" data-step-target="{{ $section['id'] }}"
                                        class="step-link flex items-center w-full gap-3 px-5 py-2 text-sm text-gray-600 transition hover:bg-blue-50/70 hover:text-blue-600 dark:text-gray-300 dark:hover:bg-blue-500/10 text-left"
                                        aria-label="{{ $section['label'] }}">
                                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full border border-gray-200 bg-white text-xs font-semibold text-gray-500 transition dark:border-gray-600 dark:bg-gray-900"
                                            data-step-number>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                        <span class="font-medium text-gray-700 dark:text-gray-100">{{ $section['label'] }}</span>
                                    </button>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </aside>

                <form action="{{ route('contracts.store') }}" method="POST">
                    @csrf

                    <section id="backoffice" data-step-section class="rounded-2xl border border-gray-200 bg-white px-6 py-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ __('Back Office') }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Defina o responsável interno e associe a equipa comercial.') }}</p>
                            </div>
                        </div>
                        <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-6">
                                        <div class="sm:col-span-2">
                                            <label for="provider" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Back
                                                Office</label>
                                            <div class="mt-2">
                                                <select name="back_officer_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 dark:ring-gray-700  dark:bg-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    <option value="">Escolha</option>
                                                    @foreach ($backofficers as $backofficer)
                                                    <option value="{{ $backofficer->id }}" {{ old('back_officer_id') == $backofficer->id || $backofficer->id == auth()->id() ? 'selected' : '' }}>
                                                        {{ $backofficer->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string title="Código Comercial" name="commercial_code" id="commercial_code" :errors="$errors->first('commercial_code')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Nome Comercial" name="commercial_id" :errors="$errors->first('commercial_id')" :collection="$commercials" hasAuth :errors="$errors->first('commercial_id')" />
                                        </div>
                                        <script>
                                            const input = document.getElementById('commercial_code');
                                            input.value = "";
                                            input.addEventListener('blur', async () => {
                                                const code = input.value;
                                                await fetch(`/users/fetchuserbycode/${code}`, {
                                                        method: 'GET',
                                                        headers: {
                                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                        },
                                                    })
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        const commercialInput = document.getElementById("commercial_id");

                                                        for (var i = 0; i < commercialInput.options.length; i++) {
                                                            var option = commercialInput.options[i];
                                                            commercialInput.value = "";
                                                            input.classList.remove('ring-gray-300');
                                                            input.classList.remove('ring-green-300')
                                                            input.classList.remove('ring-red-300')

                                                            if (option.value == data.id) {
                                                                option.selected = true;
                                                                input.classList.add('ring-green-300');
                                                                break;
                                                            } else {
                                                                input.classList.add('ring-red-300');
                                                            }
                                                        }
                                                    })
                                                    .catch(error => {
                                                        console.log(error);
                                                    })
                                            });
                                        </script>
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Serviço" name="service_id" :errors="$errors->first('service_id')" :collection="$services" :errors="$errors->first('service_id')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Soluções" name="category_id" :collection="$categories" :errors="$errors->first('category_id')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Tipo
                                            de Adesão" name="client_type_id" :collection="$clientTypes" :errors="$errors->first('client_type_id')" />
                                        </div>

                                        <div class="sm:col-span-2" id="applianceInput" hidden>
                                            <label for="provider" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                Equipamentos
                                            </label>
                                            <div class="mt-2">
                                                <select name="appliance_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 dark:ring-gray-700  dark:bg-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    <option value="">Escolher</option>
                                                    @foreach ($appliances as $appliance)
                                                    <option value="{{ $appliance->id }}">
                                                        {{ $appliance->title }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2" id="typologyInput" hidden>
                                            <label for="typology_id" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Tipologia
                                                de contrato
                                            </label>
                                            <div class="mt-2">
                                                <select name="typology_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 dark:ring-gray-700  dark:bg-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    <option value="">Escolher</option>
                                                    @foreach ($typologies as $typology)
                                                    <option value="{{ $typology->id }}">
                                                        {{ $typology->title }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2" id="technicalApplianceInput" hidden>
                                            <label for="technical_appliance_id" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                Informação Tecnica de aparelhos
                                            </label>
                                            <div class="mt-2">
                                                <select name="technical_appliance_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 dark:ring-gray-700  dark:bg-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    <option value="">Escolher</option>
                                                    @foreach ($technicalAppliances as $technicalAppliance)
                                                    <option value="{{ $technicalAppliance->id }}">
                                                        {{ $technicalAppliance->title }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2" id="rangeApplianceInput" hidden>
                                            <label for="range_appliance_id" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                Nº de Equipamentos
                                            </label>
                                            <div class="mt-2">
                                                <select name="range_appliance_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 dark:ring-gray-700  dark:bg-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    <option value="">Escolher</option>
                                                    @foreach ($rangeAppliances as $rangeAppliance)
                                                    <option value="{{ $rangeAppliance->id }}">
                                                        {{ $rangeAppliance->title }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string title="Cliente/Comercial/Parceiro" name="administrator_name" idLabel="administrator_name_label" :errors="$errors->first('administrator_name')" />
                                        </div>
                                        <script>
                                            const clientTypeSelect = document.getElementById('client_type_id');
                                            const clientLabel = document.getElementById('administrator_name_label');

                                            clientTypeSelect.addEventListener('change', function() {
                                                switch (clientTypeSelect.value) {
                                                    case '1':
                                                        clientLabel.textContent = 'Administrador de Condominio';
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
                                            <x-input-string title="Empresa ou Administração de Condominio" name="condominium_administrator" :errors="$errors->first('condominium_administrator')" />
                                        </div>
                        </div>
                    </section>
                    <section id="dadosorganizacao" data-step-section class="rounded-2xl border border-gray-200 bg-white px-6 py-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ __('Dados da Organização') }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Configure fornecedor, campanhas e referências internas.') }}</p>
                            </div>
                        </div>
                        <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-6">
                            <div class="sm:col-span-2">
                                <x-input-select title="Adesão" name="provider_id" id="provider_id" :collection="$providers" :errors="$errors->first('provider_id')" />
                            </div>
                            <div class="sm:col-span-2">
                                <x-input-select title="Campanha" name="plan_id" id="plan_id" :errors="$errors->first('plan_id')" />
                            </div>
                            {{-- <div class="sm:col-span-2">
                                <label for="documentation_status_id"
                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Estado</label>
                                <select name="documentationStatuses[]"
                                    class="block w-full rounded-md border-0
                            py-1.5 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                            dark:ring-gray-700 dark:bg-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm
                            sm:leading-6"
                                    data-te-class-form-outline="block w-full rounded-md border-0 dark:ring-gray-700 dark:bg-gray-600 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 dark:ring-gray-700 dark:bg-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm"
                                    data-te-select-options-selected-label="opções selecionadas." multiple
                                    data-te-class-inputGroup="rounded data-te-select-all="false"
                                    data-te-class-dropdown="bg-[#4b5563] rounded-md text-red-500"
                                    data-te-select-init>
                                    @foreach ($documentationStatus as $doc)
                                        <option value="{{ $doc->id }}">{{ $doc->title }}
                            </option>
                            @endforeach

                            </select>
                        </div> --}}
                        {{-- <x-input-select title="Documentação" name="documentation_status_id"
                                :collection="$documentationStatus" :errors="$errors->first('documentation_status_id')" /> --}}
                        <div class="sm:col-span-2">
                            <x-input-string title="Arquivo do Cliente" name="archive" :errors="$errors->first('archive')" />
                        </div>
                    </div>
                </section>

                    <section id="dadoscontador" data-step-section class="rounded-2xl border border-gray-200 bg-white px-6 py-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ __('Dados do Contador') }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Preencha tensões, identificadores e estado documental do contador.') }}</p>
                            </div>
                        </div>
                        <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-6">
                            <div class="sm:col-span-2">
                                <x-input-select title="Tensão" name="tariff_id" :collection="$tariffs" :errors="$errors->first('tariff_id')" />
                            </div>
                            <div class="sm:col-span-2">
                                <x-input-select title="Potência:1,15->41,41" name="power_bracket_id" :collection="$powerBrackets" :errors="$errors->first('power_bracket_id')" />
                            </div>
                            <div class="sm:col-span-2" hidden id="powerParent">
                                <x-input-string title="Potência MT/AT" id="power" name="power" :errors="$errors->first('power')" />
                            </div>
                            <div class="sm:col-span-2">
                                <x-input-string title="NIF" name="nif" :errors="$errors->first('nif')" id="nif" />
                            </div>
                            <div class="sm:col-span-2">
                                <x-input-select title="Lista dos CPES" id="nif_list" name="nif_list" :errors="$errors->first('nif_list')" />
                            </div>
                            <div class="sm:col-span-2">
                                <x-input-string title="CPE/CUI" id="cpe" name="cpe" :errors="$errors->first('cpe')" />
                            </div>
                            <script>
                                const powerBracketInput = document.getElementById('power_bracket_id');
                                const powerParent = document.getElementById('powerParent');

                                powerBracketInput.addEventListener('change', async function() {
                                    if (powerBracketInput.value == 15) {
                                        powerParent.removeAttribute('hidden');
                                    } else {
                                        powerParent.setAttribute('hidden', 'true');
                                    }

                                    const cpeInput = document.getElementById('cpe');

                                    await fetch(`/mmeters/${powerBracketInput.value}`, {
                                            method: 'GET',
                                            headers: {
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                            },
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            const meterInput = document.getElementById('nif_list');
                                            meterInput.innerHTML = '<option>Escolha CPE</option>';

                                            data.forEach(item => {
                                                const option = document.createElement('option');
                                                option.value = item.nif;
                                                option.text = `${item.cpe}`;
                                                option.setAttribute('data-meter', item.id);
                                                meterInput.appendChild(option);
                                            });
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                });

                                document.getElementById('nif_list').addEventListener('change', function() {
                                    const selectedOption = this.options[this.selectedIndex];
                                    const selectedValue = selectedOption.value;
                                    const selectedMeter = selectedOption.getAttribute('data-meter');

                                    document.getElementById('nif').value = selectedValue;
                                    document.getElementById('meter_id').value = selectedMeter;
                                });

                                document.getElementById('cpe').addEventListener('change', function() {
                                    document.getElementById('meter_id').value = '';
                                });
                            </script>
                        </div>
                    </section>
                    
                    <section id="consumos" data-step-section class="rounded-2xl border border-gray-200 bg-white px-6 py-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ __('Consumos') }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Registe consumos elétricos e de gás para ajustar tarifas.') }}</p>
                            </div>
                        </div>
                        <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-6">
                                    <div class="sm:col-span-2">
                                        <x-input-number title="Simples" name="flat" :errors="$errors->first('flat')" />
                                    </div>

                                    <div class="sm:col-span-2">
                                        <x-input-number title="Pontas" name="peak" :errors="$errors->first('peak')" />
                                    </div>

                                    <div class="sm:col-span-2">
                                        <x-input-number title="Cheias" id="standard" name="standard" :errors="$errors->first('standard')" />
                                    </div>
                                    <div class="sm:col-span-2">
                                        <x-input-number title="Vazio" id="off_peak" name="off_peak" :errors="$errors->first('off_peak')" />
                                    </div>
                                    <div class="sm:col-span-2">
                                        <x-input-number title="Super Vazio" name="super_off_peak" :errors="$errors->first('super_off_peak')" />
                                    </div>
                                    <script>
                                        const flatInput = document.getElementById('flat');
                                        const peakInput = document.getElementById('peak');
                                        const standardInput = document.getElementById('standard');
                                        const offPeakInput = document.getElementById('off_peak');
                                        const superOffPeakInput = document.getElementById('super_off_peak');

                                        handleInput(peakInput, flatInput);
                                        handleInput(flatInput, peakInput);
                                        handleInput(flatInput, standardInput);
                                        handleInput(flatInput, offPeakInput);
                                        handleInput(flatInput, superOffPeakInput);

                                        function handleInput(input, dependentInput) {
                                            input.addEventListener('input', function() {
                                                if (input.value.trim() !== '') {
                                                    dependentInput.disabled = true;
                                                    dependentInput.classList.add('opacity-50', 'cursor-not-allowed');
                                                } else {
                                                    dependentInput.disabled = false;
                                                    dependentInput.classList.remove('opacity-50', 'cursor-not-allowed');
                                                }
                                            });
                                        }
                                    </script>
                                    <div class="form-group">
                                        <label for="radio-group" class="text-gray-700 dark:text-gray-200">Gás:</label>
                                        <div class="mt-2 flex space-x-4">
                                            @foreach (range(0, 4) as $value)
                                            <label class="inline-flex items-center">
                                                <input type="radio" class="form-radio text-indigo-600" name="gas" value="{{ $value }}" {{ old('gas') == $value ? 'checked' : '' }}>
                                                <span class="ml-2 dark:text-gray-200">{{ $value }}</span>
                                            </label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <x-input-price title="Preço da Potência" name="fixed_price" :errors="$errors->first('fixed_price')" />
                                    </div>

                                    <div class="sm:col-span-2">
                                <x-input-price title="Preço Energia" name="energy_price" :errors="$errors->first('energy_price')" />
                                    </div>

                                </div>
                            </section>

                    <section id="datascontrato" data-step-section class="rounded-2xl border border-gray-200 bg-white px-6 py-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ __('Datas de Contrato') }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Registe as datas principais para acompanhar o ciclo de vida do contrato.') }}</p>
                            </div>
                        </div>
                        <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-6">
                                    <div class="sm:col-span-2">
                                        <x-input-date title="Inserido" name="inserted_at" :errors="$errors->first('inserted_at')" />
                                    </div>
                                    <div class="sm:col-span-2">
                                        <x-input-date title="Assinado" name="signed_at" :errors="$errors->first('signed_at')" />
                                    </div>
                                    <div class="sm:col-span-2">
                                        <x-input-date title="Alta" name="effective_at" :errors="$errors->first('effective_at')" />
                                    </div>
                                    <div class="sm:col-span-2">
                                        <x-input-date title="Renovação" name="renewal_at" :errors="$errors->first('renewal_at')" />
                                    </div>
                                </div>
                    </section>

                    <section id="dadoscliente" data-step-section class="rounded-2xl border border-gray-200 bg-white px-6 py-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ __('Dados do Cliente') }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Preencha os dados do cliente e morada de fornecimento.') }}</p>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-6">
                                    <input type="hidden" name="client_id" id="client_id">
                                    <div class="sm:col-span-2">
                                        {{-- <x-input-select title="CAE" id="cae_id" name="cae"
                                                :collection="$caes" :errors="$errors->first('cae')" /> --}}
                                        <x-input-number title="CAE" name="cae" :errors="$errors->first('cae')" />
                                    </div>
                                    <div class="sm:col-span-2">
                                        <x-input-string title="Nome Cliente" id="name" name="name" :errors="$errors->first('name')" />
                                    </div>
                                    <div class="sm:col-span-2">
                                        <x-input-string title="Morada De Fornecimento" id="address" name="address" :errors="$errors->first('address')" />
                                    </div>
                                    <div class="sm:col-span-1">
                                        <x-input-string title="Andar" id="floor" name="floor" :errors="$errors->first('floor')" />
                                    </div>
                                    <div class="sm:col-span-1">
                                        <x-input-string title="Nº Porta" id="door" name="door" :errors="$errors->first('door')" />
                                    </div>
                                    <div class="sm:col-span-2">
                                        <x-input-string title="Codigo
                                            Postal" id="post_code" name="post_code" :errors="$errors->first('post_code')" />
                                    </div>
                                    <div class="sm:col-span-2">
                                        <x-input-string title="Codigo Freguesia" readonly={{true}} id="dmp_code" name="dmp_code" :errors="$errors->first('dmp_code')" />
                                    </div>

                                    <div class="sm:col-span-2">
                                        <x-input-select title="Distrito" id="district_id" name="district_id" :collection="$districts" :errors="$errors->first('district_id')" />
                                    </div>

                                    <div class="sm:col-span-2">
                                        <x-input-select title="Concelho" id="municipality_id" name="municipality_id" :errors="$errors->first('municipality_id')" />
                                    </div>

                                    <div class="sm:col-span-2">
                                        <x-input-select title="Freguesia" id="parish_id" name="parish_id" :errors="$errors->first('parish_id')" />
                                    </div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {

                                            const input = document.getElementById('dmp_code');

                                            input.addEventListener('blur', async () => {

                                                const inputValue = input.value;

                                                console.log(input);
                                                console.log(input.value);

                                                const districtId = inputValue.substr(0, 2);
                                                const municipalityId = inputValue.substr(2, 2);
                                                const parishId = inputValue.substr(4, 2);

                                                await fetch(
                                                        `/parish-related?parish_id=${parishId}&municipality_id=${municipalityId}&district_id=${districtId}`, {
                                                            method: 'GET',
                                                            headers: {
                                                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                            }
                                                        })
                                                    .then(response => response.json())
                                                    .then(data => {

                                                        console.log(data);


                                                        if (data.success === "false") {

                                                            input.classList.add('ring-red-300');
                                                            input.classList.remove('ring-green-300');

                                                        } else {
                                                            input.classList.add('ring-green-300');
                                                            input.classList.remove('ring-red-300');


                                                            const districtInput = document.getElementById("district_id");
                                                            var option = document.createElement('option');
                                                            option.value = data.municipality.district.id;
                                                            option.textContent = data.municipality.district.title;
                                                            option.selected = true;
                                                            districtInput.appendChild(option);

                                                            const municipalityInput = document.getElementById("municipality_id");
                                                            var option = document.createElement('option');
                                                            option.value = data.municipality.id;
                                                            option.textContent = data.municipality.title;
                                                            option.selected = true;
                                                            municipalityInput.appendChild(option);

                                                            const parishInput = document.getElementById("parish_id");
                                                            var option = document.createElement('option');
                                                            option.value = data.id;
                                                            option.textContent = data.title;
                                                            option.selected = true;
                                                            parishInput.appendChild(option);
                                                        }


                                                    })
                                                    .catch(error => {
                                                        console.log(error);
                                                    });
                                            });
                                        });
                                    </script>
                        </div>
                    </section>

                    <section id="pagamento" data-step-section class="rounded-2xl border border-gray-200 bg-white px-6 py-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ __('Forma de Pagamento') }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Indique o IBAN e preferências de faturação do cliente.') }}</p>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="nib" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">NIB</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <span class="flex select-none items-center pl-3 text-gray-700 dark:text-gray-200 sm:text-sm">PT50</span>
                                        <input type="text" name="nib" id="nib" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 dark:bg-gray-700 dark:text-gray-200 sm:text-sm sm:leading-6" placeholder="" />
                                    </div>
                                </div>
                                @error('nib')
                                    <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <x-input-select title="Entrega de fatura" name="invoice_type_id" id="invoice_type_id" :collection="$invoiceTypes" :errors="$errors->first('invoice_type_id')" />
                            </div>
                        </div>
                    </section>
                    
                    <section id="dadoscorespondencia" data-step-section class="rounded-2xl border border-gray-200 bg-white px-6 py-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ __('Dados de Correspondência') }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Morada e contactos para notificações e documentação.') }}</p>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <x-input-string title="Morada" name="mail_address" :errors="$errors->first('mail_address')" />
                            </div>
                            <div class="sm:col-span-1">
                                <x-input-string title="Andar" name="mail_floor" :errors="$errors->first('mail_floor')" />
                            </div>
                            <div class="sm:col-span-1">
                                <x-input-string title="Nº Porta" name="mail_door" :errors="$errors->first('mail_door')" />
                            </div>
                            <div class="sm:col-span-1">
                                <x-input-string title="Código Postal" name="mail_post_code" :errors="$errors->first('mail_post_code')" />
                            </div>

                            <div class="sm:col-span-2">
                                <x-input-select title="Distrito" name="mail_district_id" :collection="$districts" :errors="$errors->first('mail_district_id')" />
                            </div>
                            <div class="sm:col-span-2">
                                <x-input-select title="Concelho" name="mail_municipality_id" :errors="$errors->first('mail_municipality_id')" />
                            </div>
                            <div class="sm:col-span-2">
                                <x-input-select title="Freguesia" name="mail_parish_id" :errors="$errors->first('mail_parish_id')" />
                            </div>

                            <div class="sm:col-span-2">
                                <x-input-string title="Email Responsável" name="email" :errors="$errors->first('email')" />
                            </div>
                            <div class="sm:col-span-2">
                                <x-input-string title="Contacto Telefónico" name="phone_number" :errors="$errors->first('phone_number')" />
                            </div>
                            <div class="sm:col-span-2">
                                <x-input-string title="NIF Responsável" name="mail_nif" :errors="$errors->first('mail_nif')" />
                            </div>
                        </div>
                    </section>

                    <section id="assinatura" data-step-section class="rounded-2xl border border-gray-200 bg-white px-6 py-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ __('Assinatura') }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Dados do signatário responsável pela formalização do contrato.') }}</p>
                            </div>
                        </div>
                        <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <x-input-string title="Email da Assinatura" name="signatory_email" :errors="$errors->first('signatory_email')" />
                            </div>
                            <div class="sm:col-span-3">
                                <x-input-string title="Contacto da Assinatura" name="signatory_phone" :errors="$errors->first('signatory_phone')" />
                            </div>
                        </div>
                    </section>

                    <section id="comissoesdatas" data-step-section class="rounded-2xl border border-gray-200 bg-white px-6 py-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ __('Comissões, Datas e Devoluções') }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Controle pagamentos e devoluções para parceiros, comerciais e CVC.') }}</p>
                            </div>
                        </div>

                        <div class="mt-6 grid gap-6 lg:grid-cols-3">
                            <article class="flex flex-col gap-4 rounded-xl border border-gray-200 bg-white px-4 py-4 shadow-sm dark:border-gray-700 dark:bg-gray-900/70">
                                <h4 class="text-base font-semibold text-gray-800 dark:text-gray-100">{{ __('Comissões Parceiro') }}</h4>
                                <div class="space-y-4">
                                    <x-input-price title="Valor Pago ao Parceiro" name="administrator_paid_amount" :errors="$errors->first('administrator_paid_amount')" />
                                    <x-input-date title="Data Pagamento ao Parceiro" name="administrator_payment_date" :errors="$errors->first('administrator_payment_date')" />
                                    <x-input-price title="Devolução ao Parceiro" name="refund_adminstrator_paid_amount" :errors="$errors->first('refund_adminstrator_paid_amount')" />
                                    <x-input-date title="Data Devolução ao Parceiro" name="refund_administrator_payment_date" :errors="$errors->first('refund_administrator_payment_date')" />
                                </div>
                            </article>

                            <article class="flex flex-col gap-4 rounded-xl border border-gray-200 bg-white px-4 py-4 shadow-sm dark:border-gray-700 dark:bg-gray-900/70">
                                <h4 class="text-base font-semibold text-gray-800 dark:text-gray-100">{{ __('Comissões Comercial') }}</h4>
                                <div class="space-y-4">
                                    <x-input-price title="Valor Pago ao Comercial" name="commercial_paid_amount" :errors="$errors->first('commercial_paid_amount')" />
                                    <x-input-date title="Data Pagamento ao Comercial" name="commercial_payment_date" :errors="$errors->first('commercial_payment_date')" />
                                    <x-input-price title="Devolução ao Comercial" name="refund_commercial_paid_amount" :errors="$errors->first('refund_commercial_paid_amount')" />
                                    <x-input-date title="Data Devolução ao Comercial" name="refund_commercial_payment_date" :errors="$errors->first('refund_commercial_payment_date')" />
                                </div>
                            </article>

                            <article class="flex flex-col gap-4 rounded-xl border border-gray-200 bg-white px-4 py-4 shadow-sm dark:border-gray-700 dark:bg-gray-900/70">
                                <h4 class="text-base font-semibold text-gray-800 dark:text-gray-100">{{ __('Comissões CVC') }}</h4>
                                <div class="space-y-4">
                                    <x-input-price title="Valor Pago ao CVC" name="cvc_paid_amount" :errors="$errors->first('cvc_paid_amount')" />
                                    <x-input-date title="Data Pagamento ao CVC" name="cvc_payment_date" :errors="$errors->first('cvc_payment_date')" />
                                    <x-input-price title="Devolução ao CVC" name="refund_cvc_paid_amount" :errors="$errors->first('refund_cvc_paid_amount')" />
                                    <x-input-date title="Data Devolução ao CVC" name="refund_cvc_payment_date" :errors="$errors->first('refund_cvc_payment_date')" />
                                </div>
                            </article>
                        </div>
                    </section>

                    <section id="comissoesenergia" data-step-section class="rounded-2xl border border-gray-200 bg-white px-6 py-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ __('Comissões de Energia') }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Controle pagamentos e devoluções associados à energia CVC.') }}</p>
                            </div>
                        </div>

                        <div class="mt-6 grid gap-6 lg:grid-cols-3">
                            <article class="flex flex-col gap-4 rounded-xl border border-gray-200 bg-white px-4 py-4 shadow-sm dark:border-gray-700 dark:bg-gray-900/70">
                                <h4 class="text-base font-semibold text-gray-800 dark:text-gray-100">{{ __('Comissões CVC') }}</h4>
                                <div class="space-y-4">
                                    <x-input-price title="Valor Pago ao CVC" name="energy_cvc_paid_amount" :errors="$errors->first('energy_cvc_paid_amount')" />
                                    <x-input-date title="Data Pagamento ao CVC" name="energy_cvc_payment_date" :errors="$errors->first('energy_cvc_payment_date')" />
                                    <x-input-price title="Devolução ao CVC" name="refund_energy_cvc_paid_amount" :errors="$errors->first('refund_energy_cvc_paid_amount')" />
                                    <x-input-date title="Data Devolução ao CVC" name="refund_energy_cvc_payment_date" :errors="$errors->first('refund_energy_cvc_payment_date')" />
                                </div>
                            </article>
                        </div>
                    </section>
                    <section id="estado" data-step-section class="rounded-2xl border border-gray-200 bg-white px-6 py-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ __('Estado do Contrato') }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Selecione o estado atual e adicione observações, se necessário.') }}</p>
                            </div>
                        </div>

                        <div class="mt-6 grid gap-6 sm:grid-cols-2">
                            <x-input-select title="Status" name="status_id" :collection="$statuses" :errors="$errors->first('status_id')" />

                            <div hidden class="grid grid-cols-1 gap-4" style="display: none" id="messageParent">
                                <div>
                                    <label for="message" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">{{ __('Observações') }}</label>
                                    <div class="mt-2">
                                        <textarea id="message" rows="4" name="text" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white" placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
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

                    <section id="comissoesmensais" data-step-section class="rounded-2xl border border-gray-200 bg-white px-6 py-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ __('Comissões Mensais') }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Distribua valores e datas ao longo dos 12 meses do contrato.') }}</p>
                            </div>
                        </div>
                        <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2">
                            @foreach ($values as $label => $name)
                                <div class="grid grid-cols-2 gap-4 rounded-xl border border-gray-100 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-900/70">
                                    <x-input-price title="{{ $label }}" name="{{ $name }}" :errors="$errors->first($name)" />
                                    <x-input-date title="{{ $label }}" name="{{ 'date_' . $label }}" :errors="$errors->first($name)" />
                                </div>
                            @endforeach
                        </div>
                    </section>

                            <!--END comissões mensais-->

                    <section id="documentacao" data-step-section class="rounded-2xl border border-gray-200 bg-white px-6 py-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h3 id="required-documents-h1" class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ __('Documentação Necessária') }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('A lista adapta-se automaticamente ao tipo de cliente e serviço selecionado.') }}</p>
                            </div>
                        </div>
                        <div id="zone" class="mt-4 space-y-1 text-sm text-gray-700 dark:text-gray-200"></div>

                        <div class="mt-6 flex flex-col gap-3">
                            <label for="documentos_upload" class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Anexar Documentos') }}</label>
                            <input id="documentos_upload" type="file" class="filepond" name="filepond" multiple data-allow-reorder="true" credits="false">
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ __('Arraste os ficheiros ou clique para selecionar. Formatos aceites: PDF, JPG, PNG.') }}</p>
                        </div>
                    </section>
                            <script>
                                const clientTypeInput = document.getElementById('client_type_id');
                                const servicesInput = document.getElementById('service_id');
                                const categoryInput = document.getElementById('category_id');

                                const zone = document.getElementById('zone');

                                const oneoneone = ["ATA", "Fatura Luz", "IBAN (opcional)"];
                                const oneonetwo = ["Planta de Localização", "Ficha Eletrotécnica", "Caderneta Predial", "Alvará de Construção"];
                                const oneonethree = ["Alvará de Construção", "Ficha Eletrotécnica"];
                                const oneonefour = ["Fatura", "ATA"];
                                const onetwotwo = ['Inspeção de Gás'];
                                const onetwofive = ["Tipologia de Contrato", "Edificio"];
                                const twooneone = ['CRC', 'Fatura da Luz', 'IBAN (Opcional)'];
                                const twoonefour = ['Fatura', 'CRC'];
                                const twotwoone = ['CRC', 'Fatura da Gás', 'BAN (Opcional)'];
                                const twoTwoFour = ['CRC', 'Fatura da Gás', 'Tipologia do contrato', 'Terciarios_Trianual', 'Terciarios_Unico'];
                                const twoTwoFive = ['Tipologia do contrato', 'Terciarios_Trianual', 'Terciarios_Unico'];
                                const threeOneOne = ['Fatura da Luz', 'IBAN (Opcional)'];
                                const threeOneTwo = ['Planta de Localização', 'Ficha Eletrotécnica', 'Caderneta Predial', 'Alvará de Construção'];
                                const threeOneFour = ['Fatura da Luz'];

                                function renderOptions(array) {
                                    zone.innerHTML = '';
                                    array.forEach((item) => {
                                        const newSpan = document.createElement('p');
                                        newSpan.textContent = `- ${item}`;
                                        newSpan.classList.add('text-dark');
                                        newSpan.classList.add('dark:text-white');
                                        zone.appendChild(newSpan);
                                        zone.appendChild(document.createElement('br'));
                                    });
                                }


                                function toggleInputSelectVisibility(input) {
                                    const inputSelect = document.getElementById(input);
                                    if (!input) {
                                        clearExtraOptions();
                                        return
                                    }
                                    if (inputSelect) {
                                        if (inputSelect) {
                                            inputSelect.removeAttribute('hidden');
                                        } else {
                                            inputSelect.setAttribute('hidden', 'true');
                                        }
                                    }
                                }

                                clientTypeInput.addEventListener('click', function() {
                                    if ((clientTypeInput.value === '1' && categoryInput.value === '1' && servicesInput.value === '1') ||
                                        (clientTypeInput.value === '1' && categoryInput.value === '2' && servicesInput.value === '1')
                                    ) {
                                        renderOptions(oneoneone);
                                        toggleInputSelectVisibility();
                                    } else if ((clientTypeInput.value === '1' && categoryInput.value === '1' && servicesInput.value ===
                                            '2') ||
                                        (clientTypeInput.value === '2' && categoryInput.value === '1' && servicesInput.value === '2')
                                    ) {
                                        renderOptions(oneonetwo);
                                        toggleInputSelectVisibility();
                                    } else if ((clientTypeInput.value === '1' && categoryInput.value === '1' && servicesInput.value ===
                                            '3') ||
                                        (clientTypeInput.value === '2' && categoryInput.value === '1' && servicesInput.value === '3') ||
                                        (clientTypeInput.value === '3' && categoryInput.value === '1' && servicesInput.value === '3')
                                    ) {
                                        renderOptions(oneonethree);
                                        toggleInputSelectVisibility();
                                    } else if (clientTypeInput.value === '1' && categoryInput.value === '1' && servicesInput.value ===
                                        '4') {
                                        renderOptions(oneonefour);
                                        toggleInputSelectVisibility();
                                    } else if ((clientTypeInput.value === '1' && categoryInput.value === '2' && servicesInput.value ===
                                            '2') ||
                                        (clientTypeInput.value === '2' && categoryInput.value === '2' && servicesInput.value === '2') ||
                                        (clientTypeInput.value === '3' && categoryInput.value === '2' && servicesInput.value === '2')
                                    ) {
                                        renderOptions(onetwotwo);
                                        toggleInputSelectVisibility();
                                    } else if ((clientTypeInput.value === '1' && categoryInput.value === '2' && servicesInput.value ===
                                            '5') ||
                                        (clientTypeInput.value === '1' && categoryInput.value === '2' && servicesInput.value === '6')
                                    ) {
                                        renderOptions(onetwofive);
                                        toggleInputSelectVisibility();
                                    } else if (clientTypeInput.value === '2' && categoryInput.value === '1' && servicesInput.value ===
                                        '1') {
                                        renderOptions(twooneone);
                                        toggleInputSelectVisibility();
                                    } else if (clientTypeInput.value === '2' && categoryInput.value === '1' && servicesInput.value ===
                                        '4') {
                                        renderOptions(twoTwoFour);
                                        toggleInputSelectVisibility();
                                    } else if (clientTypeInput.value === '2' && categoryInput.value === '2' && servicesInput.value ===
                                        '5') {
                                        renderOptions(twoTwoFive);
                                        toggleInputSelectVisibility('technicalApplianceInput');
                                    } else if (clientTypeInput.value === '2' && categoryInput.value === '2' && servicesInput.value ===
                                        '6') {
                                        // renderOptions(twoTwoFive);
                                        toggleInputSelectVisibility('rangeApplianceInput');
                                    } else if (clientTypeInput.value === '3' && categoryInput.value === '1' && servicesInput.value ===
                                        '1' || clientTypeInput.value === '3' && categoryInput.value === '2' && servicesInput.value ===
                                        '1') {
                                        renderOptions(threeOneOne);
                                        toggleInputSelectVisibility();
                                    } else if (clientTypeInput.value === '3' && categoryInput.value === '1' && servicesInput.value ===
                                        '2') {
                                        renderOptions(threeOneTwo);
                                        toggleInputSelectVisibility();
                                    } else if (clientTypeInput.value === '3' && categoryInput.value === '1' && servicesInput.value ===
                                        '4' || clientTypeInput.value === '3' && categoryInput.value === '2' && servicesInput.value ===
                                        '4') {
                                        renderOptions(threeOneFour);
                                        toggleInputSelectVisibility();
                                    } else if (clientTypeInput.value === '3' && categoryInput.value === '2' && servicesInput.value ===
                                        '5' || clientTypeInput.value === '3' && categoryInput.value === '2' && servicesInput.value ===
                                        '6') {
                                        clearExtraOptions();
                                        toggleInputSelectVisibility('applianceInput');
                                        toggleInputSelectVisibility('typologyInput');
                                    } else {
                                        clearExtraOptions();
                                        toggleInputSelectVisibility();
                                    }
                                });

                                function clearExtraOptions() {
                                    const applianceInput = document.getElementById("applianceInput");
                                    const technicalApplianceInput = document.getElementById("technicalApplianceInput");
                                    const typologyInput = document.getElementById("typologyInput");
                                    const rangeApplianceInput = document.getElementById("rangeApplianceInput");

                                    if (applianceInput) {
                                        applianceInput.setAttribute("hidden", "true");
                                        applianceInput.setAttribute("disabled", "true");
                                    }
                                    if (technicalApplianceInput) {
                                        technicalApplianceInput.setAttribute("hidden", "true");
                                        technicalApplianceInput.setAttribute("disabled", "true");
                                    }
                                    if (typologyInput) {
                                        typologyInput.setAttribute("hidden", "true");
                                        typologyInput.setAttribute("disabled", "true");
                                    }
                                    if (rangeApplianceInput) {
                                        rangeApplianceInput.setAttribute("hidden", "true");
                                        rangeApplianceInput.setAttribute("disabled", "true");
                                    }
                                }
                            </script>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    const nifInput = document.getElementById("nif");
    const caeInput = document.getElementById("cae_id");
    const cpe = document.getElementById("cpe");
    const nameInput = document.getElementById("name");
    const addressInput = document.getElementById("address");
    const doorInput = document.getElementById("door");
    const floorInput = document.getElementById("floor");
    const postCodeInput = document.getElementById("post_code");
    const dmpCodeInput = document.getElementById("dmp_code");
    const districtInput = document.getElementById("district_id");
    const municipalityInput = document.getElementById("municipality_id");
    const parishInput = document.getElementById("parish_id");
    const clientInput = document.getElementById("client_id");
    const powerInput = document.getElementById("power_bracket_id");

    const nifListInput = document.getElementById("nif_list");

    nifInput.addEventListener("input", async function() {
        const nifValue = nifInput.value;

        const response = await fetch(`/cpe/getcpesbynif/${nifValue}`);
        const data = await response.json();

        console.log(data);

        if (data.length > 0) {

            for (var id in data) {
                if (data.hasOwnProperty(id)) {
                    var value = data[id].cpe;
                    var option = document.createElement('option');
                    option.value = data[id].id;
                    option.innerHTML = value;
                    nifListInput.appendChild(option);
                }
            }
        }
    });

    nifListInput.addEventListener('change', async function() {
        const selectedValue = nifListInput.value;

        const response = await fetch(`/cpe/${selectedValue}`);
        const data = await response.json();

        cpe.value = data.cpe;
        nameInput.value = data.name;
        addressInput.value = data.address;
        doorInput.value = data.door;
        postCodeInput.value = data.post_code;
        floorInput.value = data.floor;

        console.log(data);

        // var districtCode = data.district.code.toString();
        // var municipalityCode = data.municipality.code.toString();
        // var parishCode = data.parish.code.toString();

        // var dmpCode = (districtCode.length === 1 ? "0" + districtCode : districtCode) +
        //     (municipalityCode.length === 1 ? "0" + municipalityCode : municipalityCode) +
        //     (parishCode.length === 1 ? "0" + parishCode : parishCode);

        // dmpCodeInput.value = dmpCode;

        const selectedPower = data.power;
        for (var i = 0; i < powerInput.options.length; i++) {
            var option = powerInput.options[i];
            if (parseFloat(option.textContent) === parseFloat(selectedPower)) {
                option.selected = true;
                break;
            }
        }

        const selectedDistrictId = data.district.id;
        console.log(selectedDistrictId);
        for (var i = 0; i < districtInput.options.length; i++) {
            var option = districtInput.options[i];
            if (option.value == selectedDistrictId) {
                option.selected = true;
                break;
            }
        }

        console.log(selectedDistrictId);

        var option = document.createElement('option');
        option.value = data.municipality.id;
        option.textContent = data.municipality.title;
        option.selected = true;
        municipalityInput.appendChild(option);

        var parishInput = document.getElementById('parish_id');
        console.log(parishInput)
        var url = "{{ route('parish.index') }}";
        var mparams = "municipality_id=" + encodeURIComponent(data.municipality.id);

        console.log(mparams);

        await fetch(url + '?' + mparams)
            .then(async function(response) {
                if (response.ok) {
                    const jsonData = await response.json();
                    console.log(jsonData);
                    return jsonData;
                } else {
                    throw new Error('Houve um erro na solicitação AJAX.');
                }
            })
            .then(function(data) {
                console.log(data);
                parishInput.innerHTML = '<option value="" selected>Escolher Freguesia</option>';

                for (var id in data) {
                    if (data.hasOwnProperty(id)) {
                        var title = data[id].title;
                        var option = document.createElement('option');
                        option.value = data[id].id;
                        option.innerHTML = title;
                        option.setAttribute('data-code', data[id].code);
                        console.log(data[id].code);
                        parishInput.appendChild(option);
                    }
                }
            })
            .catch(function(error) {
                console.error(error);
            });
        // const districtCode = data.district.code.replace(' ', '');
        // const municipalityCode = data.municipality.code.replace(' ', '');

        // const parishCode = data.parish.code.replace(' ', '');

        // const resultString = districtCode + municipalityCode + parishCode;
        // dmpCodeInput.value = resultString;

    })
</script>

<script>
    document.getElementById('parish_id').addEventListener('change', function() {
        const districtInput = document.getElementById('district_id');
        const dSelectedOption = districtInput.options[districtInput.selectedIndex];
        const districtCode = dSelectedOption.dataset.code.padStart(2, '0'); // Adiciona zero à esquerda se necessário
        console.log(districtCode);

        const municipalityInput = document.getElementById('municipality_id');
        const mSelectedOption = municipalityInput.options[municipalityInput.selectedIndex];
        const municipalityCode = mSelectedOption.dataset.code.padStart(2, '0'); // Adiciona zero à esquerda se necessário
        console.log(municipalityCode);

        const parishInput = document.getElementById('parish_id');
        const pSelectedOption = parishInput.options[parishInput.selectedIndex];
        const parishCode = pSelectedOption.dataset.code.padStart(2, '0'); // Adiciona zero à esquerda se necessário
        console.log(parishCode);

        const resultString = districtCode + municipalityCode + parishCode;
        dmpCodeInput.value = resultString;

        console.log(resultString);
    });
</script>

<script>
    document.getElementById('provider_id').addEventListener('change', function() {
        var state = document.getElementById('plan_id');
        var url = "{{ route('plansbyproviderid') }}";
        var params = "provider_id=" + encodeURIComponent(this.value);

        fetch(url + '?' + params)
            .then(function(response) {
                console.log(response);
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Houve um erro.');
                }
            })
            .then(function(data) {
                state.innerHTML = '<option value="" selected>Escolher Plano</option>';
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
    document.getElementById('district_id').addEventListener('change', async function() {
        var state = document.getElementById('municipality_id');
        var url = "{{ route('municipality.index') }}";
        var params = "district_id=" + encodeURIComponent(this.value);

        await fetch(url + '?' + params)
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
                        option.setAttribute('data-code', data[id].code);
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

    document.getElementById('municipality_id').addEventListener('change', async function() {
        var parishInput = document.getElementById('parish_id');
        var url = "{{ route('parish.index') }}";
        var mparams = "municipality_id=" + encodeURIComponent(this.value);

        console.log(mparams);

        await fetch(url + '?' + mparams)
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Houve um erro na solicitação AJAX.');
                }
            })
            .then(function(data) {
                console.log(data);
                parishInput.innerHTML = '<option value="" selected>Escolher Freguesia</option>';

                for (var id in data) {
                    if (data.hasOwnProperty(id)) {
                        var title = data[id].title;
                        var option = document.createElement('option');
                        option.value = data[id].id;
                        option.innerHTML = title;
                        option.setAttribute('data-code', data[id].code);

                        parishInput.appendChild(option);
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
                $parish.innerHTML = '<option selected>Escolher Freguesia</option>';

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
    const inputElement = document.getElementById('documentos_upload');

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
    const stepButtons = document.querySelectorAll('[data-step-target]');
    const stepSections = document.querySelectorAll('[data-step-section]');
    const stickyHeader = document.querySelector('header.sticky') || document.querySelector('header');
    const headerOffset = stickyHeader ? stickyHeader.offsetHeight + 24 : 120;

    function scrollToSection(sectionId) {
        const section = document.getElementById(sectionId);
        if (!section) return;
        const sectionPosition = section.getBoundingClientRect().top + window.pageYOffset;
        const offsetPosition = Math.max(sectionPosition - headerOffset, 0);

        window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
    }

    stepButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const target = button.getAttribute('data-step-target');
            scrollToSection(target);
        });
    });

    const observerOptions = {
        root: null,
        rootMargin: `-${headerOffset}px 0px -55% 0px`,
        threshold: 0
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id');
                stepButtons.forEach((button) => {
                    button.classList.toggle('bg-blue-50/80', button.getAttribute('data-step-target') === id);
                    button.classList.toggle('dark:bg-blue-500/10', button.getAttribute('data-step-target') === id);
                    button.classList.toggle('text-blue-600', button.getAttribute('data-step-target') === id);
                    button.classList.toggle('dark:text-blue-300', button.getAttribute('data-step-target') === id);
                    const numberBadge = button.querySelector('[data-step-number]');
                    if (numberBadge) {
                        numberBadge.classList.toggle('border-blue-500', button.getAttribute('data-step-target') === id);
                        numberBadge.classList.toggle('text-blue-600', button.getAttribute('data-step-target') === id);
                    }
                });
            }
        });
    }, observerOptions);

    stepSections.forEach((section) => observer.observe(section));
</script>
