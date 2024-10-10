@props(['title', 'name', 'value' => null, 'errors' => null, 'id' => null, 'idLabel' => null, 'readonly' => false])

<label for="{{ $name }}" id="{{ $idLabel }}"
    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">{{ $title }}</label>
<div class="mt-2">
    {{-- <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workcation.com/</span> --}}
    <input type="text" name="{{ $name }}" id="{{ $id }}" value="{{ old($name, $value ?? null) }}" {{ $readonly ? 'readonly' : '' }}
        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:text-gray-200 dark:bg-gray-600 ">
    @if (!empty($errors))
        <span class="text-sm text-red-500">{{ $errors }}</span>
    @endif
</div>
