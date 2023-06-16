<x-app-layout>
    <x-slot name="header" class="pt-8">
        <div class="flex items-center py-4 overflow-x-auto whitespace-nowrap">
            <a href="{{ route('dashboard') }}" class="text-gray-600 dark:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a>
        
            <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </span>
        
            <a href="{{ route('servicos') }}" class="text-gray-600 dark:text-gray-200 hover:underline">
                {{ __('Serviços') }}
            </a>
        
            <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </span>
        
            <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">
                {{ __('Energia e Gás') }}
            </a>
        </div>
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight pt-4">
            {{ __(' Contrato - ') }}{{ $contract->id }}
        </h2>
    </x-slot>

    
    
    <!--Tables-->
    <div class="p-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                    <h1 class="text-lg pb-4 dark:text-gray-200">Back Office</h1>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Back Office:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->backofficer)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->backofficer->name }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Código Comerciante:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->commercial_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->commercial_id }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Nome Comercial:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->commercial)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->commercialName->name }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Serviço:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->service_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->service->title }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Soluções:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->category_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->solutions->title }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Tipo de Adesão:</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->clientType_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->clientType->title }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Cliente / Administrador</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->clientType_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->clientType->title }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                        <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Administração de Condominio</div>
                        <div class="p-4 col-span-8 md:col-span-8">
                            @if ($contract->clientType_id)
                                <h4 class="text-blue-600 dark:text-blue-400">
                                    {{ $contract->clientType->title }}
                                </h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <!--Dados organização-->
            <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                <h1 class="text-lg pb-4 dark:text-gray-200">Dados da organização</h1>
                <div class="grid grid-cols-4 md:grid-cols-12 gap-4">
                    <div class="p-4 dark:text-gray-200 col-span-4 md:col-span-4">Adesão:</div>
                    <div class="p-4 col-span-8 md:col-span-8">
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

    

</x-app-layout>
