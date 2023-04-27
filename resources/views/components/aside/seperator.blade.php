@props(['name'])

<div class="relative inline-flex items-center justify-center w-full">
    <hr class="w-64 h-0.5 my-4 bg-gray-400 border-0 rounded dark:bg-gray-700">
    <div class="absolute px-2 -translate-x-1/2 font-thin bg-sdarkblue left-1/2 dark:bg-gray-800">
        {{ $name }}
    </div>
</div>
