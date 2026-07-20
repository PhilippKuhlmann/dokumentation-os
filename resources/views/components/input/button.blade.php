@props([
    'label',
    'type' => 'submit',
    'color' => 'blue',
    'size' => 'md',
])

@php
    $base = 'inline-flex items-center justify-center gap-1.5 rounded-lg font-DINPro-bold shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50';

    $sizes = [
        'md' => 'px-4 py-2 text-sm',
        'sm' => 'px-3 py-1.5 text-xs',
    ];

    $variants = [
        'blue' => 'bg-cerulean-600 text-white hover:bg-cerulean-700 focus:ring-cerulean-500',
        'red'  => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
        'gray' => 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-50 focus:ring-cerulean-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:hover:bg-gray-600',
    ];

    $classes = $base . ' ' . ($sizes[$size] ?? $sizes['md']) . ' ' . ($variants[$color] ?? $variants['blue']);
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $label }}
</button>
