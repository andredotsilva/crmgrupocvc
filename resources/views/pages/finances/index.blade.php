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

        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight pt-4">
            {{ __('GEstão Finanças') }}
        </h2>

    </x-slot>

    <div class="py-2 bg-slate-100 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        </div>
    </div>

    <!-- component -->
    <div class="p-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-top: 40px; padding-bottom: 100px;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto p-4">
                        
                        <table class="table-auto w-full bg-white shadow-md rounded-lg">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="py-2 px-4">Contract ID</th>
                                    <th class="py-2 px-4">Client</th>
                                    <th class="py-2 px-4">Signed At</th>
                                    <th class="py-2 px-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contracts as $contract)
                                    <tr class="border-b">
                                        <td class="py-2 px-4">{{ $contract->id }}</td>
                                        <td class="py-2 px-4">{{ $contract->client->name }}</td>
                                        <td class="py-2 px-4">{{ $contract->signed_at }}</td>
                                        <td class="py-2 px-4">
                                            <a href="{{ route('finances.show', $contract->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">View Finances</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
