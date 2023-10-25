<x-app-layout :$customer>

    @can('loginrecorder_create')
        <x-sitetopmenu />
    @endcan

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Recorder', 'Benutzername', 'Passwort', '' ]" />

            <x-table.body>

                @foreach ($loginrecorders as $loginrecorder)

                    <x-table.datarow
                        :values="[
                            $loginrecorder->recorder->name,
                            $loginrecorder->username,
                            'password' => $loginrecorder->password,
                        ]"

                        editUrl="{{ route('loginrecorder.edit', [$customer, $loginrecorder]) }}"
                        can="loginrecorder_update"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>
