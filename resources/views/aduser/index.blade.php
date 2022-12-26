<x-app-layout :$customer>

    <x-sitetopmenu>
        <x-input.linkbutton label="Neu" link="/{{ Request::path() }}/create" />
    </x-sitetopmenu>

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Vorname', 'Nachname', 'Benutzername', 'Passwort', '', ]" />

            <x-table.body>

                @foreach ($customer->adusers as $aduser)

                    <x-table.datarow
                        :values="[
                            $aduser->firstName,
                            $aduser->lastName,
                            $aduser->username,
                            'password' => $aduser->password,
                        ]"

                        editUrl="/{{ Request::path() }}/{{ $aduser->id }}/edit"
                        deleteUrl="/{{ Request::path() }}/{{ $aduser->id }}"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>
