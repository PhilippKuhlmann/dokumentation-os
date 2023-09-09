@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 focus:border-ssystemblue focus:ring-ssystemblue rounded-sm shadow-sm dark:bg-gray-700 dark:text-gray-100']) !!}>
