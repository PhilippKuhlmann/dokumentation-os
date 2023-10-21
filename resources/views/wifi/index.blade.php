<x-app-layout :$customer>

    @can('wifi_create')
        <x-sitetopmenu />
    @endcan

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['SSID', 'Netzwerk', 'Verschlüsselung', 'Passwort', '', ]" />

            <x-table.body>

                @foreach ($wifis as $wifi)

                    <x-table.datarow
                        :values="[
                            $wifi->ssid,
                            $wifi->network->vlanId. ' - ' . $wifi->network->description,
                            $wifi->encryption,
                            'password' => $wifi->password,
                        ]"

                        editUrl="{{ route('wifi.edit', [$customer, $wifi]) }}"
                        can="wifi_update"

                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>

