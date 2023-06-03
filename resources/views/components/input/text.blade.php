@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 focus:border-ssystemblue focus:ring-ssystemblue rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-100']) !!}>
