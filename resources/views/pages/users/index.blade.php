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
                {{ __('Utilizadores') }}
            </a>
        </div>

        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight pt-4">
            {{ __('Utilizadores') }}
        </h2>
    </x-slot>

    <div class="py-2 bg-slate-100 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('users.create') }}" class="pb-4">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md dark:bg-gray-700 dark:hover:bg-gray-900">
                                Inserir Utilizador
                            </button>
                        </a>
        </div>
    </div>

    <!-- component -->
    <div class="p-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-top: 40px; padding-bottom: 100px;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto p-4">
                        <form action="{{ route('users.index') }}" method="GET">
                            <div class="flex items-stretch justify-start mb-4 flex-row gap-3">
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <input type="text" name="name"
                                        class="block w-full rounded-md border-0 py-2 pl-10 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        placeholder="Nome">
                                </div>
                                <div class="sm:col-span-3">
                                    <div class="mt-2">
                                        <select id="country" name="role_id"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option value="">Cargo</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end gap-3 mr-4">
                                <button onclick="resetForm()"
                                    class="bg-gray-300 hover:bg-gray-400 text-white font-bold py-1 px-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eraser">
                                        <path
                                            d="m7 21-4.3-4.3c-1-1-1-2.5 0-3.4l9.6-9.6c1-1 2.5-1 3.4 0l5.6 5.6c1 1 1 2.5 0 3.4L13 21" />
                                        <path d="M22 21H7" />
                                        <path d="m5 11 9 9" />
                                    </svg>
                                </button>

                                <script>
                                    function resetForm() {
                                        document.getElementById('dadosorg').reset();
                                    }
                                </script>

                                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#FFFFFF"
                                        viewBox="0 0 256 256" class="h-8 w-8">
                                        <path
                                            d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 pb-4 ">
                            <thead>
                                <tr>
                                    <th
                                        class="py-2 px-4 bg-grey-200 dark:bg-grey-700 border-b border-gray-100 font-bold  text-md  text-gray-700 dark:text-white text-left">
                                        {{ 'Nome' }}
                                    </th>
                                    <th
                                        class="py-2 px-4 bg-grey-200 dark:bg-grey-700 border-b border-gray-100 font-bold  text-md  text-gray-700 dark:text-white text-left">
                                        {{ 'Email' }}
                                    </th>
                                    <th
                                        class="py-2 px-4 bg-grey-200 dark:bg-grey-700 border-b border-gray-100 font-bold  text-md  text-gray-700 dark:text-white text-left">
                                        {{ 'Cargo' }}
                                    </th>
                                    <th
                                        class="py-2 px-4 bg-grey-200 dark:bg-grey-700 border-b border-gray-100 font-bold  text-md  text-gray-700 dark:text-white text-left">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-600">{{ $user->name }}</td>
                                        <td class="py-2 px-4 border-b border-gray-600">{{ $user->email }}</td>
                                        @if ($user->roles->isEmpty())
                                            <td class="py-2 px-4 border-b border-gray-600 text-blue-400">
                                                {{ 'No role' }}</td>
                                        @else
                                            @foreach ($user->roles as $role)
                                                <td class="py-2 px-4 border-b border-gray-600">{{ $role->title }}</td>
                                            @endforeach
                                        @endif

                                        <td class="py-2 px-4 border-b border-gray-600 text-right">
                                            <div class="flex items-stretch justify-end gap-x-6">
                                                <a href="{{ route('users.show', $user->id) }}">
                                                    <button
                                                        class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-blue-500 focus:outline-none">
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
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                                                    <button>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                        </svg>
                                                    </button>
                                                </a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex items-center justify-between mt-6">
                            @if ($users->onFirstPage())
                                <a href="#"
                                    class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800 cursor-not-allowed">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </a>
                            @else
                                <a href="{{ $users->previousPageUrl() }}"
                                    class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </a>
                            @endif

                            <div class="items-center hidden lg:flex gap-x-3">
                                @foreach ($users->appends(request()->query())->getUrlRange(1, $users->lastPage()) as $page => $url)
                                    @if ($page == $users->currentPage())
                                        <a href="#"
                                            class="px-2 py-1 text-sm text-blue-500 rounded-md dark:bg-gray-800 bg-blue-100/60 cursor-not-allowed">{{ $page }}</a>
                                    @else
                                        <a href="{{ $url }}"
                                            class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">{{ $page }}</a>
                                    @endif
                                @endforeach
                            </div>

                            @if ($users->hasMorePages())
                                <a href="{{ $users->nextPageUrl() }}"
                                    class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            @else
                                <a href="#"
                                    class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800 cursor-not-allowed">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
