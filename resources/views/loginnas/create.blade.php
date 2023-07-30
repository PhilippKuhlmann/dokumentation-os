<x-app-layout :$customer>
    <x-create.main header="Neuer Login für NAS" action="{{ route('loginnas.store', $customer) }}">

        <x-create.select.nas :$nas/>

        <x-create.doublerow label1="Benutzer" name1="username" label2="Passwort" name2="password" />

        <x-create.singlerow label="Beschreibung" name="description" />

    </x-create.main>
</x-app-layout>
