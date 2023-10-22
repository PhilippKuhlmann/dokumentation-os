<x-app-layout :$customer>
    <x-create.main header="Software Lizenz bearbeiten" labelsubmit="Speichern" action="{{ route('licensesoftware.update', [$customer, $licensesoftware]) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" default="{{ $licensesoftware->name }}" />

        <x-create.singlerow label="Key" name="key" default="{{ $licensesoftware->key }}" />

        <x-create.singlerow label="Benutzername" name="username" default="{{ $licensesoftware->username }}" />

        <x-create.singlerow label="Passwort" name="password" default="{{ $licensesoftware->password }}" />

        <x-input.label value="Datei" class="mt-2" />
        <x-input.file name="file" />

        <x-create.singlerow label="Datei Name" name="file_name" />

    </x-create.main>

    @can('licensesoftware_delete')
        <x-deletecard action="{{ route('licensesoftware.destroy', [$customer, $licensesoftware]) }}" />
    @endcan

</x-app-layout>

