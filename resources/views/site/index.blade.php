<x-app-layout :$customer>

    @can('site_create')
        <x-sitetopmenu />
    @endcan

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

                        editUrl="{{ route('site.edit', [$customer, $site]) }}"
                        can="site_update"

                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>

