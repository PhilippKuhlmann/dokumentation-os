<x-app-layout :$customer>
    <x-create.main header="IoT Gerät bearbeiten" labelsubmit="Ändern" action="{{ route('iotdevice.update', [$customer, $iotdevice]) }}">
        @method('PATCH')

        <x-edit.select name="site_id" value="Standort" selector="{{ $iotdevice->site_id }}" :array="$sites" />

        <x-create.singlerow label="Name" name="name" default="{{ $iotdevice->name }}" />

        <x-create.doublerow label1="Hersteller" name1="manufacturer" default1="{{ $iotdevice->manufacturer }}" label2="Model" name2="model" default2="{{ $iotdevice->model }}" />

        <x-create.singlerow label="Seriennummer" name="serialNumber" default="{{ $iotdevice->serialNumber }}" />

        <x-create.doublerow label1="IP-Adresse" name1="ip" default1="{{ $iotdevice->ip }}" label2="Port" name2="port" default2="{{ $iotdevice->port }}" />

        <x-create.singlerow label="URL" name="url" default="{{ $iotdevice->url }}" />

        <x-create.doublerow label1="Benutzer" name1="username" default1="{{ $iotdevice->username }}" label2="Passwort" name2="password" default2="{{ $iotdevice->password }}" />

    </x-create.main>

    @can('iotdevice_delete')
        <x-deletecard action="{{ route('iotdevice.destroy', [$customer, $iotdevice]) }}" />
    @endcan

</x-app-layout>
