@props(['name'])
<select
    name="{{ $name }}"
    {{ $attributes->merge([
        'class' => 'rounded-lg shadow-sm border-gray-300 bg-white dark:border-gray-700 dark:bg-gray-800 text-gray-900 dark:text-gray-300 focus:border-cerulean-500 dark:focus:border-cerulean-500 focus:ring-cerulean-500 dark:focus:ring-cerulean-500',
    ]) }}
>
    {{ $slot }}
</select>
