<x-app-layout :$customer>

    <x-sitetopmenu />

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['NAS', 'Benutzername', 'Passwort', 'Beschreibung', '' ]" />

            <x-table.body>

                @foreach ($customer->loginnas as $loginnas)

                    <x-table.datarow
                        :values="[
                            $loginnas->nas->name,
                            $loginnas->username,
                            'password' => $loginnas->password,
                            $loginnas->description,
                        ]"

                        editUrl="/{{ Request::path() }}/{{ $loginnas->id }}/edit"
                        deleteUrl="/{{ Request::path() }}/{{ $loginnas->id }}"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>
