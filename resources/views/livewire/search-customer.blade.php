<div class="flex flex-col h-screen sm:justify-center items-center">
    <div class="w-full sm:w-96 md:w-1/2 sm:rounded-md p-2 bg-white border-2 border-cerulean-500
                  dark:bg-gray-900">

        <div class="text-center">
            <div class="flex">
                <input wire:model.debounce.300ms="search" type="search" name="search" placeholder="Kundensuche"
                    class=" w-full px-4  bg-white text-gray-900
                                    dark:bg-gray-900 dark:text-gray-100 dark:border-gray-900
                                     focus:ring-0 focus:border-white border-white"
                    autofocus />
            </div>
        </div>


    </div>

    <div
        class="w-full sm:w-96 md:w-1/2 sm:rounded-md p-3 mt-3 bg-white border-2 border-cerulean-500
                  dark:bg-gray-900">

        @empty($customers)
            <div class="text-gray-900 dark:text-gray-100 text-center h-96">
                Keine Suchergebnisse
            </div>
        @endempty

        @empty(!$customers)
            <div class="flex flex-col text-gray-900 dark:text-white h-96 overflow-auto">
                @foreach ($customers as $customer)
                    <a href="/{{ $customer->slug }}"
                        class="py-2 px-3 m-1 rounded-md hover:dark:bg-gray-600 bg-gray-100 hover:bg-hawkes-blue-200 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-cerulean-500 focus:border-cerulean-500">
                        {{ $customer->name }} {{ $customer->location ? ' - ' . $customer->location : '' }}
                    </a>
                @endforeach
            </div>
        @endempty


    </div>
</div>
