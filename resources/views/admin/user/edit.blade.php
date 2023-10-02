<x-admin-layout>
    <x-create.main header="Benutzer bearbeiten" labelsubmit="Ändern" action="{{ route('admin.user.update', $user) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" default="{{ $user->name }}" />

        <x-create.doublerow label1="Benutzername" name1="username" default1="{{ $user->username }}" label2="Passwort" name2="password" />

        <x-create.singlerow label="E-Mail" name="email" default="{{ $user->email }}" />

        <x-edit.select.role selector="{{ $user->role_id }}" :$roles/>

        <x-edit.select.customer selector="{{ $user->customer_id }}" :$customers/>

    </x-create.main>

    <x-deletecard action="{{ route('admin.user.destroy', [$user]) }}" />
</x-admin-layout>
