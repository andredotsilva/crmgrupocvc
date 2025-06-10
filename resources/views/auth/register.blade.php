<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

<!-- component -->
<div class="h-screen flex">
    <div class="flex w-1/2 bg-gradient-to-tr from-blue-400 to-green-400 i justify-around items-center">
      <div>
        <img src="../img/energia.webp" class="w-36" alt="">
        <p class="text-white mt-1 text-2xl">Serviços exclusivos para condomínios</p>
        <button type="submit" class="block w-28 bg-white text-indigo-800 mt-6 py-2 rounded-2xl font-bold mb-2">{{ __('Ver website') }}</button>
      </div>
    </div>
    <div class="flex w-1/2 justify-center items-center bg-white">
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1 class="text-gray-800 font-bold text-2xl mb-6 text-center">{{ __('Efetuar Registo') }}</h1>
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nome')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Já possui conta? Faça login.') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Registar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
  </div>

</x-guest-layout>

