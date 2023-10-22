<x-app-layout :$customer>

    @can('licensesoftware_create')
       <x-sitetopmenu />
    @endcan

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Name', 'Key', 'Benutzer', 'Passwort', 'Download', '' ]" />

            <x-table.body>

                @foreach ($customer->licensesoftware as $licensesoftware)

                    <x-table.datarow
                        :values="[
                            $licensesoftware->name,
                            $licensesoftware->key,
                            $licensesoftware->username,
                            'password' => $licensesoftware->password,
                            'download' => $licensesoftware->file_path ?  route('licensesoftware.download', [$customer, $licensesoftware]) : NULL,
                        ]"

                        editUrl="{{ route('licensesoftware.edit', [$customer, $licensesoftware]) }}"
                        can="licensesoftware_update"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>

