<x-app-layout :$customer>

    @can('securepointuma_create')
        <x-sitetopmenu />
    @endcan

    @foreach ($customer->securepointumas as $securepointuma)
        <x-card>
            <x-slot:head>
                <x-show.header can="securepointuma_update" editUrl="{{ route('securepointuma.edit', [$customer, $securepointuma]) }}">
                    {{ $securepointuma->name }}
                </x-show.header>
            </x-slot>

            <x-slot:body>

                <x-minitablecard title="Allgemein" :array="[
                    'Art' => $securepointuma->type,
                ]" />

                <x-minitablecard title="Login" :array="[
                    'Benutzername' => $securepointuma->username,
                    'Passwort' => $securepointuma->password,
                    'Verschlüsselungscode' => $securepointuma->encryptionkey,
                ]" />

                <x-minitablecard title="URL" :array="[
                    'IP' => $securepointuma->ip,
                    'Admin URL' => $securepointuma->urlAdmin,
                    'User URL' => $securepointuma->urlUser,
                ]" />

            </x-slot>
        </x-card>
    @endforeach

</x-app-layout>
