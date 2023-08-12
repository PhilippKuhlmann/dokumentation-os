<x-app-layout :$customer>
    <x-sitetopmenu />

    @foreach ($recorders as $recorder)
        <x-card>
            <x-slot:head>
                <x-show.header editUrl="/{{ Request::path() }}/{{ $recorder->id }}/edit">
                    {{ $recorder->name }}
                </x-show.header>
            </x-slot>

            <x-slot:body>

                <x-minitablecard title="Allgemein" :array="[
                    'Hersteller' => $recorder->manufacturer,
                    'Model' => $recorder->model,
                    'Seriennummer' => $recorder->serialNumber,
                ]" />

                <x-minitablecard title="Netzwerk" :array="[
                    'IP' => $recorder->ip,
                    'Port' => $recorder->port,
                ]" />

                <x-minitablecard title="Login" :array="[
                    'Benutzer' => $recorder->username,
                    'Passwort' => $recorder->password,
                ]" />

            </x-slot>
        </x-card>
    @endforeach

</x-app-layout>
