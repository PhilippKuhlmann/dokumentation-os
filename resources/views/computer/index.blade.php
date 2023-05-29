<x-app-layout :$customer>

    <x-sitetopmenu />

    @foreach ($customer->computers as $computer)
    <x-card>
        <x-slot:head>
            <x-show.header editUrl="/{{ Request::path() }}/{{ $computer->id }}/edit"
                deleteUrl="/{{ Request::path() }}/{{ $computer->id }}">
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
