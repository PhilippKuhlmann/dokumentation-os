<x-app-layout :$customer>
    <x-create.main header="Neue Software Lizenz" action="{{ route('licensesoftware.store', $customer) }}">

        <x-create.singlerow label="Name" name="name" />

        <x-create.singlerow label="Key" name="key" />

        <x-create.singlerow label="Benutzername" name="username" />

        <x-create.singlerow label="Passwort" name="password" />

    </x-create.main>
</x-app-layout>
