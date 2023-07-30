<x-app-layout :$customer>
    <x-create.main header="Neuer FTP-Server User" action="{{ route('ftpserver.store', $customer) }}">

        <x-create.singlerow label="Host" name="host" />

        <x-create.singlerow label="Benutzername" name="username" />

        <x-create.singlerow label="Passwort" name="password" />

        <x-create.singlerow label="Beschreibung" name="description" />

    </x-create.main>
</x-app-layout>
