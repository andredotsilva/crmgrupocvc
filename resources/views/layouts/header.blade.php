@php
    $user = auth()->user();
    $userRoles = $user?->roles ?? collect();
    $navbarUnreadCount = $navbarUnreadNotificationsCount ?? 0;
    $currentRouteName = Route::currentRouteName() ?? '';
    $navItems = [
        [
            'label' => __('Início'),
            'route' => route('dashboard'),
            'active' => request()->routeIs('dashboard'),
            'visible' => true,
        ],
        [
            'label' => __('Serviços'),
            'route' => route('servicos'),
            'active' => request()->routeIs('services') || request()->routeIs('servicos'),
            'visible' => !optional($user)->is_client,
        ],
        [
            'label' => __('Finanças'),
            'route' => route('finances.index'),
            'active' => str_starts_with($currentRouteName, 'finances'),
            'visible' => !optional($user)->is_client,
        ],
        [
            'label' => __('Utilizadores'),
            'route' => route('users.index'),
            'active' => str_starts_with($currentRouteName, 'users'),
            'visible' => !optional($user)->is_client,
        ],
    ];
@endphp

<div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between pb-4">
    <div class="flex-1">
        @if (!empty($headerContent))
            {{ $headerContent }}
        @else
            <div>
                <h1 class="text-2xl font-bold text-gestorDark dark:text-gray-100">
                    @yield('page_title', 'Área Administrativa')
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400 hidden md:block">
                    @yield('page_subtitle', __('Bem-vindo ao painel de gestão.'))
                </p>
            </div>
        @endif

        <nav class="mt-3 flex flex-wrap gap-2 text-sm text-gray-600 dark:text-gray-300 md:hidden">
            @foreach ($navItems as $item)
                @if ($item['visible'])
                    <a href="{{ $item['route'] }}"
                        class="inline-flex items-center gap-1 rounded-full border px-3 py-1 transition
                            {{ $item['active'] ? 'bg-gestorDark text-white border-transparent dark:bg-gray-700' : 'border-gray-200 dark:border-gray-700 hover:border-gestorBlue/40 hover:text-gestorDark dark:hover:text-white' }}">
                        {{ $item['label'] }}
                    </a>
                @endif
            @endforeach
        </nav>
    </div>

    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-end">
        <div
            class="flex items-center gap-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm py-2 px-4 border border-gray-100 dark:border-gray-700">

            <div class="flex items-center gap-2">
                @if (isset($navbarNotifications))
                    <x-dropdown align="right" width="72">
                        <x-slot name="trigger">
                            <button
                                class="relative inline-flex items-center justify-center rounded-full border border-transparent bg-white dark:bg-gray-800 p-2 text-gray-500 shadow-sm transition hover:text-gray-700 dark:hover:text-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.597c0-1.707-.445-3.381-1.285-4.852A5.25 5.25 0 006.75 5.25v.6C6.75 8.083 6 10.238 4.5 11.79a8.969 8.969 0 005.688 4.04" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 17.25v1a3 3 0 006 0v-1" />
                                </svg>
                                @if ($navbarUnreadCount > 0)
                                    <span
                                        class="absolute -top-1 -right-1 inline-flex h-4 min-w-[1rem] items-center justify-center rounded-full bg-red-500 px-1 text-[0.65rem] font-semibold text-white">
                                        {{ $navbarUnreadCount > 9 ? '9+' : $navbarUnreadCount }}
                                    </span>
                                @endif
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="max-h-72 w-72 overflow-y-auto divide-y divide-gray-100 dark:divide-gray-700">
                                @forelse ($navbarNotifications as $notification)
                                    @php
                                        $data = $notification->data;
                                        $isUnread = is_null($notification->read_at);
                                    @endphp
                                    <div
                                        class="px-4 py-3 text-sm {{ $isUnread ? 'bg-blue-50 dark:bg-gray-900/40' : 'bg-white dark:bg-gray-800' }}">
                                        <p class="font-semibold text-gray-800 dark:text-gray-100">
                                            {{ $data['message'] ?? __('Alerta do contrato') }}
                                        </p>
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                            {{ $data['details'] ?? '' }}
                                        </p>
                                        <p class="mt-2 text-xs text-gray-400">
                                            {{ $notification->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                @empty
                                    <div class="px-4 py-6 text-sm text-gray-500 dark:text-gray-400 text-center">
                                        {{ __('Sem notificações.') }}
                                    </div>
                                @endforelse
                            </div>
                        </x-slot>
                    </x-dropdown>
                @endif

                <button data-theme-toggle type="button"
                    class="text-gray-500 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                    <svg data-theme-toggle-dark class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                        </path>
                    </svg>
                    <svg data-theme-toggle-light class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center gap-3 px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-600 dark:text-gray-300 bg-white dark:bg-gray-800 hover:text-gray-800 dark:hover:text-gray-100 focus:outline-none transition ease-in-out duration-150">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0">
                                    @if (optional($user)->profile_photo_url)
                                        <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                                            class="w-10 h-10 rounded-full object-cover">
                                    @else
                                        <i class="bi bi-person-circle text-gestorDark dark:text-gray-200 text-3xl"></i>
                                    @endif

                                    <span
                                        class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"
                                        aria-hidden="true"></span>
                                </div>

                                <div class="flex flex-col text-left leading-tight">
                                    <span class="font-semibold text-sm text-gray-800 dark:text-gray-100">
                                        {{ $user->name ?? __('Utilizador') }}
                                    </span>
                                    @if ($userRoles->isNotEmpty())
                                        <span class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $userRoles->pluck('title')->first() }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <i class="bi bi-chevron-down text-base"></i>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</div>

<hr class="border-gray-200 dark:border-gray-700">

<script>
    const updateThemeToggleIcons = (isDark) => {
        document.querySelectorAll('[data-theme-toggle]').forEach((btn) => {
            const darkIcon = btn.querySelector('[data-theme-toggle-dark]');
            const lightIcon = btn.querySelector('[data-theme-toggle-light]');

            if (!darkIcon || !lightIcon) {
                return;
            }

            if (isDark) {
                darkIcon.classList.remove('hidden');
                lightIcon.classList.add('hidden');
            } else {
                darkIcon.classList.add('hidden');
                lightIcon.classList.remove('hidden');
            }
        });
    };

    const toggleTheme = () => {
        const hasPreference = localStorage.getItem('color-theme');
        const isDarkMode = document.documentElement.classList.contains('dark');

        if (hasPreference) {
            if (localStorage.getItem('color-theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            }
        } else {
            if (isDarkMode) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }

        updateThemeToggleIcons(document.documentElement.classList.contains('dark'));
    };

    document.addEventListener('DOMContentLoaded', () => {
        updateThemeToggleIcons(document.documentElement.classList.contains('dark'));

        document.querySelectorAll('[data-theme-toggle]').forEach((btn) => {
            btn.addEventListener('click', toggleTheme);
        });
    });
</script>
