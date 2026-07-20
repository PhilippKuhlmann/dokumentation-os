@props(['title', 'array' => []])

<div class="w-80">
    <div class="mb-1.5 text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
        {{ $title }}
    </div>
    <div class="flex flex-wrap pr-5 gap-2">
        @if ($array > 1)
            @foreach ($array as $key => $value)
                <div class="px-3 py-1 text-sm rounded-full bg-cerulean-100 text-cerulean-800 dark:text-gray-100 dark:bg-gray-600">
                    {{ $value }}</div>
            @endforeach
        @endif
    </div>
</div>
