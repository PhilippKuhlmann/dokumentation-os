<x-app-layout :$customer>

    <x-sitetopmenu />

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

                        editUrl="/{{ Request::path() }}/{{ $licensesoftware->id }}/edit"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>

