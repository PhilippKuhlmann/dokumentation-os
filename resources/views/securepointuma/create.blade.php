<x-app-layout :$customer>
    <x-create.main header="Neue Securepoint UMA" action="{{ route('securepointuma.store', $customer) }}">

        <x-create.singlerow label="Name" name="name" />

        <x-create.singlerow label="Type" name="type"  />

        <x-create.singlerow label="Benutzername" name="username" />

        <x-create.singlerow label="Passwort" name="password" />

        <x-create.singlerow label="Verschlüsselungscode" name="encryptionkey" />

        <x-create.singlerow label="IP" name="ip" />

        <x-create.singlerow label="Admin URL" name="urlAdmin" />

        <x-create.singlerow label="User URL" name="urlUser" />

    </x-create.main>
</x-app-layout>
