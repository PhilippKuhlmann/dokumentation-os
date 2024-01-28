
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <h1 class="text-3xl font-bold underline">
    Hello world!
  </h1>


<div>


    @foreach ($customer->servers as $server)
        <x-card>
            <x-slot:head>
                <x-show.header can="server_update" editUrl="{{ route('server.edit', [$customer, $server]) }}">
                    @if ($server->remoteID AND $server->remotePassword)
                        <x-input.linkbutton link="rustdesk://connection/new/{{ $server->remoteID }}?password={{ $server->remotePassword }}">
                            <x-slot:label>
                                <x-svg.software.rustdesk class="h-6 w-6 !fill-cerulean-500 hover:!fill-cerulean-400" />
                            </x-slot:label>
                        </x-input.linkbutton>
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
</div>
</body>
</html>
