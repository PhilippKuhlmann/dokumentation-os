<x-app-layout :$customer>

    <x-sitetopmenu />

    @foreach ($customer->computers as $computer)
    <x-card>
        <x-slot:head>
            <x-show.header editUrl="/{{ Request::path() }}/{{ $computer->id }}/edit"
                deleteUrl="/{{ Request::path() }}/{{ $computer->id }}">
                @if ($computer->remoteID AND $computer->remotePassword)
                    <a href="rustdesk://connection/new/{{ $computer->remoteID }}?password={{ $computer->remotePassword }}" class=" bg-ssystemblue text-gray-100 rounded-md px-4 py-2 text-sm mr-5 hover:bg-blue-600">Verbinden</a>
                @endif
                {{ $computer->name }}
            </x-show.header>
        </x-slot>

        <x-slot:body>

            <x-minitablecard title="Allgemein" :array="[
                'Hersteller' => $computer->manufacturer,
                'Modell' => $computer->model,
                'Seriennummer' => $computer->serialNumber,
            ]" />

            <x-minitablecard title="Netzwerk" :array="[
                'IP-Adresse' => $computer->ip,
            ]" />

            <x-minitextcard title="Betriebsystem">
                {{ $computer->operatingSystem->name }}
            </x-minitextcard>

        </x-slot>
    </x-card>
@endforeach


</x-app-layout>
