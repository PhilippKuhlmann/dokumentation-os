<x-app-layout :$customer>
    <x-create.main header="Neue NAS" action="{{ route('nas.store', $customer) }}">

        <x-create.select name="site_id" value="Standort" :array="$sites" />

        <x-create.singlerow label="Name" name="name" />

        <x-create.doublerow label1="Hersteller" name1="manufacturer" label2="Model" name2="model" />

        <x-create.singlerow label="Seriennummer" name="serialNumber" />

        <x-create.doublerow label1="IP 1" name1="ip1" label2="IP 2" name2="ip2" />

        <x-create.singlerow label="Port" name="port" />

        <x-create.doublerow label1="Benutzer" name1="username" label2="Passwort" name2="password" />

    </x-create.main>
</x-app-layout>
