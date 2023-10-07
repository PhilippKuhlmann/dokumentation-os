<x-app-layout :$customer>
    @can('securepointutm_create')
        <x-sitetopmenu />
    @endcan


    @foreach ($securepointutms as $securepointutm)
        <x-card>
            <x-slot:head>
                <x-show.header can="securepointutm_update" editUrl="{{ route('securepointutm.edit', [$customer, $securepointutm]) }}">
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
                    'Externe URL' => $securepointutm->urlExternal,
                ]" />

            </x-slot>
        </x-card>
    @endforeach

</x-app-layout>
