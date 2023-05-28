<x-app-layout :$customer>
    <x-create.main header="Webseite bearbeiten" labelsubmit="Ändern" action="{{ route('loginwebsite.update', [$customer, $loginwebsite]) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" default="{{ $loginwebsite->name }}" />

        <x-create.singlerow label="URL" name="url" default="{{ $loginwebsite->url }}" />

        <x-create.doublerow label1="Benutzername" name1="username" default1="{{ $loginwebsite->username }}" label2="Passwort" name2="password" default2="{{ $loginwebsite->password }}" />

    </x-create.main>

    <x-deletecard action="{{ route('loginwebsite.destroy', [$customer, $loginwebsite]) }}" />

</x-app-layout>
