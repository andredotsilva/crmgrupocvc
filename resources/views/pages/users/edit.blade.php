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
                {{ __('Editar Utilizador') }}
            </a>
        </div>
        <div class="flex items-end justify-between">
            <h4 class="mr-4 text-xl	">{{ __(' Editar - ') }}{{ $user->name }}</h4>
            <a href="{{ url()->previous() }}">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-4">{{ __('Voltar') }}</button>
            </a>
        </div>

    </x-slot>



    <!--Tables-->
    <div class="p-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">

                    <div class="max-w-md mx-auto bg-white shadow-md rounded-md p-6">
                        <h2 class="text-lg font-semibold mb-4">Edit User</h2>
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="name">Name:</label>
                                <input type="text" id="name" name="name" value="{{ $user->name }}"
                                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="email">Email:</label>
                                <input type="email" id="email" name="email" value="{{ $user->email }}"
                                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
                            </div>
                            {{-- <select name="roles[]" multiple>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ $user->roles->contains($role) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select> --}}
                            <div class="sm:col-span-2">
                                <x-input-select title="Roles" name="role" :collection="$roles" :errors="$errors->first('role')" />
                            </div>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md">{{ __('Guardar') }}</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
