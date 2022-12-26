@props(['editUrl', 'deleteUrl'])

<div class="flex w-full items-center justify-between p-3">
    <div class="w-full text-2xl dark:text-gray-100">
        {{ $slot }}
    </div>
    <div class="flex items-center gap-3">
        <div class="flex flex-row space-x-2">
            <a href="{{ $editUrl }}" class="font-medium text-gray-900 dark:text-gray-100 hover:text-blue-600">
                <x-svg.edit class="h-5 w-5" />
            </a>
            <form method="POST" action="{{ $deleteUrl }}">
                @csrf
                @method('delete')
                <button class="text-red-500 hover:text-red-800" type="submit">
                    <x-svg.trash class="h-5 w-5" />
                </button>
            </form>
        </div>
    </div>
</div>
