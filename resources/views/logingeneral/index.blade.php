<x-app-layout :$customer>

    @can('logingeneral_create')
        <x-sitetopmenu />
    @endcan

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Name', 'Benutzername', 'Passwort', 'Beschreibung', '', ]" />

            <x-table.body>

                @foreach ($customer->logingenerals as $logingeneral)

                    <x-table.datarow
                        :values="[
                            $logingeneral->name,
                            $logingeneral->username,
                            'password' => $logingeneral->password,
                            $logingeneral->description,

                        ]"

                        editUrl="{{ route('logingeneral.edit', [$customer, $logingeneral]) }}"
                        can="logingeneral_update"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>
