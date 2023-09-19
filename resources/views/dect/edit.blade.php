<x-app-layout :$customer>
    <x-create.main header="DECT bearbeiten" labelsubmit="Speichern" action="{{ route('dect.update', [$customer, $dect]) }}">
        @method('PATCH')

        <x-edit.select name="site_id" value="Standort" selector="{{ $dect->site_id }}" :array="$sites" />

        <x-create.singlerow label="Rolle" name="role" default="{{ $dect->role }}" />

        <x-create.doublerow label1="Hersteller" name1="manufacturer" default1="{{ $dect->manufacturer }}" label2="Model" name2="model" default2="{{ $dect->model }}" />

        <x-create.singlerow label="Seriennummer" name="serialNumber" default="{{ $dect->serialNumber }}" />

        <x-create.doublerow label1="IP" name1="ip" default1="{{ $dect->ip }}" label2="Port" name2="port" type2="number" default2="{{ $dect->port }}" />

        <x-create.singlerow label="MAC-Adresse" name="mac" default="{{ $dect->mac }}" />

        <x-create.doublerow label1="Benutzername" name1="username" default1="{{ $dect->username }}" label2="Passwort" name2="password" default2="{!! $dect->password !!}" />

    </x-create.main>

    <x-deletecard action="{{ route('dect.destroy', [$customer, $dect]) }}" />

</x-app-layout>
