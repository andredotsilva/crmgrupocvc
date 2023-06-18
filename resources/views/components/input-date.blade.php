@props(['title', 'name'])

<label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
    {{ $title }}</label>
<div class="mt-2">
    <input type="date" name="{{ $name }}" id="{{ $name }}"
        class="block w-full rounded-md border-0 py-1.5 text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600 dark:focus:border-blue-500">
</div>
