<x-app-layout :$customer>

    <x-sitetopmenu>
        <x-input.linkbutton label="Neu" link="/{{ Request::path() }}/create" />
    </x-sitetopmenu>

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['SSID', 'VLAN', 'Verschlüsselung', 'Passwort', '', ]" />

            <x-table.body>

                @foreach ($customer->wifis as $wifi)

                    <x-table.datarow
                        :values="[
                            $wifi->ssid,
                            $wifi->vlan,
                            $wifi->encryption,
                            'password' => $wifi->password,
                        ]"

                        editUrl="/{{ Request::path() }}/{{ $wifi->id }}/edit"
                        deleteUrl="/{{ Request::path() }}/{{ $wifi->id }}"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>

