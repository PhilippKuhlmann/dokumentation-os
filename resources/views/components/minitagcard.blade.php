@props(['title', 'array' => []])

<div class="w-96 h-28">
    <div class="text-sm text-gray-500">
        {{ $title }}
    </div>
    <div class="flex flex-wrap mt-3 pr-5 gap-3">
        @if ($array > 1)
            @foreach ($array as $key => $value)
                <div class="px-3 py-1 text-sm rounded-full bg-gray-200 dark:text-gray-600 dark:bg-gray-400">
                    {{ $value }}</div>
            @endforeach
        @endif
    </div>
</div>
