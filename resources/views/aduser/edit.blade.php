<x-app-layout :$customer>
    <x-create.main header="AD-Benutzer bearbeiten" labelsubmit="Ändern" action="{{ route('aduser.update', [$customer, $aduser]) }}">
        @method('PATCH')

        <x-create.singlerow label="Vorname" name="firstName" default="{{ $aduser->firstName }}" />

        <x-create.singlerow label="Nachname" name="lastName" default="{{ $aduser->lastName }}" />

        <x-create.singlerow label="Benutzername" name="username" default="{{ $aduser->username }}" />

        <x-create.singlerow label="Passwort" name="password" default="{!! $aduser->password !!}" />

    </x-create.main>

    @can('aduser_delete')
        <x-deletecard action="{{ route('aduser.destroy', [$customer, $aduser]) }}" />
    @endcan

</x-app-layout>
