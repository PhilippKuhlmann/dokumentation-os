@props(['title'])

<div class="w-96 h-28 ">
    <div class="text-sm text-gray-500">
        {{ $title }}
    </div>
    <div class="flex flex-wrap mt-3 gap-3 text-sm dark:text-white">
        {{ $slot }}
    </div>

</div>
