@props(['label', 'svg', 'links'])

<li>
    <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-cerulean-500 hover:text-white dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-{{ $label }}" data-collapse-toggle="dropdown-{{ $label }}">
        <x-dynamic-component :component="$svg" class="w-6 h-6" />
        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>{{ $label }}</span>
        <x-svg.arrowdown class="w-6 h-6" />
    </button>
    <ul id="dropdown-{{ $label }}" class="hidden py-2 space-y-2">
        {{ $links }}
    </ul>
 </li>
