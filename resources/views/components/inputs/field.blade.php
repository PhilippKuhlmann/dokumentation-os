@props(['type' => 'text', 'name', 'placeholder'])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge([
        'class' => 'rounded-md py-2 px-3 bg-gray-200 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-500 border-none focus:border-blue-500',
    ]) }}
/>
