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

                        <div class="mt-8 mb-8">
                            <h2 class="text-2xl font-semibold mb-4">Comissões por Provedor</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($commissionsByProvider as $providerId => $providerData)
                                    <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                                        <h3 class="text-xl font-semibold mb-2">{{ $providerData['name'] }}</h3>
                                        <p class="mb-1">Pago à CVC: €{{ number_format($providerData['totalPaidToCVC'] / 100, 2, ',', '.') }}</p>
                                        <p class="mb-1">Pago aos Administradores: €{{ number_format($providerData['totalPaidToAdministrators'] / 100, 2, ',', '.') }}</p>
                                        <p class="mb-1">Pago aos Comerciais: €{{ number_format($providerData['totalPaidToCommercials'] / 100, 2, ',', '.') }}</p>
                                        <p class="font-semibold">Lucro da Empresa: €{{ number_format($providerData['totalCompanyProfit'] / 100, 2, ',', '.') }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                        

                        <div class="py-12">
                            <a href="{{ route('finances.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mt-4">Back to Clients</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>