<x-app-layout :$customer>

    @can('iotdevice_create')
        <x-sitetopmenu />
    @endcan


    @foreach ($iotdevices as $iotdevice)
    <x-card>
        <x-slot:head>
            <x-show.header can="iotdevice_update" editUrl="{{ route('iotdevice.edit', [$customer, $iotdevice]) }}">
                {{ $iotdevice->name }}
            </x-show.header>
        </x-slot>

        <x-slot:body>

            <x-minitablecard title="Allgemein" :array="[
                'Hersteller' => $iotdevice->manufacturer,
                'Modell' => $iotdevice->model,
                'Seriennummer' => $iotdevice->serialNumber,
            ]" />

            <x-minitablecard title="Netzwerk" :array="[
                'IP-Adresse' => $iotdevice->ip,
                'Port' => $iotdevice->port,
                'URL' => $iotdevice->url,
            ]" />

            <x-minitablecard title="Login" :array="[
                'Benutzer' => $iotdevice->username,
                'Passwort' => $iotdevice->password
            ]" />

        </x-slot>
    </x-card>
@endforeach


</x-app-layout>
