<x-app-layout :$customer>
    <x-create.main header="Neue AD-Domäne" action="{{ route('addomain.store', $customer) }}">

        <x-create.singlerow label="Domäne" name="domain" />

        <x-create.singlerow label="NETBIOS" name="netbios" />

        <x-create.singlerow label="DSRM Passwort" name="dsrmpassword" />

    </x-create.main>
</x-app-layout>
