@props(['title', 'count', 'bg', 'svg'])

<div class="flex flex-row bg-white shadow-sm rounded-lg p-4 dark:bg-gray-700 dark:text-blue-400">
    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl {{ $bg }} text-blue-500">
        {{ $svg }}
    </div>
    <div class="flex flex-col flex-grow ml-4">
        <div class="text-sm text-gray-500 dark:text-slate-400">{{ $title }}</div>
        <div class="font-bold text-lg">{{ $count }}</div>
    </div>
</div>
