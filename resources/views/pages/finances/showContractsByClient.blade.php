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

                        <p>Total de contratos: {{ $user->contracts->count() }}</p>

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contract ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Signed At</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($user->client)
                                @foreach ($contracts as $contract)                                    
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">                                        
                                            {{ $contract->meter ? $contract->meter->cpe : 'Sem informação' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $contract->signed_at }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('finances.showContractDetails', $contract->id) }}" class="text-blue-600 hover:underline">View Details</a>
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
