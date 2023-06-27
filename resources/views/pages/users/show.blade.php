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

            <a href="{{ route('users') }}" class="text-gray-600 dark:text-gray-200 hover:underline">
                {{ __('Utilizadores') }}
            </a>

            <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">
                {{ __('Detalhes do Utilizador') }}
            </a>
        </div>
        <div class="flex items-end justify-between">
            <h4 class="mr-4 text-xl	">{{ __(' Utilizador - ') }}{{ $users->name }}</h4>
            <a href="{{ route('users.edit', $users->id) }}">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-4">{{ __('Editar Utilizador') }}</button>
            </a>
        </div>

    </x-slot>



    <!--Tables-->
    <div class="p-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                    <div class="flex p-4">
                        <div class="w-1/2 dark:text-blue-400">
                            <h4>{{ __('Identificador na Base de Dados: ') }}</h4>
                        </div>
                        <div class="w-1/2">
                            @if ($users->name)
                                <p class="text-blue-600 dark:text-blue-100">
                                    {{ $users->id }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="flex p-4">
                        <div class="w-1/2 dark:text-blue-400">
                            <h4>{{ __('Nome do Utilizador: ') }}</h4>
                        </div>
                        <div class="w-1/2">
                            @if ($users->name)
                                <p class="text-blue-600 dark:text-blue-100">
                                    {{ $users->name }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="flex p-4">
                        <div class="w-1/2 dark:text-blue-400">
                            <h4>{{ __('Email: ') }}</h4>
                        </div>
                        <div class="w-1/2">
                            @if ($users->name)
                                <p class="text-blue-600 dark:text-blue-100">
                                    {{ $users->email }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="flex p-4">
                        <div class="w-1/2 dark:text-blue-400">
                            <h4>{{ __('Cargo: ') }}</h4>
                        </div>
                        <div class="w-1/2">
                            @if ($users->roles->isEmpty())
                                <td class="py-2 px-4 border-b border-gray-200 text-blue-600 dark:text-blue-100">{{ 'No role' }}</td>
                            @else
                                @foreach ($users->roles as $role)
                                    <p class="text-blue-600 dark:text-blue-100">
                                        {{ $role->title }}
                                    </p>
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
