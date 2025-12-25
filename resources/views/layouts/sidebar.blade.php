@php
    $currentRouteName = Route::currentRouteName() ?? '';
    $navItems = [
        [
            'label' => __('Início'),
            'route' => route('dashboard'),
            'icon' => 'bi-house-door',
            'active' => request()->routeIs('dashboard'),
            'visible' => true,
        ],
        [
            'label' => __('Contratos'),
            'route' => route('contracts.index'),
            'icon' => 'bi-file-earmark-text',
            'active' => request()->routeIs('contracts.index') || request()->routeIs('contracts.index'),
            'visible' => !optional(auth()->user())->is_client,
        ],
        [
            'label' => __('Serviços'),
            'route' => route('servicos'),
            'icon' => 'bi-grid',
            'active' => request()->routeIs('services') || request()->routeIs('servicos'),
            'visible' => !optional(auth()->user())->is_client,
        ],
        [
            'label' => __('Finanças'),
            'route' => route('finances.index'),
            'icon' => 'bi-cash-coin',
            'active' => str_starts_with($currentRouteName, 'finances'),
            'visible' => !optional(auth()->user())->is_client,
        ],
        [
            'label' => __('Utilizadores'),
            'route' => route('users.index'),
            'icon' => 'bi-people',
            'active' => str_starts_with($currentRouteName, 'users'),
            'visible' => !optional(auth()->user())->is_client,
        ],
    ];
@endphp

<aside
    class="hidden lg:flex fixed top-0 left-0 h-full w-72 flex-col text-white shadow-xl z-40"
    style="background: linear-gradient(180deg, #05c0a5 0%, #0176d4 100%);">
    <div class="px-12 text-left">
        <a href="{{ route('dashboard') }}" class="inline-flex flex-col gap-3">
            <img src="{{ asset('img/logotipo-002.png') }}" alt="Gestor - Energia do Condomínio"
                class="w-40 h-auto object-contain">
        </a>
    </div>

    <nav class="mt-6 flex-1 px-8 space-y-1 text-base font-medium">
        @foreach ($navItems as $item)
            @if ($item['visible'])
                <a href="{{ $item['route'] }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-2 tracking-wide transition
                        {{ $item['active'] ? 'bg-white/15 text-white shadow-sm' : 'text-white/80 hover:text-white hover:bg-white/10' }}">
                    <i class="bi {{ $item['icon'] }} text-lg"></i>
                    <span>{{ $item['label'] }}</span>
                </a>
            @endif
        @endforeach
    </nav>

    <div class="px-8 pb-6">
        <div class="border-t border-white/20 pt-4 text-xs leading-relaxed text-white/80">
            Desenvolvido pela DIS - Digital Innovation Systems &copy; {{ date('Y') }}
        </div>
    </div>
</aside>
