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
        <form method="POST" action="{{ route('login') }}">
            @csrf
        <h1 class="text-gray-800 font-bold text-2xl mb-6">{{ __('Bem vindo de volta!') }}</h1>

        <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
          </svg>
          <input class="pl-2 outline-none border-none" type="text" name="email" id="email" placeholder="Email Address" :value="old('email')" required autofocus autocomplete="username"/>
        </div>

        <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
          </svg>
          <input class="pl-2 outline-none border-none" type="password" name="password" id="password" placeholder="Password" required autocomplete="current-password"/>
        </div>

        <button type="submit" class="block w-full bg-blue-400 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">{{ __('Entrar') }}</button>

        @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
        @endif
      </form>
    </div>
  </div>

</x-guest-layout>
