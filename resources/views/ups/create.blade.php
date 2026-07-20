<x-app-layout :$customer>
    <x-create.main header="Neue USV" action="{{ route('ups.store', $customer) }}">
        <x-create.select name="site_id" value="Standort" :array="$sites" />
        <x-create.singlerow label="Name" name="name" />
        <x-create.doublerow label1="Hersteller" name1="manufacturer" label2="Model" name2="model" />
        <x-create.singlerow label="Seriennummer" name="serialNumber" />
        <x-create.singlerow label="IP-Adresse" name="ip" />
        <x-create.doublerow label1="Kapazität (VA)" name1="capacity" label2="Laufzeit" name2="runtime" />
        <x-create.singlerow label="Notizen" name="notes" />
    </x-create.main>
</x-app-layout>
