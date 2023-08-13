<x-app-layout :$customer>

    <x-sitetopmenu />

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Name', 'Straße', 'Ort', '', ]" />

            <x-table.body>

                @foreach ($sites as $site)

                    <x-table.datarow
                        :values="[
                            $site->name,
                            $site->street . ' ' . $site->house_number,
                            $site->zip . ' ' . $site->city,

                        ]"

                        editUrl="/{{ Request::path() }}/{{ $site->id }}/edit"

                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>

