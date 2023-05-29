<x-app-layout :$customer>

    <x-sitetopmenu />

    @foreach ($customer->phoneSystems as $phoneSystem)
        <x-card>
            <x-slot:head>
                <x-show.header editUrl="/{{ Request::path() }}/{{ $phoneSystem->id }}/edit"
                    deleteUrl="/{{ Request::path() }}/{{ $phoneSystem->id }}">
                    {{ $phoneSystem->manufacturer }}
                </x-show.header>
            </x-slot>

            <x-slot:body>

                <x-minitablecard title="Allgemein" :array="[
                    'Modell' => $phoneSystem->model,
                    'Seriennummer' => $phoneSystem->serialNumber,
                ]" />

                <x-minitablecard title="Netzwerk" :array="[
                    'IP-Adresse 1' => $phoneSystem->ip1,
                    'IP-Adresse 2' => $phoneSystem->ip2,
                    'IP-Adresse 3' => $phoneSystem->ip3,
                    'Port' => $phoneSystem->port,
                ]" />

                <x-minitablecard title="Login" :array="[
                    'Benutzer' => $phoneSystem->username,
                    'Passwort' => $phoneSystem->password,
                ]" />




            </x-slot>
        </x-card>
    @endforeach

</x-app-layout>
