@props(['type' => 'text', 'checked' => false ])

<input {{ $attributes->merge(['class' => 'rounded-sm border-gray-300 bg-white dark:border-gray-700 dark:bg-gray-800 text-gray-900 dark:text-gray-300 focus:border-cerulean-500 dark:focus:border-cerulean-500 focus:ring-cerulean-500 dark:focus:ring-cerulean-600']) }}
    type="radio" @if ($checked)
        checked
    @endif
/>
