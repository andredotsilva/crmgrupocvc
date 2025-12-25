@php
    $roles = $user->roles->pluck('title');
    $client = $user->client;
    $contractsCount = $user->contracts()->count();
    $activeContracts = $user->contracts()->whereHas('statuses', fn ($q) => $q->where('title', 'Alta'))->count();
    $pendingContracts = $user->contracts()->whereHas('statuses', fn ($q) => $q->whereIn('title', ['Pendente Assinatura', 'Aguardar']))->count();
@endphp

<x-app-layout>
    <x-slot name="header" class="pt-8">
        <div class="flex flex-col gap-2">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ __('O meu Perfil') }}</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                {{ __('Revise as suas informações pessoais, dados de contacto e preferências de segurança.') }}
            </p>
        </div>
    </x-slot>

    <div class="bg-slate-100 dark:bg-gray-900 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8 py-8">
            <section class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex items-center gap-4">
                        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-blue-100 text-2xl font-semibold text-blue-600">
                            {{ strtoupper(substr($user->name, 0, 2)) }}
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $user->name }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                            <div class="mt-2 flex flex-wrap gap-2">
                                @foreach ($roles as $role)
                                    <span class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700 dark:bg-blue-500/20 dark:text-blue-300">
                                        {{ $role }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <dl class="mt-6 grid grid-cols-1 gap-4 text-sm text-gray-600 dark:text-gray-300">
                        <div>
                            <dt class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Membro desde') }}</dt>
                            <dd class="mt-1 font-semibold text-gray-900 dark:text-gray-100">{{ $user->created_at?->format('d/m/Y') }}</dd>
                        </div>
                        @if ($client)
                            <div>
                                <dt class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('NIF') }}</dt>
                                <dd class="mt-1 font-semibold text-gray-900 dark:text-gray-100">{{ $client->nif }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Contacto') }}</dt>
                                <dd class="mt-1 font-semibold text-gray-900 dark:text-gray-100">{{ $client->phone ?? '—' }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Morada') }}</dt>
                                <dd class="mt-1 font-semibold text-gray-900 dark:text-gray-100">
                                    {{ $client->address ?? '—' }}
                                </dd>
                            </div>
                        @endif
                    </dl>
                </article>

                <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800 lg:col-span-2">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('Resumo de atividade') }}</h3>
                    <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-3">
                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 text-sm dark:border-gray-700 dark:bg-gray-900">
                            <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Contratos associados') }}</p>
                            <p class="mt-2 text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $contractsCount }}</p>
                        </div>
                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 text-sm dark:border-gray-700 dark:bg-gray-900">
                            <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Contratos ativos') }}</p>
                            <p class="mt-2 text-2xl font-semibold text-emerald-600 dark:text-emerald-400">{{ $activeContracts }}</p>
                        </div>
                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 text-sm dark:border-gray-700 dark:bg-gray-900">
                            <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Pendentes ou em análise') }}</p>
                            <p class="mt-2 text-2xl font-semibold text-amber-600 dark:text-amber-400">{{ $pendingContracts }}</p>
                        </div>
                    </div>

                    @if ($client)
                        <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('Distrito / Concelho / Freguesia') }}</p>
                                <p class="mt-1 text-sm font-semibold text-gray-900 dark:text-gray-100">
                                    {{ $client->district?->title ?? '—' }} ·
                                    {{ $client->municipality?->title ?? '—' }} ·
                                    {{ $client->parish?->title ?? '—' }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('CAE / Tipologia') }}</p>
                                <p class="mt-1 text-sm font-semibold text-gray-900 dark:text-gray-100">
                                    {{ $client->cae ?? '—' }}
                                </p>
                            </div>
                        </div>
                    @endif
                </article>
            </section>

            <section class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    @include('profile.partials.update-profile-information-form')
                </article>

                <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    @include('profile.partials.update-password-form')
                </article>
            </section>

            <section class="rounded-2xl border border-red-200 bg-white p-6 shadow-sm dark:border-red-500/40 dark:bg-gray-800">
                @include('profile.partials.delete-user-form')
            </section>
        </div>
    </div>
</x-app-layout>
