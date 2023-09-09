@props(['href', 'label'])

<li>
    <a href="{{ $href }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-sm pl-11 group hover:bg-cerulean-500 hover:text-white dark:text-white dark:hover:bg-gray-700">{{ $label }}</a>
</li>
