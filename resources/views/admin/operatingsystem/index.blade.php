<x-admin-layout>

    <x-sitetopmenu>
    </x-sitetopmenu>

<div class="m-3">

    <form method="POST" action="/admin/create/operatingsystem" class="mb-5">
        @csrf
        <x-input.field name="name" placeholder="Name" />
        <x-input.button label="Hinzufügen" />
    </form>

    <x-table.main>
        <x-table.head :labels="['Name', 'Anzahl', '', ]" />

        <x-table.body>

            @foreach ($operatingSystems as $operatingSystem)

                <x-table.datarow
                    :values="[
                        $operatingSystem->name,
                        $operatingSystem->servers()->count(),
                    ]"

                    editUrl="/{{ Request::path() }}/{{ $operatingSystem->id }}/edit"
                    deleteUrl="/{{ Request::path() }}/{{ $operatingSystem->id }}"
                />

            @endforeach

        </x-table.body>
    </x-table.main>
</div>



</x-admin-layout>
