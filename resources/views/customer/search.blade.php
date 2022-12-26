<x-empty-layout>
    <div class="flex flex-col h-screen justify-center items-center">
        <div
            class="w-full sm:w-96 md:w-1/2 sm:rounded-md sm:shadow-2xl p-3 bg-white
                      dark:bg-gray-800">

            <x-input.customersearch value="{{ request('search') }}" autofocus="true" />

        </div>

        <div
            class="w-full sm:w-96 md:w-1/2 sm:rounded-md sm:shadow-2xl p-3 mt-3 bg-white
                      dark:bg-gray-800">

            @empty($customers)
                <div class="text-gray-900 dark:text-gray-100 text-center">
                    Keine Suchergebnisse
                </div>
            @endempty

            @empty(!$customers)
                <div class="flex flex-col text-gray-900 dark:text-white max-h-96 overflow-auto">
                    @foreach ($customers as $customer)
                        <a href="/{{ $customer->slug }}" class="py-2 px-3 m-1 rounded-md bg-gray-100 dark:bg-gray-700">
                            {{ $customer->name }}
                        </a>
                    @endforeach
                </div>
            @endempty


        </div>
    </div>
</x-empty-layout>
