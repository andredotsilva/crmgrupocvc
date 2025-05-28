@props(['contracts', 'contractsCount', 'hasPagination' => false])

<section class="container mx-auto">
    

    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <div class="flex items-center gap-x-3">
                                        <span>NIF</span>
                                    </div>
                                </th>
                                <th scope="col"
                                    class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <div class="flex items-center gap-x-3">
                                        <span>CPE</span>
                                    </div>
                                </th>
                                <th scope="col"
                                    class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <div class="flex items-center gap-x-3">
                                        <span>Administração de Condominio</span>
                                    </div>
                                </th>
                                <th scope="col"
                                    class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <span>Observações</span>
                                </th>

                                <th scope="col"
                                    class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <span>A Renovar</span>
                                </th>

                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <button class="flex items-center gap-x-2">
                                        <span>Estado</span>

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                        </svg>
                                    </button>
                                </th>
                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Simulação
                                </th>

                                <th scope="col" class="relative py-3.5 px-4">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">

                            @foreach ($contracts as $contract)
                                <tr>
                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                        {{ $contract->meter ? $contract->meter->nif : 'Sem informação' }}

                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                        {{ $contract->meter ? $contract->meter->cpe : 'Sem informação' }}
                                    </td>
                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                        <div class="inline-flex items-center gap-x-3">
                                            <div class="flex items-center gap-x-2">
                                                <div>
                                                    <h2 class="font-medium text-gray-800 dark:text-white ">
                                                        {{ $contract->client ? $contract->client->condominium_administrator: 'Sem informação' }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                        {{-- @php
                                            $styles = [
                                                '1' => ['text-emerald-500', 'bg-green-500', 'bg-emerald-100/60', 'dark:bg-gray-800'],
                                                '2' => ['text-red-500', 'bg-red-500', 'bg-red-100/60', 'dark:bg-gray-800'],
                                                '3' => ['text-red-500', 'bg-red-500', 'bg-red-100/60', 'dark:bg-gray-800'],
                                                '4' => ['text-red-500', 'bg-red-500', 'bg-red-100/60', 'dark:bg-gray-800'],
                                                '5' => ['text-red-500', 'bg-red-500', 'bg-red-100/60', 'dark:bg-gray-800'],
                                                '6' => ['text-red-500', 'bg-red-500', 'bg-red-100/60', 'dark:bg-gray-800'],
                                            ];
                                            $style = isset($styles[$contract->documentation_status_id]) ? $styles[$contract->documentation_status_id] : [];
                                        @endphp

                                        @if (!empty($style))
                                            @foreach ($contract->documentation as $documentation)
                                                <div
                                                    class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 {{ $style[2] }} {{ $style[3] }}">
                                                    <span class="h-1.5 w-1.5 rounded-full {{ $style[1] }}"></span>
                                                    <h2 class="text-sm font-normal {{ $style[0] }}">
                                                        {{ $documentation }}
                                                    </h2>
                                                </div>
                                            @endforeach
                                        @endif --}}
                                        {{-- @php
                                            dd($contract);
                                        @endphp --}}
                                        @if ($contract->notes)
                                            <span>
                                                {{ $contract->notes->text }}
                                            </span>
                                        @endif
                                    </td>
                                    <td
                                        class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap flex justify-center">
                                        @if ($contract->isFinishing === 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="#fb923c" viewBox="0 0 256 256">
                                                <path
                                                    d="M120,136V80a8,8,0,0,1,16,0v56a8,8,0,0,1-16,0ZM232,91.55v72.9a15.86,15.86,0,0,1-4.69,11.31l-51.55,51.55A15.86,15.86,0,0,1,164.45,232H91.55a15.86,15.86,0,0,1-11.31-4.69L28.69,175.76A15.86,15.86,0,0,1,24,164.45V91.55a15.86,15.86,0,0,1,4.69-11.31L80.24,28.69A15.86,15.86,0,0,1,91.55,24h72.9a15.86,15.86,0,0,1,11.31,4.69l51.55,51.55A15.86,15.86,0,0,1,232,91.55Zm-16,0L164.45,40H91.55L40,91.55v72.9L91.55,216h72.9L216,164.45ZM128,160a12,12,0,1,0,12,12A12,12,0,0,0,128,160Z">
                                                </path>
                                            </svg>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                        {{ $contract->statuses->title ?? '' }}
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                        @php
                                            $simulationFile = null;
                                            if ($contract->files) {
                                                foreach ($contract->files as $file) {
                                                    if (Str::startsWith($file->filename, 'simulacao_')) {
                                                        $simulationFile = $file;
                                                        break;
                                                    }
                                                }
                                            }
                                        @endphp

                                        @if($simulationFile)
                                            <a href="{{ route('contracts.simulation', ['id' => $simulationFile->id]) }}" target="_blank" class="btn btn-sm btn-success">
                                                Simulação
                                            </a>
                                        @else
                                            <span class="text-muted">Sem Simulação</span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div class="flex items-center gap-x-6">

                                            {{-- <form action="{{ route('contracts.renew', $contract->id) }}" method="POST">
                                                <a>
                                                    <button
                                                        class="text-gray-500 transition-colors duration-200 dark:hover:text-blue-500 dark:text-gray-300 hover:text-blue-500 focus:outline-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-receipt-text"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/><path d="M14 8H8"/><path d="M16 12H8"/><path d="M13 16H8"/></svg>
                                                    </button>
                                                </a> --}}
                                            {{-- </form> --}}
                                            

                                            <form action="{{ route('contracts.renew', $contract->id) }}" method="POST" onsubmit="return confirm('Tem certeza de que deseja duplicar o modelo?')">
                                                @csrf
                                                   <button
                                                        class="text-gray-500 transition-colors duration-200 dark:hover:text-blue-500 dark:text-gray-300 hover:text-blue-500 focus:outline-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-receipt-text"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/><path d="M14 8H8"/><path d="M16 12H8"/><path d="M13 16H8"/></svg>
                                                    </button>
                                            </form>


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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if ($hasPagination == true)
        <div class="flex items-center justify-between mt-6">
            @if ($contracts->onFirstPage())
                <a href="#"
                    class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800 cursor-not-allowed">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        :class="{'text-gray-400': !document.documentElement.classList.contains('dark'), 'text-white': document.documentElement.classList.contains('dark') }"
                        class="fill-current text-gray-400 dark:text-white"
                        viewBox="0 0 256 256">
                        <path
                            d="M232,184a8,8,0,0,1-16,0A88,88,0,0,0,65.78,121.78L43.4,144H88a8,8,0,0,1,0,16H24a8,8,0,0,1-8-8V88a8,8,0,0,1,16,0v44.77l22.48-22.33A104,104,0,0,1,232,184Z">
                        </path>
                    </svg>
                </a>
            @else
                <a href="{{ $contracts->previousPageUrl() }}"
                    class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        class="fill-current text-gray-700 dark:text-white"
                        viewBox="0 0 256 256">
                        <path
                            d="M232,184a8,8,0,0,1-16,0A88,88,0,0,0,65.78,121.78L43.4,144H88a8,8,0,0,1,0,16H24a8,8,0,0,1-8-8V88a8,8,0,0,1,16,0v44.77l22.48-22.33A104,104,0,0,1,232,184Z">
                        </path>
                    </svg>
                </a>
            @endif

            <div class="items-center hidden lg:flex gap-x-3">
                @foreach ($contracts->getUrlRange(1, $contracts->lastPage()) as $page => $url)
                    @if ($page == $contracts->currentPage())
                        <a href="#"
                            class="px-2 py-1 text-sm text-blue-500 rounded-md dark:bg-gray-800 bg-blue-100/60 cursor-not-allowed">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}"
                            class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">{{ $page }}</a>
                    @endif
                @endforeach
            </div>

            @if ($contracts->hasMorePages())
                <a href="{{ $contracts->nextPageUrl() }}"
                    class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        class="fill-current text-gray-700 dark:text-white"
                        viewBox="0 0 256 256">
                        <path
                            d="M240,88v64a8,8,0,0,1-8,8H168a8,8,0,0,1,0-16h44.6l-22.36-22.21A88,88,0,0,0,40,184a8,8,0,0,1-16,0,104,104,0,0,1,177.54-73.54L224,132.77V88a8,8,0,0,1,16,0Z">
                        </path>
                    </svg>
                </a>
            @else
                <a href="#"
                    class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800 cursor-not-allowed">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        class="fill-current text-gray-400 dark:text-white"
                        viewBox="0 0 256 256">
                        <path
                            d="M240,88v64a8,8,0,0,1-8,8H168a8,8,0,0,1,0-16h44.6l-22.36-22.21A88,88,0,0,0,40,184a8,8,0,0,1-16,0,104,104,0,0,1,177.54-73.54L224,132.77V88a8,8,0,0,1,16,0Z">
                        </path>
                    </svg>
                </a>
            @endif
        </div>
    @endif
</section>
