@props(['editUrl', 'deleteUrl'])

<div class="flex w-full items-center justify-between p-3">
    <div class="flex gap-3 text-center items-center w-full text-2xl dark:text-gray-100">
        {{ $slot }}
    </div>
    @cannot('isCustomerR')
        <div class="flex items-center gap-3">
            <div class="flex flex-row space-x-2">
                <a href="{{ $editUrl }}" class="font-medium text-cerulean-500 dark:text-cerulean-500 hover:text-cerulean-600  dark:hover:text-cerulean-600">
                    <x-svg.edit class="h-5 w-5" />
                </a>
            </div>
        </div>
    @endcannot

</div>
