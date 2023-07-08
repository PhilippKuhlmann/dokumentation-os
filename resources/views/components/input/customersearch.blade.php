@props(['value' => '', 'autofocus' => false])

<div {{ $attributes->merge([
    'class' => "text-center"
]) }}>
    <form method="GET" action="/customer/search" class="flex">
        <input
            type="text"
            name="search"
            placeholder="Kundensuche"
            value="{{ $value }}"
            class="border-r-0 rounded-l-sm w-full px-4 text-sm bg-gray-100 text-gray-900
                    dark:bg-gray-700 dark:text-gray-100 dark:border-gray-500
                     focus:ring-0 focus:border-blue-600"
            @if ($autofocus)
                autofocus
            @endif
            />
        <button type="submit" class="bg-ssystemblue px-6 rounded-r-sm text-sm text-white hover:bg-blue-600 focus:bg-blue-600">
            Suchen
        </button>
    </form>
</div>
