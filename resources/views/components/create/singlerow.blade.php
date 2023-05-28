@props(['label', 'name', 'default' => ''])

<div class="flex flex-col mt-2">
    <x-input.label for="{{ $name }}" value="{{ $label }}" />
    <x-input.field id="{{ $name }}" name="{{ $name }}" class="mt-1" value="{{ old($name) ?? $default }}" />
</div>
