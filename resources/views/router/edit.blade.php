<x-app-layout :$customer>
    <x-create.main header="Router bearbeiten" labelsubmit="Speichern" action="{{ route('router.update', [$customer, $router]) }}">
        @method('PATCH')

        <x-edit.select name="site_id" value="Standort" selector="{{ $router->site_id }}" :array="$sites" />

        <x-create.singlerow label="Name" name="name" :default="$router->name" />

        <x-create.singlerow label="Hersteller" name="manufacturer" :default="$router->manufacturer" />

        <x-create.doublerow label1="Modell" name1="model" :default1="$router->model" label2="Seriennummer" name2="serialNumber" :default2="$router->serialNumber" />

        <x-create.singlerow label="Benutzername" name="username" :default="$router->username" />

        <x-create.singlerow label="Passwort" name="password" :default="$router->password" />

        <x-create.doublerow14 label1="IP" name1="ip" :default1="$router->ip" label2="Port" name2="port" :default2="$router->port" type2="number" />

    </x-create.main>

    <livewire:device-ip-addresses :model="$router" :customer="$customer" />

    @can('router_delete')
        <x-deletecard action="{{ route('router.destroy', [$customer, $router]) }}" />
    @endcan

</x-app-layout>
