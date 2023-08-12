<x-app-layout :$customer>
    <x-sitetopmenu />

    @foreach ($cameras as $camera)
        <x-card>
            <x-slot:head>
                <x-show.header editUrl="/{{ Request::path() }}/{{ $camera->id }}/edit">
                    {{ $camera->name }}
                </x-show.header>
            </x-slot>

            <x-slot:body>

                <x-minitablecard title="Allgemein" :array="[
                    'Hersteller' => $camera->manufacturer,
                    'Model' => $camera->model,
                    'Seriennummer' => $camera->serialNumber,
                ]" />

                <x-minitablecard title="Netzwerk" :array="[
                    'IP' => $camera->ip,
                    'Port' => $camera->port,
                ]" />

                <x-minitablecard title="Login" :array="[
                    'Benutzer' => $camera->username,
                    'Passwort' => $camera->password,
                ]" />

            </x-slot>
        </x-card>
    @endforeach

</x-app-layout>
