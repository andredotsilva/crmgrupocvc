<x-app-layout>
    <x-slot name="header" class="pt-8">
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

            <a href="{{ route('servicos') }}" class="text-gray-600 dark:text-gray-200 hover:underline">
                {{ __('Serviços') }}
            </a>

            <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="{{ route('energia') }}" class="text-gray-600 dark:text-gray-200 hover:underline">
                {{ __('Energia e Gás') }}
            </a>

            <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="{{ route('plans.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                {{ __('Campanhas') }}
            </a>
        </div>
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight pt-4">
            {{ __('Campanhas de Enegergia e Gás') }}
        </h2>

        <div class="flex items-end justify-between">
            <h4 class="mr-4 text-xl	dark:text-gray-200">{{ __(' Inserir Campanha ') }}</h4>
            <a href="{{ route('plans.index') }}">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-4">{{ __('Voltar') }}</button>
            </a>
        </div>
    </x-slot>



    <!--Tables-->
    <div class="p-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden  sm:rounded-lg">
                <div class="gap-x-6 gap-y-8 sm:grid-cols-6 px-6 pb-2 pt-4 rounded-2xl bg-white dark:bg-gray-800">
                    <div class="max-w-md mx-auto bg-white rounded-md p-6 dark:bg-gray-800">
                        <h2 class="text-lg font-semibold mb-4 dark:text-gray-200">Editar Campanha</h2>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST"
                            action="{{ route('plans.update', ['provider' => $provider, 'plan' => $plan]) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="provider_id"
                                    class="block mb-2 text-gray-700 font-bold mb-2 dark:text-gray-200">Provedor:</label>
                                <select name="provider_id" id="provider_id" required
                                    class="border border-gray-300 rounded px-3 py-2 w-full">
                                    @foreach ($providers as $provider)
                                        <option value="{{ $provider->id }}"
                                            @if ($provider->id === $plan->provider_id) selected @endif>
                                            {{ $provider->acronym }} - {{ $provider->title }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2 dark:text-gray-200" for="text">Nome
                                    da Campanha:</label>
                                <input type="text" id="title" name="title" required
                                    value="{{ $plan->title }}"
                                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
                            </div>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md">{{ __('Guardar') }}</button>
                        </form>
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- tabela so com contratos de gás e eletricidade -->
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
