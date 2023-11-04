<x-app-layout :$customer>
    <x-create.main header="Switch bearbeiten" labelsubmit="Speichern" action="{{ route('networkswitch.update', [$customer, $networkswitch]) }}">
        @method('PATCH')

        <x-edit.select name="site_id" value="Standort" selector="{{ $networkswitch->site_id }}" :array="$sites" />

        <x-create.singlerow label="Name" name="name" default="{{ $networkswitch->name }}" />

        <x-create.singlerow label="Hersteller" name="manufacturer" default="{{ $networkswitch->manufacturer }}" />

        <x-create.doublerow label1="Modell" name1="model" default1="{{ $networkswitch->model }}" label2="Seriennummer" name2="serialNumber" default2="{{ $networkswitch->serialNumber }}" />

        <x-create.singlerow label="Benutzername" name="username" default="{{ $networkswitch->username }}" />

        <x-create.singlerow label="Passwort" name="password" default="{!! $networkswitch->password !!}" />

        <x-create.doublerow14 label1="IP" name1="ip" default1="{{ $networkswitch->ip }}" label2="Port" name2="port" default2="{{ $networkswitch->port }}" type2="number" />

    </x-create.main>

    @can('networkswitch_delete')
        <x-deletecard action="{{ route('networkswitch.destroy', [$customer, $networkswitch]) }}" />
    @endcan

</x-app-layout>
