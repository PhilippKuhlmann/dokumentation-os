<x-app-layout :$customer>

    @can('router_create')
        <x-sitetopmenu />
    @endcan


    @foreach ($routers as $router)
        <x-card>
            <x-slot:head>
                <x-show.header can="router_update" editUrl="{{ route('router.edit', [$customer, $router]) }}">
                    {{ $router->name }}
                </x-show.header>
            </x-slot>

            <x-slot:body>

                <x-minitablecard title="Allgemein" :array="[
                    'Art' => $router->type,
                    'Seriennummer' => $router->serialNumber,
                ]" />

                <x-minitablecard title="Login" :array="[
                    'Benutzername' => $router->username,
                    'Passwort' => $router->password,
                ]" />

                <x-minitablecard title="Netzwerk" :array="[
                    'IP' => $router->ip,
                    'Port' => $router->port,
                ]" />

            </x-slot>
        </x-card>
    @endforeach

</x-app-layout>
