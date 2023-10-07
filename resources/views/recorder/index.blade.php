<x-app-layout :$customer>

    @can('recorder_create')
        <x-sitetopmenu />
    @endcan

    @foreach ($recorders as $recorder)
        <x-card>
            <x-slot:head>
                <x-show.header can="recorder_update" editUrl="{{ route('recorder.edit', [$customer, $recorder]) }}">
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
