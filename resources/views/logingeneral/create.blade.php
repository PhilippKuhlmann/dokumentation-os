<x-app-layout :$customer>
    <x-create.main header="Neuer Login" action="{{ route('logingeneral.store', $customer) }}">

        <x-create.singlerow label="Name" name="name" />

        <x-create.singlerow label="Beschreibung" name="description" />

        <x-create.doublerow label1="Benutzername" name1="username" label2="Passwort" name2="password" />

    </x-create.main>
</x-app-layout>
