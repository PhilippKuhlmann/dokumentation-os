<x-app-layout :$customer>
    <x-create.main header="Neuer DynDNS" action="{{ route('dyndns.store', $customer) }}">

        <x-create.singlerow label="Anbieter" name="providor" />

        <x-create.singlerow label="Host" name="host" />

        <x-create.singlerow label="Benutzername" name="username" />

        <x-create.singlerow label="Passwort" name="password" />

    </x-create.main>
</x-app-layout>
