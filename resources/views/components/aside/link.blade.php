@props(['href', 'activeUrl'])

<li>
    <a href="{{ $href }}"
        class="{{ $activeUrl ? '' : 'border-transparent' }} relative flex flex-row items-center h-10 focus:outline-none hover:bg-blue-900 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 hover:border-blue-500 dark:hover:border-gray-500 pr-6">
        <span class="inline-flex justify-center items-center ml-4">
            {{ $icon }}
        </span>
        <span class="ml-2 text-sm tracking-wide truncate">{{ $slot }}</span>
    </a>
</li>
