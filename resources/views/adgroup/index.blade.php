<x-app-layout :$customer>

    <x-sitetopmenu>
        <x-input.linkbutton label="Neu" link="/{{ Request::path() }}/create" />
    </x-sitetopmenu>

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

                        editUrl="/{{ Request::path() }}/{{ $adgroup->id }}/edit"
                        deleteUrl="/{{ Request::path() }}/{{ $adgroup->id }}"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>

