<x-app-layout :$customer>
    <x-create.main header="Software Lizenz bearbeiten" labelsubmit="Speichern" action="{{ route('licensesoftware.update', [$customer, $licensesoftware]) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" default="{{ $licensesoftware->name }}" />

        <x-create.singlerow label="Key" name="key" default="{{ $licensesoftware->key }}" />

        <x-create.singlerow label="Benutzername" name="username" default="{{ $licensesoftware->username }}" />

        <x-create.singlerow label="Passwort" name="password" default="{{ $licensesoftware->password }}" />

        <x-create.doublerow
            type1="date" label1="Start Datum" name1="start_date" default1="{{ $licensesoftware->start_date }}"
            type2="date" label2="End Datum" name2="end_date" default2="{{ $licensesoftware->end_date }}"
        />

        <x-edit.radio label="Abonnement" name="abo" selector="{{ $licensesoftware->abo }}" :radios="[
            'Kein Abo' => null,
            'Jährlich' => 'Jährlich',
            'Monatlich' => 'Monatlich',
        ]" />

        <x-input.label value="Datei" class="mt-2" />
        <x-input.file name="file" />

        <x-create.singlerow label="Datei Name" name="file_name" />

    </x-create.main>

    @can('licensesoftware_delete')
        <x-deletecard action="{{ route('licensesoftware.destroy', [$customer, $licensesoftware]) }}" />
    @endcan

</x-app-layout>
