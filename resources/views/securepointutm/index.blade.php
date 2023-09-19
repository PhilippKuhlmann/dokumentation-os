<x-app-layout :$customer>
    <x-sitetopmenu />

    @foreach ($securepointutms as $securepointutm)
        <x-card>
            <x-slot:head>
                <x-show.header editUrl="{{ route('securepointutm.edit', [$customer, $securepointutm]) }}">
                    {{ $securepointutm->name }}
                </x-show.header>
            </x-slot>

            <x-slot:body>

                <x-minitablecard title="Allgemein" :array="[
                    'Art' => $securepointutm->type,
                    'Seriennummer' => $securepointutm->serialNumber,
                ]" />

                <x-minitablecard title="Login" :array="[
                    'Benutzername' => $securepointutm->username,
                    'Passwort' => $securepointutm->password,
                    'Cloud Backup Passwort' => $securepointutm->cloudBackupPassword,
                    'USC-PIN' => $securepointutm->uscpin,
                ]" />

                <x-minitablecard title="URL" :array="[
                    'IP' => $securepointutm->ip,
                    'Admin URL' => $securepointutm->urlAdmin,
                    'User URL' => $securepointutm->urlUser,
                ]" />

            </x-slot>
        </x-card>
    @endforeach

</x-app-layout>
