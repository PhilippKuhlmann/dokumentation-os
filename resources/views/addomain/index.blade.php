<x-app-layout :$customer>

    <x-sitetopmenu />

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Domäne', 'NETBIOS', 'DSRM Passwort', '', ]" />

            <x-table.body>

                @foreach ($customer->addomains as $addomain)

                    <x-table.datarow
                        :values="[
                            $addomain->domain,
                            $addomain->netbios,
                            $addomain->dsrmpassword,
                        ]"

                        editUrl="{{ route('addomain.edit', [$customer, $addomain]) }}"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>
