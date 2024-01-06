@props([
    'label',
    'name',
    'default' => '',
    'type' => 'text',
])

<div class="flex flex-col mt-2">
    <x-input.label for="{{ $name }}" value="{{ $label }}" />
    <x-input.field id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" class="mt-1" value="{{ old($name) ?? $default }}" />
</div>

