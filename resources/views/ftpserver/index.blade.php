<x-app-layout :$customer>

    <x-sitetopmenu />

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

                        editUrl="/{{ Request::path() }}/{{ $ftpserver->id }}/edit"
                        deleteUrl="/{{ Request::path() }}/{{ $ftpserver->id }}"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>
