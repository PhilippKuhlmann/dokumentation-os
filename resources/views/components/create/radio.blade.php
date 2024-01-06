@props([
    'label',
    'name',
    'default',
    'radios' => [],
])

<div class="flex flex-col mt-2">
    <x-input.label value="{{ $label }}" />
    <div class="flex gap-5">
        @foreach ($radios as $key => $value)
            <div class="flex mt-1">
                <x-input.radio id="{{ $name }}" name="{{ $name }}" class="mt-1" value="{{ $value }}" />
                <x-input.label for="{{ $name }}" value="{{ $key }}" class="ml-2" />
            </div>
        @endforeach
    </div>
</div>
