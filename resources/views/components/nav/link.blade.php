@props(['url', 'name', 'target' => "_self"])


<a data-tooltip-target="{{ $name }}" data-tooltip-placement="bottom" type="button" target="{{ $target }}" href="{{ $url }}"
    class="p-1 hover:text-ssystemblue">
    {{ $slot }}
</a>

<div id="{{ $name }}" role="tooltip"
    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-100 bg-ssystemblue rounded-sm shadow-sm opacity-0 tooltip transition-opacity duration-300 dark:text-gray-100 dark:bg-gray-700">
    {{ $name }}
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>
