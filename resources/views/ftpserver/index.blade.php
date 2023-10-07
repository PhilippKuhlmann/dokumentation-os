<x-app-layout :$customer>

    @can('ftpserver_create')
       <x-sitetopmenu />
    @endcan

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Host', 'Benutzername', 'Passwort', 'Beschreibung', '', ]" />

            <x-table.body>

                @foreach ($customer->ftpservers as $ftpserver)

                    <x-table.datarow
                        :values="[
                            $ftpserver->host,
                            $ftpserver->username,
                            'password' => $ftpserver->password,
                            $ftpserver->description,
                        ]"

                        editUrl="{{ route('ftpserver.edit', [$customer, $ftpserver]) }}"
                        can="ftpserver_update"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>
