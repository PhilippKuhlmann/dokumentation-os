@props([
    'label',
    'type' => 'submit',
    'color' => 'blue'
    ])


<button
    type="{{ $type }}"
    @if ($color == 'blue')
        {{ $attributes->merge(['class' => 'py-2 px-2 text-cerulean-500 hover:text-cerulean-600 font-DINPro-bold']) }}
    @elseif ($color == 'red')
        {{ $attributes->merge(['class' => 'py-2 px-2 text-red-700 hover:text-red-600 font-DINPro-bold']) }}
    @endif
    >
        {{ $label }}
</button>
