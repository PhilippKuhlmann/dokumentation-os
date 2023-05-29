<x-app-layout :$customer>

    <x-sitetopmenu />

    @foreach ($customer->phones as $phone)
        <x-card>
            <x-slot:head>
                <x-show.header editUrl="/{{ Request::path() }}/{{ $phone->id }}/edit"
                    deleteUrl="/{{ Request::path() }}/{{ $phone->id }}">
                    Nebenstelle: {{ $phone->extension }}
                </x-show.header>
            </x-slot>

            <x-slot:body>

                <x-minitablecard title="Allgemein" :array="[
                    'Hersteller' => $phone->manufacturer,
                    'Modell' => $phone->model,
                    'Seriennummer' => $phone->serialNumber,
                ]" />

                <x-minitablecard title="Netzwerk" :array="[
                    'IP-Adresse' => $phone->ip,
                    'Port' => $phone->port,
                    'MAC-Adresse' => $phone->mac,
                ]" />

                <x-minitablecard title="Login" :array="[
                    'Benutzer' => $phone->username,
                    'Passwort' => $phone->password,
                ]" />




            </x-slot>
        </x-card>
    @endforeach

</x-app-layout>
