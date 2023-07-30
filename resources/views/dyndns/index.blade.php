<x-app-layout :$customer>

    <x-sitetopmenu />

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

                        editUrl="/{{ Request::path() }}/{{ $dyndns->id }}/edit"
                        deleteUrl="/{{ Request::path() }}/{{ $dyndns->id }}"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>
