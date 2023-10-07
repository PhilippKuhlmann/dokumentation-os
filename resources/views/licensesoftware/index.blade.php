<x-app-layout :$customer>

    @can('licensesoftware_create')
       <x-sitetopmenu />
    @endcan

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Name', 'Key', 'Benutzer', 'Passwort', '' ]" />

            <x-table.body>

                @foreach ($customer->licensesoftware as $licensesoftware)

                    <x-table.datarow
                        :values="[
                            $licensesoftware->name,
                            $licensesoftware->key,
                            $licensesoftware->username,
                            'password' => $licensesoftware->password,
                        ]"

                        editUrl="{{ route('licensesoftware.edit', [$customer, $licensesoftware]) }}"
                        can="licensesoftware_update"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>

