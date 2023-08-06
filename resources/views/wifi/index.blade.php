<x-app-layout :$customer>

    <x-sitetopmenu />

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['SSID', 'VLAN', 'Verschlüsselung', 'Passwort', '', ]" />

            <x-table.body>

                @foreach ($wifis as $wifi)

                    <x-table.datarow
                        :values="[
                            $wifi->ssid,
                            $wifi->vlan,
                            $wifi->encryption,
                            'password' => $wifi->password,
                        ]"

                        editUrl="/{{ Request::path() }}/{{ $wifi->id }}/edit"

                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>

