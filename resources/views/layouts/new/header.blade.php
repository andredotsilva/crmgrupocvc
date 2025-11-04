<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 pb-4">
    <!-- Título da página -->
    <div>
        <h1 class="text-2xl font-bold text-gestorDark">
            @yield('page_title', 'Área Administrativa')
        </h1>
    </div>

    <!-- Área do usuário -->
    <div class="flex items-center bg-white rounded-lg shadow-sm py-2 px-3 border border-gray-100 space-x-4">
        
        

        <!-- Avatar e nome -->
        <div class="flex items-center space-x-3">
            <div class="relative">
                @if(optional(auth()->user())->profile_photo_url)
                    <img src="{{ auth()->user()->profile_photo_url }}" alt="Avatar"
                         class="w-8 h-8 rounded-full object-cover">
                @else
                    <i class="bi bi-person-circle text-gestorDark text-2xl"></i>
                @endif
                <span class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-400 border-2 border-white rounded-full"></span>
            </div>
            <div class="flex flex-col">
                <span class="text-gray-800 font-medium">{{ Auth::user()->name ?? 'Usuário' }}</span>
                <span class="text-xs text-gray-500">
                    {{ auth()->user()->roles->pluck('title')->first() ?? '' }}
                </span>
            </div>
        </div>

        <!-- Dropdown de Perfil -->
        <div class="hidden sm:flex sm:items-center">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-600 bg-white hover:text-gray-800 focus:outline-none transition ease-in-out duration-150">
                        <div>CRM GrupoCVC</div>
                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Perfil') }}
                    </x-dropdown-link>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Sair') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
  
  
</div>


<hr class="border-gray-200 mt-2">

