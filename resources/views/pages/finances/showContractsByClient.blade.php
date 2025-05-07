<x-app-layout>
    <x-slot name="header" class="pt-8">
        <div class="flex items-center py-4 overflow-x-auto whitespace-nowrap">
            <a href="{{ route('dashboard') }}" class="text-gray-600 dark:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a>

        </div>

    </x-slot>


    <!-- component -->
    <div class="p-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-top: 40px; padding-bottom: 100px;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto p-4">
                        <h1 class="text-3xl font-bold mb-4">Contracts for Client: {{ $user->name }}</h1>

                        <p>Total de contratos: {{ $contracts->count() }}</p>

                        <!-- Totais gerais -->
                        <div class="mt-8 mb-8 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                            <h2 class="text-2xl font-semibold mb-4">Totais para todos os contratos</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                <div>
                                    <p class="font-semibold">Total Pago à CVC:</p>
                                    <p>€{{ number_format($totalPaidToCVC / 100, 2, ',', '.') }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Total Pago aos Administradores:</p>
                                    <p>€{{ number_format($totalPaidToAdministrators /100, 2, ',', '.') }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Total Pago aos Comerciais:</p>
                                    <p>€{{ number_format($totalPaidToCommercials /100, 2, ',', '.') }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Lucro Total da Empresa:</p>
                                    <p>€{{ number_format($totalCompanyProfit /100, 2, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 mb-8">
                            <h2 class="text-2xl font-semibold mb-4">Comissões por Provedor</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($commissionsByProvider as $providerId => $providerData)
                                    <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                                        <h3 class="text-xl font-semibold mb-2">{{ $providerData['name'] }}</h3>
                                        <p class="mb-1">Pago à CVC: €{{ number_format($providerData['totalPaidToCVC']/100, 2, ',', '.') }}</p>
                                        <p class="mb-1">Pago aos Administradores: €{{ number_format($providerData['totalPaidToAdministrators']/100, 2, ',', '.') }}</p>
                                        <p class="mb-1">Pago aos Comerciais: €{{ number_format($providerData['totalPaidToCommercials']/100, 2, ',', '.') }}</p>
                                        <p class="font-semibold">Lucro da Empresa: €{{ number_format($providerData['totalCompanyProfit']/100, 2, ',', '.') }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" style="margin-top: 30px;">
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
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>Opções</span>
                                        </div>
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
                                                        <a href="{{ route('finances.showContractDetails', $contract->id) }}"
                                                            class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                                                             <button>
                                                                 <span class="text-xl">€</span>
                                                             </button>
                                                         </a>
                                                         
                                                         
                                                           
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                        <div class="py-12">
                            <a href="{{ route('finances.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mt-4">Back to Clients</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>