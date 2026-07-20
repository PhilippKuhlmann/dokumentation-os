<x-app-layout :$customer>
    <x-create.main header="Sonstiges Gerät bearbeiten" labelsubmit="Speichern" action="{{ route('otherclient.update', [$customer, $otherclient]) }}">
        @method('PATCH')

        <x-edit.select name="site_id" value="Standort" selector="{{ $otherclient->site_id }}" :array="$sites" />

        <x-create.singlerow label="Name" name="name" :default="$otherclient->name" />

        <x-create.doublerow label1="Hersteller" name1="manufacturer" :default1="$otherclient->manufacturer" label2="Model" name2="model" :default2="$otherclient->model" />

        <x-create.singlerow label="Seriennummer" name="serialNumber" :default="$otherclient->serialNumber" />

        <x-create.doublerow label1="IP-Adresse" name1="ip" :default1="$otherclient->ip" label2="Port" name2="port" :default2="$otherclient->port" />

        <x-create.singlerow label="URL" name="url" :default="$otherclient->url" />

        <x-create.doublerow label1="Benutzer" name1="username" :default1="$otherclient->username" label2="Passwort" name2="password" :default2="$otherclient->password" />

    </x-create.main>

    <livewire:device-ip-addresses :model="$otherclient" :customer="$customer" />

    @can('otherclient_delete')
        <x-deletecard action="{{ route('otherclient.destroy', [$customer, $otherclient]) }}" />
    @endcan

</x-app-layout>
