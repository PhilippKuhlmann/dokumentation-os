<x-admin-layout>

    <x-sitetopmenu>
    </x-sitetopmenu>

<div class="m-3">

    <form method="POST" action="/admin/create/serveroperatingsystem" class="mb-5">
        @csrf
        <x-input.field name="name" placeholder="Name" />
        <x-input.button label="Hinzufügen" />
    </form>

    <x-table.main>
        <x-table.head :labels="['Name', 'Anzahl', '', ]" />

        <x-table.body>

            @foreach ($serverOperatingSystems as $serverOperatingSystem)

                <x-table.datarow
                    :values="[
                        $serverOperatingSystem->name,
                        $serverOperatingSystem->servers()->count(),
                    ]"

                    editUrl="/{{ Request::path() }}/{{ $serverOperatingSystem->id }}/edit"
                    deleteUrl="/{{ Request::path() }}/{{ $serverOperatingSystem->id }}"
                />

            @endforeach

        </x-table.body>
    </x-table.main>
</div>



</x-admin-layout>
