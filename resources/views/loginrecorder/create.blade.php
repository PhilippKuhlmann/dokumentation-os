<x-app-layout :$customer>
    <x-create.main header="Neuer Login für Recoder" action="{{ route('loginrecorder.store', $customer) }}">

        <x-create.select.recorder :$recorders/>

        <x-create.singlerow label="Benutzername" name="username" />

        <x-create.singlerow label="Passwort" name="password" />

        <x-create.hidden />

    </x-create.main>
</x-app-layout>
