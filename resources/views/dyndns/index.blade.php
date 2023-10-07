<x-app-layout :$customer>

    @can('dyndns_create')
        <x-sitetopmenu />
    @endcan


    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Anbieter', 'Host', 'Benutzername', 'Passwort', '', ]" />

            <x-table.body>

                @foreach ($customer->dyndns as $dyndns)

                    <x-table.datarow
                        :values="[
                            $dyndns->providor,
                            $dyndns->host,
                            $dyndns->username,
                            'password' => $dyndns->password,
                        ]"

                        editUrl="{{ route('dyndns.edit', [$customer, $dyndns]) }}"
                        can="dyndns_update"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>
