<x-admin-layout>

    <x-sitetopmenu />

<div class="m-3">
    <x-table.main>
        <x-table.head :labels="['Name', 'KD-Nr.', '', ]" />

        <x-table.body>

            @foreach ($customers as $customer)

                <x-table.datarow
                    :values="[
                        $customer->name,
                        $customer->customer_number,
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
