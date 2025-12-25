<x-app-layout>
    <x-slot name="header" class="pt-8">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <div class="flex items-center py-2 text-sm text-gray-500 dark:text-gray-300 space-x-2">
                    <a href="{{ route('dashboard') }}" class="hover:text-blue-600 dark:hover:text-blue-300">Dashboard</a>
                    <span>/</span>
                    <a href="{{ route('users.index') }}" class="hover:text-blue-600 dark:hover:text-blue-300">Utilizadores</a>
                    <span>/</span>
                    <span class="text-blue-600 dark:text-blue-300 font-medium">Perfil 360º</span>
                </div>
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">
                    {{ $user->name }}
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-300">
                        · {{ $user->email }}
                    </span>
                </h1>
                <div class="mt-1 flex flex-wrap gap-2">
                    @forelse ($user->roles as $role)
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">
                            {{ $role->title }}
                        </span>
                    @empty
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-gray-100 text-gray-600 text-xs font-semibold">
                            Sem role
                        </span>
                    @endforelse
                </div>
            </div>

            <a href="{{ route('users.edit', $user->id) }}"
               class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-full transition">
                Editar Utilizador
            </a>
        </div>
    </x-slot>

    <div class="bg-slate-100 dark:bg-gray-900 py-8">
        <div class="max-w-7xl mx-auto px-6 space-y-8 mb-8">

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ($summaryCards as $card)
                    <div class="rounded-xl border border-slate-200 bg-white shadow-sm px-5 py-4 dark:border-gray-700 dark:bg-gray-800">
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $card['label'] }}</p>
                        <p class="mt-2 text-2xl font-semibold text-gray-800 dark:text-gray-100">
                            {{ number_format($card['value'], 0, ',', '.') }}
                        </p>
                    </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
                <div class="xl:col-span-2 space-y-6">
                    <div class="rounded-xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="px-6 py-5 border-b border-slate-100 dark:border-gray-700">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Dados do Cliente</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Informação principal e moradas associadas.</p>
                        </div>
                        <div class="px-6 py-5 space-y-4 text-sm text-gray-600 dark:text-gray-300">
                            <div class="grid gap-4 sm:grid-cols-2">
                                <div>
                                    <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Código interno</span>
                                    <span class="text-base font-medium text-gray-800 dark:text-gray-100">{{ $user->id }}</span>
                                </div>
                                <div>
                                    <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Telefone</span>
                                    <span class="text-base font-medium text-gray-800 dark:text-gray-100">
                                        {{ optional($user->client)->phone ?? '—' }}
                                    </span>
                                </div>
                            </div>

                            @if ($user->client)
                                <div class="grid gap-4 sm:grid-cols-2">
                                    <div>
                                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Administrador</span>
                                        <span class="text-base font-medium text-gray-800 dark:text-gray-100">
                                            {{ $user->client->administrator_name ?? '—' }}
                                        </span>
                                    </div>
                                    <div>
                                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">NIF</span>
                                        <span class="text-base font-medium text-gray-800 dark:text-gray-100">
                                            {{ $user->client->nif ?? '—' }}
                                        </span>
                                    </div>
                                </div>

                                <div class="grid gap-4 sm:grid-cols-2">
                                    <div>
                                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Morada de fornecimento</span>
                                        <span class="text-base font-medium text-gray-800 dark:text-gray-100">
                                            {{ $user->client->address ?? '—' }}
                                        </span>
                                    </div>
                                    <div>
                                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Código Postal</span>
                                        <span class="text-base font-medium text-gray-800 dark:text-gray-100">
                                            {{ $user->client->post_code ?? '—' }}
                                        </span>
                                    </div>
                                </div>

                                <div class="grid gap-4 sm:grid-cols-3">
                                    <div>
                                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Distrito</span>
                                        <span class="text-base font-medium text-gray-800 dark:text-gray-100">
                                            {{ optional($user->client->district)->title ?? '—' }}
                                        </span>
                                    </div>
                                    <div>
                                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Concelho</span>
                                        <span class="text-base font-medium text-gray-800 dark:text-gray-100">
                                            {{ optional($user->client->municipality)->title ?? '—' }}
                                        </span>
                                    </div>
                                    <div>
                                        <span class="block text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Freguesia</span>
                                        <span class="text-base font-medium text-gray-800 dark:text-gray-100">
                                            {{ optional($user->client->parish)->title ?? '—' }}
                                        </span>
                                    </div>
                                </div>
                            @else
                                <p class="text-sm text-gray-500 dark:text-gray-400">Este utilizador ainda não está associado a um cliente.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="rounded-xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="px-6 py-5 border-b border-slate-100 dark:border-gray-700">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Resumo Financeiro</h2>
                        </div>
                        <div class="px-6 py-5 space-y-4 text-sm text-gray-600 dark:text-gray-300">
                            <div class="flex justify-between">
                                <span>Total pago pela CVC</span>
                                <span class="font-semibold text-gray-800 dark:text-gray-100">
                                    € {{ number_format($financialSummary['totalCvc'], 2, ',', '.') }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span>Total pago a Administradores</span>
                                <span class="font-semibold text-gray-800 dark:text-gray-100">
                                    € {{ number_format($financialSummary['totalAdministrators'], 2, ',', '.') }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span>Total pago a Comerciais</span>
                                <span class="font-semibold text-gray-800 dark:text-gray-100">
                                    € {{ number_format($financialSummary['totalCommercials'], 2, ',', '.') }}
                                </span>
                            </div>
                            <div class="flex justify-between border-t border-dashed border-slate-200 pt-3 dark:border-gray-600">
                                <span class="font-semibold text-gray-700 dark:text-gray-200">Margem CVC</span>
                                <span class="font-semibold {{ $financialSummary['companyProfit'] >= 0 ? 'text-emerald-600' : 'text-red-500' }}">
                                    € {{ number_format($financialSummary['companyProfit'], 2, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="px-6 py-5 border-b border-slate-100 dark:border-gray-700">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Atividade Recente</h2>
                        </div>
                        <div class="px-6 py-5 space-y-4 text-sm text-gray-600 dark:text-gray-300">
                            @forelse ($activities as $activity)
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <p class="font-semibold text-gray-800 dark:text-gray-100">
                                            {{ $activity->meter?->cpe ?? 'CPE não definido' }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            Estado: {{ $activity->statuses?->title ?? 'Sem estado' }}
                                            · Fornecedor: {{ $activity->provider?->acronym ?? $activity->provider?->title ?? '—' }}
                                        </p>
                                    </div>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ optional($activity->updated_at)->format('d/m/Y H:i') }}
                                    </span>
                                </div>
                            @empty
                                <p class="text-sm text-gray-500 dark:text-gray-400">Sem movimentos registados nos últimos contratos.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="rounded-xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="px-6 py-5 border-b border-slate-100 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Energia e Consumo</h2>
                    </div>
                    <div class="px-6 py-5 space-y-4 text-sm text-gray-600 dark:text-gray-300">
                        <div class="flex justify-between">
                            <span>Potência contratada total</span>
                            <span class="font-semibold text-gray-800 dark:text-gray-100">
                                {{ $consumptionSummary['totalPower'] ? number_format($consumptionSummary['totalPower'], 0, ',', '.') . ' kVA' : '—' }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span>Preço médio de energia</span>
                            <span class="font-semibold text-gray-800 dark:text-gray-100">
                                {{ $consumptionSummary['averageEnergyPrice'] ? '€ ' . number_format($consumptionSummary['averageEnergyPrice'], 4, ',', '.') : '—' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="rounded-xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="px-6 py-5 border-b border-slate-100 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Estado dos Contratos</h2>
                    </div>
                    <div class="px-6 py-5 space-y-3 text-sm text-gray-600 dark:text-gray-300">
                        @forelse ($statusBreakdown as $row)
                            <div class="flex justify-between">
                                <span>{{ $row->label }}</span>
                                <span class="font-semibold text-gray-800 dark:text-gray-100">
                                    {{ number_format($row->total, 0, ',', '.') }}
                                </span>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500 dark:text-gray-400">Sem contratos registados.</p>
                        @endforelse
                    </div>
                </div>

                <div class="rounded-xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="px-6 py-5 border-b border-slate-100 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Distribuição por Serviço</h2>
                    </div>
                    <div class="px-6 py-5 space-y-3 text-sm text-gray-600 dark:text-gray-300">
                        @forelse ($serviceBreakdown as $row)
                            <div class="flex justify-between">
                                <span>{{ $row->label }}</span>
                                <span class="font-semibold text-gray-800 dark:text-gray-100">
                                    {{ number_format($row->total, 0, ',', '.') }}
                                </span>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500 dark:text-gray-400">Sem contratos registados.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="px-6 py-5 border-b border-slate-100 dark:border-gray-700">
                    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Contratos do Cliente</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Mostrando {{ $contracts->count() }} de {{ number_format($contracts->total(), 0, ',', '.') }} contratos.
                            </p>
                        </div>

                        <form method="GET" class="w-full md:w-auto">
                            <div class="grid grid-cols-1 sm:grid-cols-4 gap-3">
                                <div>
                                    <label for="status_id" class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                                        Estado
                                    </label>
                                    <select id="status_id" name="status_id"
                                            class="mt-1 w-full rounded-md border-gray-300 text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100">
                                        <option value="">Todos</option>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}" @selected((string) $filters['status_id'] === (string) $status->id)>
                                                {{ $status->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="service_id" class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                                        Serviço
                                    </label>
                                    <select id="service_id" name="service_id"
                                            class="mt-1 w-full rounded-md border-gray-300 text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100">
                                        <option value="">Todos</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}" @selected((string) $filters['service_id'] === (string) $service->id)>
                                                {{ $service->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="typology_id" class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                                        Tipologia
                                    </label>
                                    <select id="typology_id" name="typology_id"
                                            class="mt-1 w-full rounded-md border-gray-300 text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100">
                                        <option value="">Todas</option>
                                        @foreach ($typologies as $typology)
                                            <option value="{{ $typology->id }}" @selected((string) $filters['typology_id'] === (string) $typology->id)>
                                                {{ $typology->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex items-end gap-2">
                                    <button type="submit"
                                            class="inline-flex justify-center rounded-md bg-blue-500 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-600 transition w-full">
                                        Filtrar
                                    </button>
                                    <a href="{{ route('users.show', $user->id) }}"
                                       class="inline-flex justify-center rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-700 border border-gray-200 hover:bg-gray-50 transition dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                                        Limpar
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="px-6 py-5 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-900 text-gray-500 dark:text-gray-300 uppercase text-xs tracking-wide">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold">Contrato</th>
                                <th class="px-4 py-3 text-left font-semibold">CPE / NIF</th>
                                <th class="px-4 py-3 text-left font-semibold">Serviço</th>
                                <th class="px-4 py-3 text-left font-semibold">Fornecedor</th>
                                <th class="px-4 py-3 text-left font-semibold">Tipologias</th>
                                <th class="px-4 py-3 text-right font-semibold">Comissão CVC</th>
                                <th class="px-4 py-3 text-left font-semibold">Estado</th>
                                <th class="px-4 py-3 text-left font-semibold">Atualizado em</th>
                                <th class="px-4 py-3 text-right font-semibold">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700 text-gray-700 dark:text-gray-200">
                            @forelse ($contracts as $contract)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-900/40 transition">
                                    <td class="px-4 py-3 font-semibold text-gray-800 dark:text-gray-100">
                                        {{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::limit($contract->id, 12, '…')) }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex flex-col">
                                            <span>{{ $contract->meter?->cpe ?? '—' }}</span>
                                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                                {{ $contract->meter?->nif ?? 'NIF não definido' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">{{ $contract->service?->title ?? '—' }}</td>
                                    <td class="px-4 py-3">{{ $contract->provider?->acronym ?? $contract->provider?->title ?? '—' }}</td>
                                    <td class="px-4 py-3">
                                        @if ($contract->typologies->isNotEmpty())
                                            <div class="flex flex-wrap gap-1">
                                                @foreach ($contract->typologies as $typology)
                                                    <span class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded-full">
                                                        {{ $typology->title }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-xs text-gray-500 dark:text-gray-400">Sem tipologia</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-right">
                                        € {{ number_format($contract->commission->cvc_paid_amount ?? 0, 2, ',', '.') }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">
                                            {{ $contract->statuses?->title ?? 'Sem estado' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ optional($contract->updated_at)->format('d/m/Y H:i') ?? '—' }}
                                    </td>
                                    <td class="px-4 py-3 text-right">
                                        <a href="{{ route('contracts.show', $contract->id) }}"
                                           class="text-blue-600 hover:text-blue-800 font-semibold text-sm">
                                            Ver contrato
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="px-4 py-6 text-center text-sm text-gray-500 dark:text-gray-400">
                                        Nenhum contrato encontrado para os filtros aplicados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="px-6 pb-6">
                    {{ $contracts->links() }}
                </div>
            </div>

            <div class="rounded-xl border border-slate-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="px-6 py-5 border-b border-slate-100 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Distribuição por Tipologia</h2>
                </div>
                <div class="px-6 py-5 space-y-3 text-sm text-gray-600 dark:text-gray-300">
                    @forelse ($typologyBreakdown as $row)
                        <div class="flex justify-between">
                            <span>{{ $row->label }}</span>
                            <span class="font-semibold text-gray-800 dark:text-gray-100">
                                {{ number_format($row->total, 0, ',', '.') }}
                            </span>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500 dark:text-gray-400">Sem dados de tipologias associados aos contratos.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
