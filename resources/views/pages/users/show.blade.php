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

            <a href="{{ route('users.index') }}" class="text-gray-600 dark:text-gray-200 hover:underline">
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
            <h4 class="mr-4 text-xl	text-blue-600 dark:text-blue-100">{{ __(' Utilizador - ') }}{{ $user->name }}</h4>
            <a href="{{ route('users.edit', $user->id) }}">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-4">{{ __('Editar Utilizador') }}</button>
            </a>
        </div>
    </x-slot>

    <!--Tables-->
    <div class="p-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="gap-x-6 mt-4 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                <h1 class="text-lg pb-4 dark:text-gray-200">Contratos Associados ao Cliente</h1>

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead cass="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col"
                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <div class="flex items-center gap-x-3">
                                    <span>CPE</span>
                                </div>
                            </th>
                            <th scope="col"
                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <div class="flex items-center gap-x-3">
                                    <span>Name</span>
                                </div>
                            </th>
                            <th scope="col"
                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <div class="flex items-center gap-x-3">
                                    <span>NIF</span>
                                </div>
                            </th>
                            <th scope="col"
                                class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <span>Status</span>
                            </th>

                            <th scope="col"
                                class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <span>Terminar</span>
                            </th>

                            <th scope="col"
                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <button class="flex items-center gap-x-2">
                                    <span>Nivel Tensão (RPE)</span>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                    </svg>
                                </button>
                            </th>

                            <th scope="col" class="relative py-3.5 px-4">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    @if ($user->client)
                        @foreach ($contracts as $contract)
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                <tr>
                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                        {{ $contract->meter ? $contract->meter->cpe : 'Sem informação' }}
                                    </td>
                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                        <div class="inline-flex items-center gap-x-3">
                                            <div class="flex items-center gap-x-2">
                                                <div>
                                                    <h2 class="font-medium text-gray-800 dark:text-white ">
                                                        {{ $contract->client ? $contract->client->name : 'Sem informação' }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                        {{ $contract->meter ? $contract->meter->nif : 'Sem informação' }}

                                    </td>
                                    <td class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                        @if ($contract->status)
                                            <span>{{ $contract->status->title }}</span>
                                        @endif
                                    </td>
                                    <td
                                        class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap flex justify-center">
                                        @if ($contract->status === 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="#fb923c" viewBox="0 0 256 256">
                                                <path
                                                    d="M120,136V80a8,8,0,0,1,16,0v56a8,8,0,0,1-16,0ZM232,91.55v72.9a15.86,15.86,0,0,1-4.69,11.31l-51.55,51.55A15.86,15.86,0,0,1,164.45,232H91.55a15.86,15.86,0,0,1-11.31-4.69L28.69,175.76A15.86,15.86,0,0,1,24,164.45V91.55a15.86,15.86,0,0,1,4.69-11.31L80.24,28.69A15.86,15.86,0,0,1,91.55,24h72.9a15.86,15.86,0,0,1,11.31,4.69l51.55,51.55A15.86,15.86,0,0,1,232,91.55Zm-16,0L164.45,40H91.55L40,91.55v72.9L91.55,216h72.9L216,164.45ZM128,160a12,12,0,1,0,12,12A12,12,0,0,0,128,160Z">
                                                </path>
                                            </svg>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                        {{ $contract->meter && $contract->meter->tariff ? $contract->meter->tariff->title : '' }}
                                    </td>
                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div class="flex items-center gap-x-6">

                                            <a href="{{ route('contracts.show', $contract->id) }}">
                                                <button
                                                    class="text-gray-500 transition-colors duration-200 dark:hover:text-blue-500 dark:text-gray-300 hover:text-blue-500 focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-eye"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </button>
                                            </a>
                                            @foreach (Auth()->user()->roles as $role)
                                                @if ($role->id === 1 || $role->id === 2)
                                                    <a href="{{ route('contracts.edit', $contract->id) }}"
                                                        class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                                                        <button>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-5 h-5">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                            </svg>
                                                        </button>
                                                    </a>

                                                    <form action="{{ route('contracts.destroy', $contract->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-5 h-5">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="gap-x-6 mt-4 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                <h1 class="text-lg pb-4 dark:text-gray-200">Dados do Cliente</h1>
                @if ($user->client)

                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">CAE:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($user->client)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $user->client->cae }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Nome Cliente:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($user->client)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $user->client->administrator_name }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Morada de Fornecimento:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($user->client)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $user->client->address }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Andar/Fração:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($user->client)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $user->client->floor }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Código Postal:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($user->client)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $user->client->post_code }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Código de Freguesia:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($user->client->district && $user->client->municipality && $user->client->parish)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ str_replace(' ', '', $user->client->district->code) }}
                                    {{ str_replace(' ', '', $user->client->municipality->code) }}
                                    {{ str_replace(' ', '', $user->client->parish->code) }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Distrito:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($user->client->district)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $user->client->district->title }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Concelho:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($user->client->municipality)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $user->client->municipality->title }}
                                </h4>
                            @endif
                        </div>
                    </div>

                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Freguesia:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($user->client->parish)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $user->client->parish->title ?? null }}
                                </h4>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                    <div class="flex p-4">
                        <div class="w-1/2 dark:text-blue-400">
                            <h4>{{ __('Identificador na Base de Dados: ') }}</h4>
                        </div>
                        <div class="w-1/2">
                            @if ($user->name)
                                <p class="text-blue-600 dark:text-blue-100">
                                    {{ $user->id }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="flex p-4">
                        <div class="w-1/2 dark:text-blue-400">
                            <h4>{{ __('Nome do Utilizador: ') }}</h4>
                        </div>
                        <div class="w-1/2">
                            @if ($user->name)
                                <p class="text-blue-600 dark:text-blue-100">
                                    {{ $user->name }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="flex p-4">
                        <div class="w-1/2 dark:text-blue-400">
                            <h4>{{ __('Email: ') }}</h4>
                        </div>
                        <div class="w-1/2">
                            @if ($user->name)
                                <p class="text-blue-600 dark:text-blue-100">
                                    {{ $user->email }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="flex p-4">
                        <div class="w-1/2 dark:text-blue-400">
                            <h4>{{ __('Cargo: ') }}</h4>
                        </div>
                        <div class="w-1/2">
                            @if ($user->roles->isEmpty())
                                <td class="py-2 px-4 border-b border-gray-200 text-blue-600 dark:text-blue-100">
                                    {{ 'No role' }}</td>
                            @else
                                @foreach ($user->roles as $role)
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
