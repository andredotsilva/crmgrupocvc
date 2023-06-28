@props(['title', 'name', 'value' => null, 'collection' => null, 'hasAuth' => null, 'errors' => null])

<label for="{{ $name }}"
    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">{{ $title }}</label>
<div class="mt-2">
    <select id="{{ $name }}" name="{{ $name }}"
        class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 dark:ring-gray-700  dark:bg-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        <option value="">Escolher {{ $title }}</option>
        @if ($value)
            @php
                $selectedValue = $value->id;
                $selectedTitle = $value->title;
            @endphp
            <option value="{{ $value->id }}" {{ old($name, $selectedValue) == $selectedValue ? 'selected' : '' }}>
                @if ($value->acronym)
                    {{ $value->acronym . ' - ' }}
                @endif
                {{ $value->title }}
            </option>
        @endif

        @if (($value && $collection && !$hasAuth) || (!$value && $collection && !$hasAuth))
            @foreach ($collection as $item)
                @php
                    $selectedValue = isset($selectedValue) ? $selectedValue : old($name);
                @endphp
                <option value="{{ $item->id }}" {{ old($name, $selectedValue) == $item->id ? 'selected' : '' }}>
                    @if ($item->acronym)
                        {{ $item->acronym . ' - ' }}
                    @endif
                    {{ $item->title }}
                </option>
            @endforeach
        @elseif ($hasAuth)
            @foreach ($collection as $item)
                @php
                    $selectedValue = isset($selectedValue) ? $selectedValue : old($name);
                @endphp
                <option value="{{ $item->id }}"
                    {{ old($name, $selectedValue) == $item->id || $item->id == auth()->id() ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        @endif
    </select>
    @if (!empty($errors))
        <span class="text-sm text-red-500">{{ $errors }}</span>
    @endif
</div>
