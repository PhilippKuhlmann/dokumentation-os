<x-app-layout :$customer>
    <x-create.main header="Neues Telefon" action="{{ route('phone.store', $customer) }}">

        <x-create.singlerow label="Nebenstelle" name="extension" />

        <x-create.doublerow label1="Hersteller" name1="manufacturer" label2="Model" name2="model" />

        <x-create.singlerow label="Seriennummer" name="serialNumber" />

        <x-create.doublerow label1="IP" name1="ip" label2="Port" name2="port" type2="number" />

        <x-create.singlerow label="MAC-Adresse" name="mac" />

        <x-create.doublerow label1="Benutzername" name1="username" label2="Passwort" name2="password" />

    </x-create.main>
</x-app-layout>
