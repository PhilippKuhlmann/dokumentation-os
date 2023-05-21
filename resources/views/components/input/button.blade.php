@props(['type' => 'submit', 'label'])


<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => 'bg-blue-700 py-2 px-8 rounded- text-white text-sm hover:bg-blue-600 focus:bg-blue-600'
    ]) }}
    >
        {{ $label }}
</button>
