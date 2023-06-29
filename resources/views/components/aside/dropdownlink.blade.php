@props(['href', 'label'])

<li>
    <a href="{{ $href }}" class="flex items-center w-full p-2 text-gray-100 transition duration-75 rounded-lg pl-11 group hover:bg-blau-100 dark:text-white dark:hover:bg-gray-700">{{ $label }}</a>
</li>
