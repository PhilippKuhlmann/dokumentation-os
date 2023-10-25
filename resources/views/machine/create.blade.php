<x-app-layout :$customer>
    <x-create.main header="Neue Maschine" action="{{ route('machine.store', $customer) }}">

        <x-create.select name="site_id" value="Standort" :array="$sites" />

        <x-create.singlerow label="Name" name="name" />

        <x-create.singlerow label="IP" name="ip" />

    </x-create.main>
</x-app-layout>
