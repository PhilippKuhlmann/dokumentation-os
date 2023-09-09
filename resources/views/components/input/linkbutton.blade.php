@props([
    'label',
    'link',
    'color' => 'blue'
])


<a
    href="{{ $link }}"
    @if ($color == 'blue')
        class="text-cerulean-500 hover:text-cerulean-600 font-DINPro-bold"
    @elseif ($color == 'gray')
        class="py-2 px-4 text-sm bg-gray-900 hover:bg-gray-400 text-gray-100 dark:bg-gray-700 rounded-sm"
    @endif

>
    {{ $label }}
</a>
