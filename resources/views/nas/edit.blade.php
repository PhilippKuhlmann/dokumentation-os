<x-app-layout :$customer>
    <x-create.main header="NAS bearbeiten" labelsubmit="Speichern" action="{{ route('nas.update', [$customer, $nas]) }}">
        @method('PATCH')

        <x-edit.select name="site_id" value="Standort" selector="{{ $nas->site_id }}" :array="$sites" />

        <x-create.singlerow label="Name" name="name" default="{{ $nas->name }}" />

        <x-create.doublerow label1="Hersteller" name1="manufacturer" default1="{{ $nas->manufacturer }}" label2="Model" name2="model" default2="{{ $nas->model }}" />

        <x-create.singlerow label="Seriennummer" name="serialNumber" default="{{ $nas->serialNumber }}" />

        <x-create.doublerow label1="IP 1" name1="ip1" default1="{{ $nas->ip1 }}" label2="IP 2" name2="ip2" default2="{{ $nas->ip2 }}" />

        <x-create.singlerow label="Port" name="port" default="{{ $nas->port }}" />

        <x-create.doublerow label1="Benutzer" name1="username" default1="{{ $nas->username }}" label2="Passwort" name2="password" default2="{{ $nas->password }}" />

    </x-create.main>

    <x-deletecard action="{{ route('nas.destroy', [$customer, $nas]) }}" />

</x-app-layout>

