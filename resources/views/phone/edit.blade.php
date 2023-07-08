<x-app-layout :$customer>
    <x-create.main header="Telefon bearbeiten" labelsubmit="Speichern" action="{{ route('phone.update', [$customer, $phone]) }}">
        @method('PATCH')

        <x-create.singlerow label="Nebenstelle" name="extension" default="{{ $phone->extension }}" />

        <x-create.doublerow label1="Hersteller" name1="manufacturer" default1="{{ $phone->manufacturer }}" label2="Model" name2="model" default2="{{ $phone->model }}" />

        <x-create.singlerow label="Seriennummer" name="serialNumber" default="{{ $phone->serialNumber }}" />

        <x-create.doublerow label1="IP" name1="ip" default1="{{ $phone->ip }}" label2="Port" name2="port" type2="number" default2="{{ $phone->port }}" />

        <x-create.singlerow label="MAC-Adresse" name="mac" default="{{ $phone->mac }}" />

        <x-create.doublerow label1="Benutzername" name1="username" default1="{{ $phone->username }}" label2="Passwort" name2="password" default2="{!! $phone->password !!}" />

    </x-create.main>

    <x-deletecard action="{{ route('phone.destroy', [$customer, $phone]) }}" />

</x-app-layout>
