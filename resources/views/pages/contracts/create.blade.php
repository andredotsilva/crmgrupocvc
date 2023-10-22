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
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 dark:ring-gray-700  dark:bg-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
                                            <x-input-string title="Nome Comercial" name="commercial_code"
                                                id="commercial_code" :errors="$errors->first('commercial_code')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Nome Comercial" name="commercial_id"
                                                :errors="$errors->first('commercial_id')" :collection="$commercials" hasAuth :errors="$errors->first('commercial_id')" />
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
                                            <x-input-select title="Serviço" name="service_id" :errors="$errors->first('service_id')"
                                                :collection="$services" :errors="$errors->first('service_id')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Soluções" name="category_id" :collection="$categories"
                                                :errors="$errors->first('category_id')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-select
                                                title="Tipo
                                            de Adesão"
                                                name="client_type_id" :collection="$clientTypes" :errors="$errors->first('client_type_id')" />
                                        </div>

                                        <div class="sm:col-span-2" id="applianceInput" hidden>
                                            <label for="provider"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                Equipamentos
                                            </label>
                                            <div class="mt-2">
                                                <select name="appliance_id"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 dark:ring-gray-700  dark:bg-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    <option value="">Escolher</option>
                                                    @foreach ($appliances as $appliance)
                                                        <option value="{{ $appliance->id }}">
                                                            {{ $appliance->title }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2" id="typologyInput" hidden>
                                            <label for="typology_id"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Tipologia
                                                de contrato
                                            </label>
                                            <div class="mt-2">
                                                <select name="typology_id"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 dark:ring-gray-700  dark:bg-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
                                            <label for="technical_appliance_id"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                Informação Tecnica de aparelhos
                                            </label>
                                            <div class="mt-2">
                                                <select name="technical_appliance_id"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 dark:ring-gray-700  dark:bg-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
                                            <label for="range_appliance_id"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                Nº de Equipamentos
                                            </label>
                                            <div class="mt-2">
                                                <select name="range_appliance_id"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 dark:ring-gray-700  dark:bg-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
                                            <x-input-string title="Cliente/Administrador" name="administrator_name"
                                                idLabel="administrator_name_label" :errors="$errors->first('administrator_name')" />
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
                                            <x-input-string title="Administração de Condominio"
                                                name="condominium_administrator" :errors="$errors->first('condominium_administrator')" />
                                        </div>
                                    </div>
                                </div>

                                <!--Dados ORGANIZAÇÃO-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="dadosorganizacao">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">DADOS DA ORGANIZAÇÃO</h1>
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Adesão" name="provider_id" id="provider_id"
                                                :collection="$providers" :errors="$errors->first('provider_id')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Campanha" name="plan_id" id="plan_id"
                                                :errors="$errors->first('plan_id')" />
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
                                            <x-input-string
                                                title="Arquivo
                                                do Cliente"
                                                name="archive" :errors="$errors->first('archive')" />
                                        </div>
                                    </div>
                                </div>

                                <!--Dados Contador-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="dadoscontador">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">DADOS Contador</h1>
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Tensão" name="tariff_id" :collection="$tariffs"
                                                :errors="$errors->first('tariff_id')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-select title="Potência/Escalão" name="power_bracket_id"
                                                :collection="$powerBrackets" :errors="$errors->first('power_bracket_id')" />
                                        </div>
                                        <div class="sm:col-span-2" hidden id="powerParent">
                                            <x-input-string title="Pôtencia/CUI" id="power" name="power"
                                                :errors="$errors->first('power')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string title="NIF" name="nif" :errors="$errors->first('nif')"
                                                id="nif" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-select title="nif_list" id="nif_list" name="nif_list"
                                                :errors="$errors->first('nif_list')" />
                                            {{-- <x-input-string title="NIF" name="nif" :errors="$errors->first('nif')"
                                                id="nif" /> --}}
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string title="CPE/CUI" id="cpe" name="cpe"
                                                :errors="$errors->first('cpe')" />
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
                                            });
                                        </script>

                                        {{-- <script>
                                            document.getElementById('nif').addEventListener('change', async function() {

                                                const nifInput = document.getElementById('nif');

                                                nifInput.a



                                                console.log('aqui');
                                                // var state = document.getElementById('mail_municipality_id');
                                                // var url = "{{ route('municipality.index') }}";
                                                // var params = "district_id=" + encodeURIComponent(this.value);

                                                await fetch(`/cpe/getcpesbynif?nif=${nif}`)
                                                    .then(
                                                        return await response.json())
                                                    .then(

                                                        console.log(response);
                                                        // function(data) {
                                                        //     state.innerHTML = '<option selected>Escolher Concelho</option>';
                                                        //     for (var id in data) {
                                                        //         if (data.hasOwnProperty(id)) {
                                                        //             var value = data[id].title;
                                                        //             var option = document.createElement('option');
                                                        //             option.value = data[id].id;
                                                        //             option.innerHTML = value;
                                                        //             state.appendChild(option);
                                                        //         }
                                                        //     }
                                                        // }
                                                    )
                                                    .catch(function(error) {
                                                        console.error(error);
                                                    });
                                            });
                                        </script> --}}
                                    </div>
                                </div>
                                <!--END Dados Contador-->

                                <!--Consumos-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="consumos">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">Consumos</h1>
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-2">
                                            <x-input-number title="Simples" name="flat" :errors="$errors->first('flat')" />
                                        </div>

                                        <div class="sm:col-span-2">
                                            <x-input-number title="Pontas" name="peak" :errors="$errors->first('peak')" />
                                        </div>

                                        <div class="sm:col-span-2">
                                            <x-input-number title="Cheias" id="standard" name="standard"
                                                :errors="$errors->first('standard')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-number title="Vazio" id="off_peak" name="off_peak"
                                                :errors="$errors->first('off_peak')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-number title="Super Vazio" name="super_off_peak"
                                                :errors="$errors->first('super_off_peak')" />
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
                                            <label for="radio-group"
                                                class="text-gray-700 dark:text-gray-200">Gás:</label>
                                            <div class="mt-2 flex space-x-4">
                                                @foreach (range(0, 4) as $value)
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio text-indigo-600"
                                                            name="gas" value="{{ $value }}"
                                                            {{ old('gas') == $value ? 'checked' : '' }}>
                                                        <span
                                                            class="ml-2 dark:text-gray-200">{{ $value }}</span>
                                                    </label>
                                                @endforeach
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
                                </div>

                                <!--Dados Cliente-->
                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="dadoscliente">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">Dados Cliente</h1>

                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <input type="hidden" name="client_id" id="client_id">
                                        <div class="sm:col-span-2">
                                            {{-- <x-input-select title="CAE" id="cae_id" name="cae_id"
                                                :collection="$caes" :errors="$errors->first('cae_id')" /> --}}
                                            <x-input-number title="CAE" name="cae" :errors="$errors->first('cae')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string title="Nome Cliente" id="name" name="name"
                                                :errors="$errors->first('name')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string title="Morada De Fornecimento" id="address"
                                                name="address" :errors="$errors->first('address')" />
                                        </div>
                                        <div class="sm:col-span-1">
                                            <x-input-string title="Andar" id="floor" name="floor"
                                                :errors="$errors->first('floor')" />
                                        </div>
                                        <div class="sm:col-span-1">
                                            <x-input-string title="Nº Porta" id="door" name="door"
                                                :errors="$errors->first('door')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string
                                                title="Codigo
                                            Postal"
                                                id="post_code" name="post_code" :errors="$errors->first('post_code')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string
                                                title="Codigo
                                            Freguesia"
                                                id="dmp_code" name="dmp_code" :errors="$errors->first('dmp_code')" />
                                        </div>

                                        <div class="sm:col-span-2">
                                            <x-input-select title="Distrito" id="district_id" name="district_id"
                                                :collection="$districts" :errors="$errors->first('district_id')" />
                                        </div>

                                        <div class="sm:col-span-2">
                                            <x-input-select title="Concelho" id="municipality_id"
                                                name="municipality_id" :errors="$errors->first('municipality_id')" />
                                        </div>

                                        <div class="sm:col-span-2">
                                            <x-input-select title="Freguesia" id="parish_id" name="parish_id"
                                                :errors="$errors->first('parish_id')" />
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
                                </div>
                                <!--END Dados Cliente-->

                                <!--Forma Pagamento-->
                                <section id="pagamento">
                                    <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                        id="pagamento">
                                        <h1 class="text-lg pb-4 dark:text-gray-200">Forma de Pagamento</h1>
                                        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                            <div class="sm:col-span-2">
                                                <x-input-string title="NIB" name="nib" :errors="$errors->first('nib')" />
                                            </div>
                                            <div class="sm:col-span-2">
                                                <x-input-select title="Fatura" name="invoice_type_id"
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
                                            <x-input-string title="Morada" name="mail_address" :errors="$errors->first('mail_address')" />
                                        </div>
                                        <div class="sm:col-span-1">
                                            <x-input-string title="Andar" name="mail_floor" :errors="$errors->first('mail_floor')" />
                                        </div>
                                        <div class="sm:col-span-1">
                                            <x-input-string title="Nº Porta" name="mail_door" :errors="$errors->first('mail_door')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string title="Codigo Postal" name="mail_post_code"
                                                :errors="$errors->first('mail_post_code')" />
                                        </div>

                                        <div class="sm:col-span-2">
                                            <x-input-select title="Distrito" name="mail_district_id"
                                                :errors="$errors->first('mail_district_id')" :collection="$districts" :errors="$errors->first('service_id')" />
                                        </div>

                                        <div class="sm:col-span-2">
                                            <x-input-select title="Concelho" name="mail_municipality_id"
                                                :errors="$errors->first('mail_municipality_id')" />
                                        </div>

                                        <div class="sm:col-span-2">
                                            <x-input-select title="Freguesia" name="mail_parish_id"
                                                :errors="$errors->first('mail_parish_id')" />
                                        </div>

                                        <div class="sm:col-span-2">
                                            <x-input-string
                                                title="Email
                                        Responsável"
                                                name="email" :errors="$errors->first('email')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string
                                                title="Contacto
                                                Telefónico"
                                                name="phone_number" :errors="$errors->first('phone_number')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string
                                                title="NIF
                                            Responsável"
                                                name="mail_nif" :errors="$errors->first('mail_nif')" />
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
                                                Assinatura"
                                                name="signatory_email" :errors="$errors->first('signatory_email')" />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <x-input-string
                                                title="Contacto
                                            Assinatura"
                                                name="signatory_phone" :errors="$errors->first('signatory_phone')" />
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
                                                <x-input-price title="Valor Pago ao Administrador"
                                                    name="administrator_paid_amount" :errors="$errors->first('administrator_paid_amount')" />
                                            </div>
                                            <div class="sm:col-span-2">
                                                <x-input-date title=" Data Pagamento ao Administrador"
                                                    name="administrator_payment_date" :errors="$errors->first('administrator_payment_date')" />
                                            </div>
                                            <div class="sm:col-span-2 mt-5">
                                                <x-input-price title="Devolução ao Administrador"
                                                    name="refund_adminstrator_paid_amount" :errors="$errors->first('refund_adminstrator_paid_amount')" />
                                            </div>
                                            <div class="sm:col-span-2">
                                                <x-input-date title="Data Devolução ao Administrador"
                                                    name="refund_administrator_payment_date" :errors="$errors->first('refund_administrator_payment_date')" />
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="text-md pb-4 dark:text-gray-200">Comissões Comercial</h3>
                                            <div class="sm:col-span-2">
                                                <x-input-price title="Valor Pago ao Comercial"
                                                    name="commercial_paid_amount" :errors="$errors->first('commercial_paid_amount')" />
                                            </div>
                                            <div class="sm:col-span-2">
                                                <x-input-date title="Data Pagamento ao Comercial"
                                                    name="commercial_payment_date" :errors="$errors->first('commercial_payment_date')" />
                                            </div>
                                            <div class="sm:col-span-2 mt-5">
                                                <x-input-price title="Devolução ao Comercial"
                                                    name="refund_commercial_paid_amount" :errors="$errors->first('refund_commercial_paid_amount')" />

                                            </div>
                                            <div class="sm:col-span-2">
                                                <x-input-date title="Data Devolução ao Comercial"
                                                    name="refund_commercial_payment_date" :errors="$errors->first('refund_commercial_payment_date')" />
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="text-md pb-4 dark:text-gray-200">Comissões CVC</h3>
                                            <div class="sm:col-span-2">
                                                <x-input-price title="Valor Pago ao CVC" name="cvc_paid_amount"
                                                    :errors="$errors->first('cvc_paid_amount')" />
                                            </div>
                                            <div class="sm:col-span-2">
                                                <x-input-date title="Data Pagamento ao CVC" name="cvc_payment_date"
                                                    :errors="$errors->first('cvc_payment_date')" />
                                            </div>
                                            <div class="sm:col-span-2 mt-5">
                                                <x-input-price title="Devolução ao CVC" name="refund_cvc_paid_amount"
                                                    :errors="$errors->first('refund_cvc_paid_amount')" />
                                            </div>
                                            <div class="sm:col-span-2">
                                                <x-input-date title="Data Devolução ao CVC"
                                                    name="refund_cvc_payment_date" :errors="$errors->first('refund_cvc_payment_date')" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--END Comissões-->

                                <div
                                    class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800">
                                    <div class="sm:col-span-2">
                                        <x-input-select title="Status" name="status_id" :collection="$statuses"
                                            :errors="$errors->first('status_id')" />
                                    </div>
                                    <div hidden class="grid grid-cols-1 gap-x-6 gap-y-8" style="display: none"
                                        id="messageParent">
                                        <div class="sm:col-span-4">
                                            <label for="message"
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Observações</label>
                                            <div class="mt-2">
                                                <textarea id="message" rows="4" name="text"
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:dark:bg-gray-600 dark:focus:border-blue-500"
                                                    placeholder=""></textarea>
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
                                            <div class="grid grid-cols-2 gap-x-4">
                                                <div>
                                                    <x-input-price title="{{ $label }}"
                                                        name="{{ $name }}" :errors="$errors->first($name)" />
                                                </div>
                                                <div>
                                                    <x-input-date title="{{ $label }}"
                                                        name="{{ 'date_' . $label }}" :errors="$errors->first($name)" />
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!--END comissões mensais-->

                                <div
                                    class="mt-10 gap-x-6 gap-y-8 flex flex-col text-white p-6 rounded-2xl bg-white dark:bg-gray-800">
                                    <h1 id="required-documents-h1" class="text-lg pb-4 dark:text-gray-200">Lista de
                                        documentos necessarios:</h1>
                                    <div id="zone"></div>
                                </div>
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

                                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800"
                                    id="documentacao">
                                    <h1 class="text-lg pb-4 dark:text-gray-200">Inserir Ficheiros</h1>
                                    <div class="sm:col-span-2">
                                        <div class="mt-2">
                                            <input type="file" class="filepond" name="filepond" multiple
                                                data-allow-reorder="true" credits="false">
                                        </div>
                                    </div>
                                </div>
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
        // dmpCodeInput.value = data[0].client.dmp_code;

        const selectedPower = data.power;
        for (var i = 0; i < powerInput.options.length; i++) {
            var option = powerInput.options[i];
            if (parseFloat(option.textContent) === parseFloat(selectedPower)) {
                option.selected = true;
                break;
            }
        }

        const selectedDistrictId = data.district.id;
        for (var i = 0; i < districtInput.options.length; i++) {
            var option = districtInput.options[i];
            if (option.value == selectedDistrictId) {
                option.selected = true;
                break;
            }
        }

        var option = document.createElement('option');
        option.value = data.municipality.id;
        option.textContent = data.municipality.title;
        option.selected = true;
        municipalityInput.appendChild(option);

        var option = document.createElement('option');
        option.value = data.parish.id;
        option.textContent = data.parish.title;
        option.selected = true;
        parishInput.appendChild(option);

        // const districtCode = data.district.code.replace(' ', '');
        // const municipalityCode = data.municipality.code.replace(' ', '');
        // const parishCode = data.parish.code.replace(' ', '');

        const resultString = districtCode + municipalityCode + parishCode;
        dmpCodeInput.value = resultString;

    })
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
