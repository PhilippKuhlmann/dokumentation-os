@props([
    'name',
    'value',
    'array'
])

<div class="flex flex-col mt-2">
    <x-input.label for="{{ $name }}" value="{{ $value }}" />
    <x-input.select id="{{ $name }}" name="{{ $name }}">
        @foreach ($array as $a)
            <option value="{{ $a->id }}" {{ $a->id == old('site_id') ? 'selected' : '' }}>{{ $a->name }}</option>
        @endforeach
    </x-input.select>
</div>
