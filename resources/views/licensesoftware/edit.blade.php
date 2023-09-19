<x-app-layout :$customer>
    <x-create.main header="Software Lizenz bearbeiten" labelsubmit="Speichern" action="{{ route('licensesoftware.update', [$customer, $licensesoftware]) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" default="{{ $licensesoftware->name }}" />

        <x-create.singlerow label="Key" name="key" default="{{ $licensesoftware->key }}" />

        <x-create.singlerow label="Benutzername" name="username" default="{{ $licensesoftware->username }}" />

        <x-create.singlerow label="Passwort" name="password" default="{{ $licensesoftware->password }}" />

    </x-create.main>

    <x-deletecard action="{{ route('licensesoftware.destroy', [$customer, $licensesoftware]) }}" />

</x-app-layout>

