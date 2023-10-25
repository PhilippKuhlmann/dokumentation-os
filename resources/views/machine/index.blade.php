<x-app-layout :$customer>

    @can('machine_create')
        <x-sitetopmenu />
    @endcan

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Name', 'IP', '', ]" />

            <x-table.body>

                @foreach ($machines as $machine)

                    <x-table.datarow
                        :values="[
                            $machine->name,
                            $machine->ip,
                        ]"

                        editUrl="{{ route('machine.edit', [$customer, $machine]) }}"
                        can="machine_update"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>
