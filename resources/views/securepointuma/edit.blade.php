<x-app-layout :$customer>
    <x-create.main header="Securepoint UMA bearbeiten" labelsubmit="Ändern" action="{{ route('securepointuma.update', [$customer, $securepointuma]) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" default="{{ $securepointuma->name }}" />

        <x-create.singlerow label="Type" name="type" default="{{ $securepointuma->type }}" />

        <x-create.singlerow label="Benutzername" name="username" default="{{ $securepointuma->username }}" />

        <x-create.singlerow label="Passwort" name="password" default="{{ $securepointuma->password }}" />

        <x-create.singlerow label="Verschlüsselungscode" name="encryptionkey" default="{{ $securepointuma->encryptionkey }}" />

        <x-create.singlerow label="IP" name="ip" default="{{ $securepointuma->ip }}" />

        <x-create.singlerow label="Admin URL" name="urlAdmin" default="{{ $securepointuma->urlAdmin }}" />

        <x-create.singlerow label="User URL" name="urlUser" default="{{ $securepointuma->urlUser }}" />

    </x-create.main>

    <x-deletecard action="{{ route('securepointuma.destroy', [$customer, $securepointuma]) }}" />

</x-app-layout>
