@props(['type' => 'text'])

<input {{ $attributes->merge(['class' => 'rounded-md border-gray-300 bg-white dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 shadow-sm']) }}
    type="{{ $type }}"
/>
