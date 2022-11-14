@props([
    'label',
    'link',
    'color' => 'blue'
])


<a
    href="{{ $link }}"
    @if ($color == 'blue')
        class="py-2 px-4 text-sm bg-blue-700 hover:bg-blue-600 text-white rounded-md"
    @elseif ($color == 'gray')
        class="py-2 px-4 text-sm bg-gray-300 hover:bg-gray-400 text-white dark:bg-gray-500 rounded-md"
    @endif

>
    {{ $label }}
</a>
