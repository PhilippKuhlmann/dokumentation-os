<x-app-layout :$customer>
    <x-create.main header="FTP-Server Benutzer bearbeiten" labelsubmit="Ändern" action="{{ route('ftpserver.update', [$customer, $ftpserver]) }}">
        @method('PATCH')

        <x-create.singlerow label="Host" name="host" default="{{ $ftpserver->host }}" />

        <x-create.singlerow label="Benutzername" name="username" default="{{ $ftpserver->username }}" />

        <x-create.singlerow label="Passwort" name="password" default="{!! $ftpserver->password !!}" />

        <x-create.singlerow label="Beschreibung" name="description" default="{{ $ftpserver->description }}" />

    </x-create.main>

    <x-deletecard action="{{ route('ftpserver.destroy', [$customer, $ftpserver]) }}" />

</x-app-layout>
