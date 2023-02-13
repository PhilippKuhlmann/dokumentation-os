<x-admin-layout>

    <x-sitetopmenu>
        <x-input.linkbutton label="Neu" link="/{{ Request::path() }}/create" />
    </x-sitetopmenu>

<div class="m-3">
    <x-table.main>
        <x-table.head :labels="['Name', 'Standort', '', ]" />

        <x-table.body>

            @foreach ($customers as $customer)

                <x-table.datarow
                    :values="[
                        $customer->name,
                        $customer->location,
                    ]"

                    editUrl="/{{ Request::path() }}/{{ $customer->id }}/edit"
                    deleteUrl="/{{ Request::path() }}/{{ $customer->id }}"
                />

            @endforeach

        </x-table.body>
    </x-table.main>

    {{ $customers->links() }}
</div>



</x-admin-layout>
