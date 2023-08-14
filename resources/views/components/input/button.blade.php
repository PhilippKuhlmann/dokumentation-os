@props([
    'label',
    'type' => 'submit',
    'color' => 'blue'
    ])


<button
    type="{{ $type }}"
    @if ($color == 'blue')
        {{ $attributes->merge(['class' => 'py-2 px-4 text-sm bg-cerulean-500 hover:bg-cerulean-600 text-white rounded-md']) }}
    @elseif ($color == 'red')
        {{ $attributes->merge(['class' => 'py-2 px-4 text-sm bg-red-700 hover:bg-red-600 text-white rounded-md']) }}
    @endif
    >
        {{ $label }}
</button>
