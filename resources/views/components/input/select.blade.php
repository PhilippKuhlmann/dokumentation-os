@props(['name'])
<select
    name="{{ $name }}"
    {{ $attributes->merge([
        'class' => 'rounded-md py-2 px-3 bg-gray-200 border-none focus:border-blue-500 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500',
    ]) }}
>
    {{ $slot }}
</select>
