<x-app-layout :$customer>
    <x-create.main header="Neuer Accesspoint" action="{{ route('accesspoint.store', $customer) }}">

        <x-create.select name="site_id" value="Standort" :array="$sites" />

        <x-create.singlerow label="Name" name="name" />

        <x-create.singlerow label="Hersteller" name="manufacturer" />

        <x-create.doublerow label1="Modell" name1="model" label2="Seriennummer" name2="serialNumber" />

        <x-create.singlerow label="Benutzername" name="username" />

        <x-create.singlerow label="Passwort" name="password" />

        <x-create.doublerow14 label1="IP" name1="ip" label2="Port" name2="port" type2="number" />

    </x-create.main>
</x-app-layout>
