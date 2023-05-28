<x-app-layout :$customer>
    <x-create.main header="Neuer AD-Benutzer" action="{{ route('aduser.store', $customer) }}">

        <x-create.singlerow label="Vorname" name="firstName" />

        <x-create.singlerow label="Nachname" name="lastName" />

        <x-create.singlerow label="Benutzername" name="username" />

        <x-create.singlerow label="Passwort" name="password" />

    </x-create.main>
</x-app-layout>
