@props(['title', 'name', 'value' => null, 'errors' => null, 'id' => null])

<label for="{{ $name }}"
    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">{{ $title }}</label>
<div class="mt-2">
    <input type="text" name="{{ $name }}" id="{{ $id }}" value="{{ old($name, $value ?? null) }}"
        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:text-gray-200 dark:bg-gray-600 ">
    @if (!empty($errors))
        <span class="text-sm text-red-500">{{ $errors }}</span>
    @endif
</div>
