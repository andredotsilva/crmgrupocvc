@props(['title', 'name', 'value' => null, 'collection' => null, 'hasAuth' => null])

<label for="{{ $name }}"
    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">{{ $title }}</label>
<div class="mt-2">
    <select id="{{ $name }}" name="{{ $name }}"
        class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 dark:ring-gray-700  dark:bg-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

        @if ($value)
            @php
                $selectedValue = $value->id;
                $selectedTitle = $value->title;
            @endphp
            <option value="{{ $value->id }}" selected>
                @if ($value->acronym)
                    {{ $value->acronym . ' - ' }}
                @endif
                {{ $value->title }}
            </option>
        @endif

        @if (($value && $collection && !$hasAuth) || (!$value && $collection && !$hasAuth))
            {{-- <option>Escolha</option> --}}
            @foreach ($collection as $item)
                <option value="{{ $item->id }}" {{ $value && $item->id === $selectedValue ? 'selected' : '' }}>
                    @if ($item->acronym)
                        {{ $item->acronym . ' - ' }}
                    @endif
                    {{ $item->title }}
                </option>
            @endforeach
        @elseif ($hasAuth)
            @foreach ($collection as $item)
                <option value="{{ $item->id }}"
                    {{ $value->id === $item->id ?? 'selected' || $item->id == auth()->id() ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        @endif
    </select>
</div>
