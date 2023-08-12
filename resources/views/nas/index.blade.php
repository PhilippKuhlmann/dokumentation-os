<x-app-layout :$customer>

    <x-sitetopmenu>
        <x-input.linkbutton label="Weitere Logins" link="{{ route('loginnas.index', $customer) }}" />
    </x-sitetopmenu>

    @foreach ($nas as $nas)
        <x-card>
            <x-slot:head>
                <x-show.header
                    editUrl="{{ route('nas.edit', [$customer, $nas]) }}"
                    deleteUrl="{{ route('nas.destroy', [$customer, $nas]) }}">
                    {{ $nas->name }}
                </x-show.header>
            </x-slot>

            <x-slot:body>

                <x-minitablecard title="Hardware" :array="[
                    'Hersteller' => $nas->manufacturer,
                    'Modell' => $nas->model,
                    'Seriennummer' => $nas->serialNumber,
                ]" />

                <x-minitablecard title="Netzwerk" :array="[
                    'IP-Adresse 1' => $nas->ip1,
                    'IP-Adresse 2' => $nas->ip2,
                    'Port' => $nas->port,
                ]" />

                <x-minitablecard title="Login" :array="[
                    'Benutzer' => $nas->username,
                    'Passwort' => $nas->password,
                ]" />


            </x-slot>
        </x-card>
    @endforeach
</x-app-layout>
