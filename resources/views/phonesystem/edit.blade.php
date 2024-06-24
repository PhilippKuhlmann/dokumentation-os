<x-app-layout :$customer>
    <x-create.main header="TK-Anlage bearbeiten" labelsubmit="Speichern" action="{{ route('phonesystem.update', [$customer, $phonesystem]) }}">
        @method('PATCH')

        <x-edit.select name="site_id" value="Standort" selector="{{ $phonesystem->site_id }}" :array="$sites" />

        <x-create.doublerow label1="Hersteller" name1="manufacturer" default1="{{ $phonesystem->manufacturer }}" label2="Model" name2="model" default2="{{ $phonesystem->model }}" />

        <x-create.singlerow label="Seriennummer" name="serialNumber" default="{{ $phonesystem->serialNumber }}" />

        <x-create.doublerow label1="IP 1" name1="ip1" default1="{{ $phonesystem->ip1 }}" label2="Port" name2="port" type2="number" default2="{{ $phonesystem->port }}" />

        <x-create.doublerow label1="IP 2" name1="ip2" default1="{{ $phonesystem->ip2 }}" label2="IP 3" name2="ip3" default2="{{ $phonesystem->ip3 }}" />

        <x-create.doublerow label1="Benutzername" name1="username" default1="{{ $phonesystem->username }}" label2="Passwort" name2="password" default2="{!! $phonesystem->password !!}" />

    </x-create.main>

    @can('phonesystem_delete')
        <x-deletecard action="{{ route('phonesystem.destroy', [$customer, $phonesystem]) }}" />
    @endcan

</x-app-layout>
