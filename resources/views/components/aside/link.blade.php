@props(['href'])
<li>
    <a
        href="{{ $href }}"
        {{ $attributes->merge(['class' => 'flex items-center p-2 text-base font-normal text-gray-100 dark:text-white hover:bg-blue-800 dark:hover:bg-gray-700']) }}
    >
        {{ $svg }}

        <span class="ml-3 w-full">
            {{ $slot }}
        </span>
    </a>
</li>
