@props([
    'name1',
    'label1',
    'default1' => '',
    'name2',
    'label2',
    'default2' => '',
    'type1' => 'text',
    'type2' => 'text'
])

<div class="flex flex-row gap-2">
    <div class="flex flex-col mt-2 w-3/4">
        <x-input.label for="{{ $name1 }}" value="{{ $label1 }}" />
        <x-input.field id="{{ $name1 }}" name="{{ $name1 }}" type="{{ $type1 }}" class="mt-1" value="{{ old($name1) ?? $default1 }}" />
    </div>

    <div class="flex flex-col mt-2 w-1/4">
        <x-input.label for="{{ $name2 }}" value="{{ $label2 }}" />
        <x-input.field id="{{ $name2 }}" name="{{ $name2 }}" type="{{ $type2 }}" class="mt-1" value="{{ old($name2) ?? $default2 }}" />
    </div>
</div>
