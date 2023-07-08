<x-app-layout :$customer>
    <x-create.main header="Drucker bearbeiten" labelsubmit="Speichern" action="{{ route('printer.update', [$customer, $printer]) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" default="{{ $printer->name }}" />

        <x-create.doublerow label1="Hersteller" name1="manufacturer" default1="{{ $printer->manufacturer }}" label2="Model" name2="model" default2="{{ $printer->model }}" />

        <x-create.singlerow label="Seriennummer" name="serialNumber" default="{{ $printer->serialNumber }}" />

        <x-create.singlerow label="IP-Adresse" name="ip" default="{{ $printer->ip }}" />

        <x-create.doublerow label1="Benutzer" name1="username" default1="{{ $printer->username }}" label2="Passwort" name2="password" default2="{!! $printer->password !!}" />

    </x-create.main>

    <x-deletecard action="{{ route('printer.destroy', [$customer, $printer]) }}" />

</x-app-layout>
