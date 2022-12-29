<div class="flex flex-col h-screen sm:justify-center items-center">
    <div class="w-full sm:w-96 md:w-1/2 sm:rounded-md sm:shadow-2xl p-3 bg-white
                  dark:bg-gray-800">

        <div class="text-center">
            <div class="flex">
                <input wire:model.debounce.300ms="search" type="search" name="search" placeholder="Kundensuche"
                    class="rounded-l-sm w-full px-4 text-sm bg-gray-100 text-gray-900
                                    dark:bg-gray-700 dark:text-gray-100 dark:border-gray-500
                                     focus:ring-0 focus:border-blue-600"
                    autofocus />
            </div>
        </div>


    </div>

    <div
        class="w-full sm:w-96 md:w-1/2 sm:rounded-md sm:shadow-2xl p-3 mt-3 bg-white
                  dark:bg-gray-800">

        @empty($customers)
            <div class="text-gray-900 dark:text-gray-100 text-center h-96">
                Keine Suchergebnisse
            </div>
        @endempty

        @empty(!$customers)
            <div class="flex flex-col text-gray-900 dark:text-white h-96 overflow-auto">
                @foreach ($customers as $customer)
                    <a href="/{{ $customer->slug }}"
                        class="py-2 px-3 m-1 rounded-md hover:dark:bg-gray-600 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700">
                        {{ $customer->name }}
                    </a>
                @endforeach
            </div>
        @endempty


    </div>
</div>
