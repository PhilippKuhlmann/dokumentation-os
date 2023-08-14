@props(['value', 'name', 'for'])


<label for="{{ $for }}" class="inline-flex items-center">
    <input id="{{ $for }}" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-cerulean-600 shadow-sm focus:ring-cerulean-500 dark:focus:ring-cerulean-600 dark:focus:ring-offset-gray-800"
        name="{{ $name }}">
    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">
        {{ $value }}
    </span>
</label>
