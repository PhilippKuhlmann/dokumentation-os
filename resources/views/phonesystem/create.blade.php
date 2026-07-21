<x-app-layout :$customer>
    <x-create.main header="Neue Telefonanlage" action="{{ route('phonesystem.store', $customer) }}">

        <x-create.select name="site_id" value="Standort" :array="$sites" />

        <x-create.doublerow label1="Hersteller" name1="manufacturer" label2="Model" name2="model" />

        <x-create.singlerow label="Seriennummer" name="serialNumber" />

        <x-create.doublerow label1="IP 1" name1="ip1" label2="Port" name2="port" type2="number" />

        <x-create.doublerow label1="Benutzername" name1="username" label2="Passwort" name2="password" />

    </x-create.main>
</x-app-layout>
