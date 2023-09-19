<x-app-layout :$customer>

    <x-sitetopmenu />

    @foreach ($dect as $dect)
        <x-card>
            <x-slot:head>
                <x-show.header editUrl="/{{ Request::path() }}/{{ $dect->id }}/edit"
                    deleteUrl="/{{ Request::path() }}/{{ $dect->id }}">
                    Rolle: {{ $dect->role }}
                </x-show.header>
            </x-slot>

            <x-slot:body>

                <x-minitablecard title="Allgemein" :array="[
                    'Hersteller' => $dect->manufacturer,
                    'Modell' => $dect->model,
                    'Seriennummer' => $dect->serialNumber,
                ]" />

                <x-minitablecard title="Netzwerk" :array="[
                    'IP-Adresse' => $dect->ip,
                    'Port' => $dect->port,
                    'MAC-Adresse' => $dect->mac,
                ]" />

                <x-minitablecard title="Login" :array="[
                    'Benutzer' => $dect->username,
                    'Passwort' => $dect->password,
                ]" />




            </x-slot>
        </x-card>
    @endforeach

</x-app-layout>
