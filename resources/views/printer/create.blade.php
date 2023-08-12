<x-app-layout :$customer>
    <x-create.main header="Neuer Drucker" action="{{ route('printer.store', $customer) }}">

        <x-create.select name="site_id" value="Standort" :array="$sites" />

        <x-create.singlerow label="Name" name="name" />

        <x-create.doublerow label1="Hersteller" name1="manufacturer" label2="Model" name2="model" />

        <x-create.singlerow label="Seriennummer" name="serialNumber" />

        <x-create.singlerow label="IP-Adresse" name="ip" />

        <x-create.doublerow label1="Benutzer" name1="username" label2="Passwort" name2="password" />

    </x-create.main>
</x-app-layout>
