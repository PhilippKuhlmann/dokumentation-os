<x-app-layout :$customer>

    <x-sitetopmenu />

    @foreach ($servers as $server)
        <x-card>
            <x-slot:head>
                <x-show.header editUrl="/{{ Request::path() }}/{{ $server->id }}/edit"
                    deleteUrl="/{{ Request::path() }}/{{ $server->id }}">
                    @if ($server->remoteID AND $server->remotePassword)
                        <a href="rustdesk://connection/new/{{ $server->remoteID }}?password={{ $server->remotePassword }}" class=" bg-cerulean-500 text-gray-100 rounded-sm px-4 py-2 text-sm mr-5 hover:bg-cerulean-600">
                        Verbinden</a>
                    @endif
                    {{ $server->name }}
                </x-show.header>
            </x-slot>

            <x-slot:body>

                <x-minitablecard title="Hardware" :array="[
                    'Hersteller' => $server->manufacturer,
                    'Modell' => $server->model,
                    'Seriennummer' => $server->serialNumber,
                ]" />

                <x-minitablecard title="Netzwerk" :array="[
                    'IP-Adresse 1' => $server->ip1,
                    'IP-Adresse 2' => $server->ip2,
                ]" />

                <x-minitablecard title="BMC" :array="[
                    'BMC IP-Adresse' => $server->bmcIp,
                    'BMC Benutzer' => $server->bmcUser,
                    'BMC Passwort' => $server->bmcPassword,
                ]" />

                <x-minitagcard title="Dienste" :array="$server->services" />

                <x-minitextcard title="Betriebsystem">
                    {{ $server->operatingSystem->name }}
                </x-minitextcard>

            </x-slot>
        </x-card>
    @endforeach
</x-app-layout>
