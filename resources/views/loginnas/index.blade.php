<x-app-layout :$customer>

    @can('loginnas_create')
        <x-sitetopmenu />
    @endcan

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

                        editUrl="{{ route('loginnas.edit', [$customer, $loginnas]) }}"
                        can="loginnas_update"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>
