@php
    use Illuminate\Support\Str;

    $clientTypeId = $contract->clientType?->id;
    $clientTypeLabel = match ($clientTypeId) {
        1 => 'Administrador de Condomínio',
        2 => 'Sócio Gerente',
        3 => 'Cliente',
        default => 'Tipo de Cliente',
    };

    $districtCode = null;
    $municipalityCode = null;
    $parishCode = null;

    if ($contract->client?->district && $contract->client?->municipality && $contract->client?->parish) {
        $districtCode = str_pad(preg_replace('/\s+/', '', $contract->client->district->code), 2, '0', STR_PAD_LEFT);
        $municipalityCode = str_pad(preg_replace('/\s+/', '', $contract->client->municipality->code), 2, '0', STR_PAD_LEFT);
        $parishCode = str_pad(preg_replace('/\s+/', '', $contract->client->parish->code), 2, '0', STR_PAD_LEFT);
    }

    $contractCode = Str::upper(Str::limit($contract->id, 12, '…'));
@endphp

<x-app-layout>
    <x-slot name="header" class="pt-8">
        <div class="flex flex-col gap-5">
            <nav class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-300 flex-wrap">
                <a href="{{ route('dashboard') }}" class="hover:text-blue-600 dark:hover:text-blue-300">Dashboard</a>
                <span>/</span>
                <a href="{{ route('servicos') }}" class="hover:text-blue-600 dark:hover:text-blue-300">{{ __('Serviços') }}</a>
                <span>/</span>
                <a href="#" class="hover:text-blue-600 dark:hover:text-blue-300">{{ __('Energia e Gás') }}</a>
                <span>/</span>
                <span class="text-blue-600 dark:text-blue-300 font-semibold">Contrato {{ $contractCode }}</span>
            </nav>

            <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                        {{ __('Contrato') }} {{ $contractCode }}
                    </h1>
                    <div class="mt-2 flex flex-wrap items-center gap-2 text-xs">
                        <span class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 font-semibold text-blue-700">
                            {{ $contract->statuses->title ?? 'Sem estado' }}
                        </span>
                        @if ($contract->provider)
                            <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-slate-700">
                                {{ $contract->provider->acronym ?? $contract->provider->title }}
                            </span>
                        @endif
                        @if ($contract->plan)
                            <span class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-emerald-700">
                                {{ $contract->plan->title }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('contracts.edit', $contract->id) }}"
                       class="inline-flex items-center justify-center rounded-full bg-blue-500 px-5 py-2 text-sm font-semibold text-white shadow hover:bg-blue-600 transition">
                        {{ __('Editar Contrato') }}
                    </a>
                    <a href="{{ route('contracts.index') }}"
                       class="inline-flex items-center justify-center rounded-full border border-gray-200 bg-white px-5 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 transition dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                        {{ __('Voltar à lista') }}
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="bg-slate-100 dark:bg-gray-900 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <section class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">
                <article class="rounded-2xl border border-slate-200 bg-white px-5 py-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Back Office') }}</p>
                    <p class="mt-1 text-xl font-semibold text-gray-900 dark:text-gray-100">
                        {{ $contract->backofficer->name ?? '—' }}
                    </p>
                </article>

                <article class="rounded-2xl border border-slate-200 bg-white px-5 py-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Código Comerciante') }}</p>
                    <p class="mt-1 text-xl font-semibold text-gray-900 dark:text-gray-100">
                        {{ $contract->commercial?->code ?? '—' }}
                    </p>
                </article>

                <article class="rounded-2xl border border-slate-200 bg-white px-5 py-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Nome Comercial') }}</p>
                    <p class="mt-1 text-xl font-semibold text-gray-900 dark:text-gray-100">
                        {{ $contract->commercial?->name ?? '—' }}
                    </p>
                </article>

                <article class="rounded-2xl border border-slate-200 bg-white px-5 py-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Administrador de Condomínio') }}</p>
                    <p class="mt-1 text-xl font-semibold text-gray-900 dark:text-gray-100">
                        {{ $contract->client?->condominium_administrator ?? '—' }}
                    </p>
                </article>
            </section>

            <section class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <article class="rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <header class="border-b border-slate-100 px-6 py-5 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('Dados da Proposta') }}</h2>
                    </header>
                    <div class="px-6 py-5 grid gap-4 text-sm text-gray-600 dark:text-gray-300">
                        <div class="flex justify-between">
                            <span>{{ __('Serviço') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $contract->service?->title ?? '—' }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span>{{ __('Categoria') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $contract->category?->title ?? '—' }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span>{{ __('Tipo de Cliente') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $clientTypeLabel }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>{{ __('Adesão (Fornecedor)') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $contract->provider?->title ?? '—' }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span>{{ __('Campanha / Plano') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $contract->plan?->title ?? '—' }}
                            </span>
                        </div>
                        <div>
                            <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Status e Observações') }}</span>
                            <p class="mt-1 font-semibold text-gray-900 dark:text-gray-100">
                                {{ $contract->statuses->title ?? '—' }}
                            </p>
                            <p class="mt-2 text-sm leading-6">
                                {{ $contract->notes->text ?? 'Sem observações registadas.' }}
                            </p>
                            @if ($contract->notes)
                                <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                    {{ __('Editado por') }} {{ $contract->notes->backOfficer?->name ?? __('Informação não disponível') }}
                                    {{ __('em') }} {{ optional($contract->notes->updated_at)->format('d/m/Y H:i') ?? __('Data não disponível') }}
                                </p>
                            @endif
                        </div>
                        <div class="flex justify-between">
                            <span>{{ __('Arquivo do Cliente') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $contract->archive ?? '—' }}
                            </span>
                        </div>
                    </div>
                </article>

                <article class="rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <header class="border-b border-slate-100 px-6 py-5 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('Dados do Contador & Consumos') }}</h2>
                    </header>
                    <div class="px-6 py-5 grid gap-4 text-sm text-gray-600 dark:text-gray-300">
                        <div class="flex justify-between">
                            <span>{{ __('Tensão / Tarifa') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $contract->meter?->tariff?->title ?? '—' }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span>{{ __('NIF') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $contract->meter?->nif ?? '—' }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span>{{ __('CPE / CUI') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $contract->meter?->cpe ?? '—' }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span>{{ __('Potência / Escalão') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                @if ($contract->meter?->power_bracket_id === 15)
                                    {{ __('Outra') }} {{ ($contract->meter->power ?? 0) / 100 }}
                                @else
                                    {{ $contract->meter?->powerbracket?->title ?? '—' }}
                                @endif
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span>{{ __('Consumo Simples') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $contract->meter?->flat ?? '—' }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span>{{ __('Consumo Pontas') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $contract->meter?->peak ?? '—' }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span>{{ __('Consumo Cheias') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $contract->meter?->standard ?? '—' }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span>{{ __('Consumo Vazio') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $contract->meter?->off_peak ?? '—' }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span>{{ __('Consumo Super Vazio') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $contract->meter?->super_off_peak ?? '—' }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span>{{ __('Consumo Gás') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $contract->meter?->gas ?? '—' }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span>{{ __('Preço Fixo') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $contract->meter?->fixed_price ? number_format($contract->meter->fixed_price / 100, 2, ',', '.') . ' €' : '—' }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span>{{ __('Preço Energia') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $contract->meter?->energy_price ? number_format($contract->meter->energy_price / 100, 4, ',', '.') . ' €' : '—' }}
                            </span>
                        </div>
                    </div>
                </article>
            </section>

            <section class="rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <header class="border-b border-slate-100 px-6 py-5 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('Dados do Cliente') }}</h2>
                </header>
                <div class="px-6 py-5 grid gap-4 md:grid-cols-2 text-sm text-gray-600 dark:text-gray-300">
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('CAE') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->client?->cae ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Nome do Cliente') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->client?->name ?? '—' }}
                        </span>
                    </div>
                    <div class="md:col-span-2">
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Morada de Fornecimento') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->client?->address ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Andar / Fração') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->client?->floor ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Código Postal') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->client?->post_code ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Código de Freguesia') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            @if ($districtCode && $municipalityCode && $parishCode)
                                {{ $districtCode }} {{ $municipalityCode }} {{ $parishCode }}
                            @else
                                —
                            @endif
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Distrito') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->client?->district?->title ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Concelho') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->client?->municipality?->title ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Freguesia') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->client?->parish?->title ?? '—' }}
                        </span>
                    </div>
                </div>
            </section>

            <section class="rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <header class="border-b border-slate-100 px-6 py-5 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('Dados de Correspondência') }}</h2>
                </header>
                <div class="px-6 py-5 grid gap-4 md:grid-cols-2 text-sm text-gray-600 dark:text-gray-300">
                    <div class="md:col-span-2">
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Morada') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->mailingAddress?->address ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Número Porta') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->mailingAddress?->door ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Código Postal') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->mailingAddress?->post_code ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Freguesia') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->mailingAddress?->parish?->title ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Concelho') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->mailingAddress?->municipality?->title ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Distrito') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->mailingAddress?->district?->title ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Email') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->mailingAddress?->email ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Contacto Telefónico') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->mailingAddress?->phone_number ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('NIF Responsável') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->mailingAddress?->nif ?? '—' }}
                        </span>
                    </div>
                </div>
            </section>

            <section class="rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <header class="border-b border-slate-100 px-6 py-5 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('Assinatura & Faturação') }}</h2>
                </header>
                <div class="px-6 py-5 grid gap-4 md:grid-cols-2 text-sm text-gray-600 dark:text-gray-300">
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Email Assinatura') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->signatory_email ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Contacto Assinatura') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->signatory_phone ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('NIB / IBAN') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->nib ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Tipo de Fatura') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->invoiceType?->title ?? '—' }}
                        </span>
                    </div>
                </div>
            </section>

            <section class="rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <header class="border-b border-slate-100 px-6 py-5 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('Datas do Contrato') }}</h2>
                </header>
                <div class="px-6 py-5 grid gap-4 md:grid-cols-2 text-sm text-gray-600 dark:text-gray-300">
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Inserido em') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->inserted_at ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Assinado em') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->signed_at ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Alta') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->effective_at ?? '—' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Renovação') }}</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ $contract->renewal_at ?? '—' }}
                        </span>
                    </div>
                </div>
            </section>

            <section class="rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <header class="border-b border-slate-100 px-6 py-5 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('Comissões, Pagamentos e Devoluções') }}</h2>
                </header>
                <div class="px-6 py-5 grid gap-6 lg:grid-cols-3 text-sm text-gray-600 dark:text-gray-300">
                    @foreach (Auth()->user()->roles as $role)
                        @if ($role->id === 1 || $role->id === 2)
                            <article class="rounded-xl border border-slate-100 bg-slate-50 p-5 shadow-sm dark:border-gray-600 dark:bg-gray-700">
                                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100 mb-3">{{ __('Comissões Administrador') }}</h3>
                                <dl class="space-y-2">
                                    <div class="flex justify-between">
                                        <dt>{{ __('Valor Pago') }}</dt>
                                        <dd class="font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $contract->commission ? number_format($contract->commission->administrator_paid_amount / 100, 2, ',', '.') . ' €' : '—' }}
                                        </dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt>{{ __('Data Pagamento') }}</dt>
                                        <dd class="font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $contract->commission->administrator_payment_date ?? '—' }}
                                        </dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt>{{ __('Devolução') }}</dt>
                                        <dd class="font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $contract->commission ? number_format($contract->commission->refund_administrator_paid_amount / 100, 2, ',', '.') . ' €' : '—' }}
                                        </dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt>{{ __('Data Devolução') }}</dt>
                                        <dd class="font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $contract->commission->refund_administrator_payment_date ?? '—' }}
                                        </dd>
                                    </div>
                                </dl>
                            </article>
                        @endif

                        @if ($role->id <= 3)
                            <article class="rounded-xl border border-slate-100 bg-slate-50 p-5 shadow-sm dark:border-gray-600 dark:bg-gray-700">
                                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100 mb-3">{{ __('Comissões Comercial') }}</h3>
                                <dl class="space-y-2">
                                    <div class="flex justify-between">
                                        <dt>{{ __('Valor Pago') }}</dt>
                                        <dd class="font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $contract->commission ? number_format($contract->commission->commercial_paid_amount / 100, 2, ',', '.') . ' €' : '—' }}
                                        </dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt>{{ __('Data Pagamento') }}</dt>
                                        <dd class="font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $contract->commission->commercial_payment_date ?? '—' }}
                                        </dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt>{{ __('Devolução') }}</dt>
                                        <dd class="font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $contract->commission ? number_format($contract->commission->refund_commercial_paid_amount / 100, 2, ',', '.') . ' €' : '—' }}
                                        </dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt>{{ __('Data Devolução') }}</dt>
                                        <dd class="font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $contract->commission->refund_commercial_payment_date ?? '—' }}
                                        </dd>
                                    </div>
                                </dl>
                            </article>
                        @endif

                        @if ($role->id === 1)
                            <article class="rounded-xl border border-slate-100 bg-slate-50 p-5 shadow-sm dark:border-gray-600 dark:bg-gray-700">
                                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100 mb-3">{{ __('Comissões CVC') }}</h3>
                                <dl class="space-y-2">
                                    <div class="flex justify-between">
                                        <dt>{{ __('Valor Pago') }}</dt>
                                        <dd class="font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $contract->commission ? number_format($contract->commission->cvc_paid_amount / 100, 2, ',', '.') . ' €' : '—' }}
                                        </dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt>{{ __('Data Pagamento') }}</dt>
                                        <dd class="font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $contract->commission->cvc_payment_date ?? '—' }}
                                        </dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt>{{ __('Devolução') }}</dt>
                                        <dd class="font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $contract->commission ? number_format($contract->commission->refund_cvc_paid_amount / 100, 2, ',', '.') . ' €' : '—' }}
                                        </dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt>{{ __('Data Devolução') }}</dt>
                                        <dd class="font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $contract->commission->refund_cvc_payment_date ?? '—' }}
                                        </dd>
                                    </div>
                                </dl>
                            </article>
                        @endif
                    @endforeach
                </div>
            </section>

            @foreach (Auth()->user()->roles as $role)
                @if ($role->id === 1 || $role->id === 2)
                    <section class="rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <header class="border-b border-slate-100 px-6 py-5 dark:border-gray-700">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('Comissões Mensais') }}</h2>
                        </header>
                        <div class="px-6 py-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                            @for ($i = 1; $i <= 12; $i++)
                                @php
                                    $amountKey = 'amount_' . str_pad($i, 2, '0', STR_PAD_LEFT) . '_12';
                                    $dateKey = 'date_' . str_pad($i, 2, '0', STR_PAD_LEFT) . '_12';
                                    $amountValue = $contract->monthlyCommission?->$amountKey;
                                    $dateValue = $contract->monthlyCommission?->$dateKey;
                                @endphp
                                <article class="rounded-xl border border-slate-100 bg-slate-50 p-4 shadow-sm dark:border-gray-600 dark:bg-gray-700">
                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2">
                                        {{ $i }} / 12
                                    </h3>
                                    <dl class="space-y-1 text-sm">
                                        <div class="flex items-center justify-between">
                                            <dt class="text-gray-500 dark:text-gray-400">{{ __('Montante') }}</dt>
                                            <dd class="font-semibold text-gray-900 dark:text-gray-100">
                                                {{ $amountValue ? number_format($amountValue / 100, 2, ',', '.') . ' €' : '—' }}
                                            </dd>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <dt class="text-gray-500 dark:text-gray-400">{{ __('Data') }}</dt>
                                            <dd class="font-semibold text-gray-900 dark:text-gray-100">{{ $dateValue ?? '—' }}</dd>
                                        </div>
                                    </dl>
                                </article>
                            @endfor
                        </div>
                    </section>
                @endif
            @endforeach

            <section class="rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <header class="border-b border-slate-100 px-6 py-5 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('Documentos deste Contrato') }}</h2>
                </header>
                <div class="px-6 py-6">
                    @if ($contract->files->count() > 0)
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                            @foreach ($contract->files as $file)
                                @php $deleteFormId = 'delete-form-' . $file->id; @endphp
                                <article class="flex flex-col items-center justify-between gap-3 rounded-xl border border-slate-200 bg-slate-50 p-4 text-center shadow-sm dark:border-gray-600 dark:bg-gray-700">
                                    <a href="{{ route('download', ['id' => $file->id]) }}" class="flex flex-col items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-800 dark:text-blue-300 dark:hover:text-blue-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 256 256">
                                            <path d="M224,152a8,8,0,0,1-8,8H192v16h16a8,8,0,0,1,0,16H192v16a8,8,0,0,1-16,0V152a8,8,0,0,1,8-8h32A8,8,0,0,1,224,152ZM92,172a28,28,0,0,1-28,28H56v8a8,8,0,0,1-16,0V152a8,8,0,0,1,8-8H64A28,28,0,0,1,92,172Zm-16,0a12,12,0,0,0-12-12H56v24h8A12,12,0,0,0,76,172Zm88,8a36,36,0,0,1-36,36H112a8,8,0,0,1-8-8V152a8,8,0,0,1,8-8h16A36,36,0,0,1,164,180Zm-16,0a20,20,0,0,0-20-20h-8v40h8A20,20,0,0,0,148,180ZM40,112V40A16,16,0,0,1,56,24h96a8,8,0,0,1,5.66,2.34l56,56A8,8,0,0,1,216,88v24a8,8,0,0,1-16,0V96H152a8,8,0,0,1-8-8V40H56v72a8,8,0,0,1-16,0ZM160,80h28.69L160,51.31Z"></path>
                                        </svg>
                                        <span class="break-words">{{ $file->filename }}</span>
                                    </a>
                                    <form id="{{ $deleteFormId }}" action="{{ route('delete', ['id' => $file->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button type="submit" form="{{ $deleteFormId }}"
                                            class="text-sm font-semibold text-red-500 hover:text-red-600">
                                        {{ __('Excluir') }}
                                    </button>
                                </article>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-500 dark:text-gray-300">{{ __('Nenhum arquivo associado a este contrato.') }}</p>
                    @endif
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
