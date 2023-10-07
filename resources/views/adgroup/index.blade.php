<x-app-layout :$customer>

    @can('adgroup_create')
        <x-sitetopmenu />
    @endcan

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Gruppenname', 'Beschreibung', '', ]" />

            <x-table.body>

                @foreach ($customer->adgroups as $adgroup)

                    <x-table.datarow
                        :values="[
                            $adgroup->name,
                            $adgroup->description,
                        ]"

                        editUrl="{{ route('adgroup.edit', [$customer, $adgroup]) }}"
                        can="adgroup_update"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>

