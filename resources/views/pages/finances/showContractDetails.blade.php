<x-app-layout>
    
    <x-slot name="header">
        <div class="flex items-center overflow-x-auto whitespace-nowrap">
            <a href="{{ route('dashboard') }}" class="text-gray-600 dark:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a>

            <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="{{ route('finances.index') }}" class="text-gray-600 dark:text-gray-200 hover:underline text-sm">
                {{ __('Finanças') }}
            </a>
        </div>

        <div class="leading-tight flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight pt-4">
                Finanças para CPE - {{ optional($contract->meter)->cpe ?? 'N/A' }}
            </h2>
            <a href="{{ route('users.create') }}" class="pb-4">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md dark:bg-gray-700 dark:hover:bg-gray-900">
                    Voltar atrás
                </button>
            </a>
        </div>

        
    </x-slot>


    <!-- component -->
    <div class="p-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-top: 40px; padding-bottom: 100px;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto p-4">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-white p-4 shadow rounded">
                                <h2 class="text-lg font-bold mb-2">Comissões Administrador</h2>
                                <p>Valor Pago ao Administrador: {{ $contract->commission->administrator_paid_amount / 100 }} €</p>
                                <p>Data Pagamento ao Administrador: {{ $contract->commission->administrator_payment_date }}</p>
                                <p>Devolução ao Administrador: {{ $contract->commission->refund_administrator_paid_amount / 100 }} €</p>
                                <p>Data Devolução ao Administrador: {{ $contract->commission->refund_administrator_payment_date }}</p>
                            </div>

                            <div class="bg-white p-4 shadow rounded">
                                <h2 class="text-lg font-bold mb-2">Comissões Comercial</h2>
                                <p>Valor Pago ao Comercial: {{ $contract->commission->commercial_paid_amount / 100 }} €</p>
                                <p>Data Pagamento ao Comercial: {{ $contract->commission->commercial_payment_date }}</p>
                                <p>Devolução ao Comercial: {{ $contract->commission->refund_commercial_paid_amount / 100 }} €</p>
                                <p>Data Devolução ao Comercial: {{ $contract->commission->refund_commercial_payment_date }}</p>
                            </div>

                            <div class="bg-white p-4 shadow rounded">
                                <h2 class="text-lg font-bold mb-2">Comissões CVC</h2>
                                <p>Valor Pago ao CVC: {{ $contract->commission->cvc_paid_amount / 100 }} €</p>
                                <p>Data Pagamento ao CVC: {{ $contract->commission->cvc_payment_date }}</p>
                                <p>Devolução ao CVC: {{ $contract->commission->refund_cvc_paid_amount / 100 }} €</p>
                                <p>Data Devolução ao CVC: {{ $contract->commission->refund_cvc_payment_date }}</p>
                            </div>

                            <div class="bg-white p-4 shadow rounded">
                                <h2 class="text-lg font-bold mb-2">Comissões Energia</h2>
                                <p>Valor Pago ao CVC: {{ $contract->commission->energy_cvc_paid_amount / 100 }} €</p>
                                <p>Data Pagamento ao CVC: {{ $contract->commission->energy_cvc_payment_date }}</p>
                                <p>Devolução ao CVC: {{ $contract->commission->refund_energy_cvc_paid_amount / 100 }} €</p>
                                <p>Data Devolução ao CVC: {{ $contract->commission->refund_energy_cvc_payment_date }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="container mx-auto p-4">
                        {{-- New table showing the calculated financial data --}}
                        <h2 class="text-2xl font-bold mt-6">Summary of Financials</h2>
                        <table class="table-auto w-full bg-white shadow-md rounded-lg mt-4">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="py-2 px-4">Description</th>
                                    <th class="py-2 px-4">Amount (€)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b">
                                    <td class="py-2 px-4">Total Paid to CVC</td>
                                    <td class="py-2 px-4">{{ $totalPaidToCVC / 100 }} €</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="py-2 px-4">Total Paid to Administrators</td>
                                    <td class="py-2 px-4">{{ $totalPaidToAdministrators / 100 }} €</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="py-2 px-4">Total Paid to Commercials</td>
                                    <td class="py-2 px-4">{{ $totalPaidToCommercials / 100 }} €</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="py-2 px-4 font-bold">Company Profit</td>
                                    <td class="py-2 px-4 font-bold">{{ $companyProfit / 100 }} €</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
