<x-app-layout :$customer>
    <x-create.main header="Camera bearbeiten" labelsubmit="Speichern" action="{{ route('camera.update', [$customer, $camera]) }}">
        @method('PATCH')

        <x-edit.select name="site_id" value="Standort" selector="{{ $camera->site_id }}" :array="$sites" />

        <x-create.singlerow label="Name" name="name" :default="$camera->name" />

        <x-create.doublerow label1="Hersteller" name1="manufacturer" :default1="$camera->manufacturer" label2="Model" name2="model" :default2="$camera->model" />

        <x-create.singlerow label="Seriennummer" name="serialNumber" :default="$camera->serialNumber" />

        <x-create.doublerow14 label1="IP" name1="ip" :default1="$camera->ip" label2="Port" name2="port" type2="number" :default2="$camera->port" />

        <x-create.doublerow label1="Benutzer" name1="username" :default1="$camera->username" label2="Passwort" name2="password" :default2="$camera->password" />

    </x-create.main>

    <livewire:device-ip-addresses :model="$camera" :customer="$customer" />

    @can('camera_delete')
        <x-deletecard action="{{ route('camera.destroy', [$customer, $camera]) }}" />
    @endcan

</x-app-layout>
