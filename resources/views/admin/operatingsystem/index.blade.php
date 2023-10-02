<x-admin-layout>

    <div class="flex w-full pl-3 pt-3 gap-3">
        <div class="h-20 w-64 border border-cerulean-500 rounded-sm">
            <div class="h-8 text-cerulean-500 text-center font-CoconPro">
                Betriebsysteme Gesamt
            </div>
            <div class="h-10 text-chathams-blue-800 dark:text-gray-100 text-center font-CoconPro text-4xl">
                {{ $operatingSystemsCount }}
            </div>

        </div>

    </div>



    <x-sitetopmenu />

<div class="m-3">
    <x-table.main>
        <x-table.head :labels="['Name', '', ]" />

        <x-table.body>

            @foreach ($operatingSystems as $operatingSystem)

                <x-table.datarow
                    :values="[
                        $operatingSystem->name
                    ]"

                    editUrl="/{{ Request::path() }}/{{ $operatingSystem->id }}/edit"
                />

            @endforeach

        </x-table.body>
    </x-table.main>
    <div class="mt-5 mb-10">
        {{ $operatingSystems->links() }}
    </div>

</div>

</x-admin-layout>
