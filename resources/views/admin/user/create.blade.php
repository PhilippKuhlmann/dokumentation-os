<x-admin-layout>
    <x-create.main header="Neuer Benutzer" action="{{ route('admin.user.store') }}">

        <x-create.singlerow label="Name" name="name" />

        <x-create.doublerow label1="Benutzername" name1="username" label2="Passwort" name2="password" />

        <x-create.singlerow label="E-Mail" name="email" />

        <x-create.select.role :$roles/>

        <x-create.select.customer :$customers/>

    </x-create.main>
</x-admin-layout>
