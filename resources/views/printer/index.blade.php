<x-app-layout :$customer>
    <x-sitetopmenu>
        <x-input.linkbutton label="Neu" link="{{ route('printer.create', [$customer]) }}" />
    </x-sitetopmenu>

    @foreach ($customer->printers as $printer)
    <x-card>
        <x-slot:head>
            <x-show.header editUrl="/{{ Request::path() }}/{{ $printer->id }}/edit"
                deleteUrl="/{{ Request::path() }}/{{ $printer->id }}">
                {{ $printer->name }}
            </x-show.header>
        </x-slot>

        <x-slot:body>

            <x-minitablecard title="Allgemein" :array="[
                'Hersteller' => $printer->manufacturer,
                'Modell' => $printer->model,
                'Seriennummer' => $printer->serialNumber,
            ]" />

            <x-minitablecard title="Netzwerk" :array="[
                'IP-Adresse' => $printer->ip,
                'Port' => $printer->port,
            ]" />

            <x-minitablecard title="Login" :array="[
                'Benutzer' => $printer->username,
                'Passwort' => $printer->password,
            ]" />

        </x-slot>
    </x-card>
@endforeach


</x-app-layout>
