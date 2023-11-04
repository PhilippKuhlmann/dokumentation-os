<x-app-layout :$customer>
    <x-create.main header="Accesspoint bearbeiten" labelsubmit="Speichern" action="{{ route('accesspoint.update', [$customer, $accesspoint]) }}">
        @method('PATCH')

        <x-edit.select name="site_id" value="Standort" selector="{{ $accesspoint->site_id }}" :array="$sites" />

        <x-create.singlerow label="Name" name="name" default="{{ $accesspoint->name }}" />

        <x-create.singlerow label="Hersteller" name="manufacturer" default="{{ $accesspoint->manufacturer }}" />

        <x-create.doublerow label1="Modell" name1="model" default1="{{ $accesspoint->model }}" label2="Seriennummer" name2="serialNumber" default2="{{ $accesspoint->serialNumber }}" />

        <x-create.singlerow label="Benutzername" name="username" default="{{ $accesspoint->username }}" />

        <x-create.singlerow label="Passwort" name="password" default="{!! $accesspoint->password !!}" />

        <x-create.doublerow14 label1="IP" name1="ip" default1="{{ $accesspoint->ip }}" label2="Port" name2="port" default2="{{ $accesspoint->port }}" type2="number" />

    </x-create.main>

    @can('accesspoint_delete')
        <x-deletecard action="{{ route('accesspoint.destroy', [$customer, $accesspoint]) }}" />
    @endcan

</x-app-layout>
