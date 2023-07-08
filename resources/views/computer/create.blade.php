<x-app-layout :$customer>
    <x-create.main header="Neuer Computer" action="{{ route('computer.store', $customer) }}">

        <x-create.singlerow label="Name" name="name" />

        <x-create.doublerow label1="Hersteller" name1="manufacturer" label2="Model" name2="model" />

        <x-create.singlerow label="Seriennummer" name="serialNumber" />

        <x-create.singlerow label="IP-Adresse" name="ip" />

        <x-create.doublerow label1="Rustdesk ID" name1="remoteID" label2="Rustdesk Passwort" name2="remotePassword" />

        <x-create.select.operatingsystem :$operatingSystems/>

    </x-create.main>
</x-app-layout>
