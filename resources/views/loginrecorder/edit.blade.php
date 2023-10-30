<x-app-layout :$customer>
    <x-create.main header="Login für Recorder bearbeiten" labelsubmit="Speichern" action="{{ route('loginrecorder.update', [$customer, $loginrecorder]) }}">
        @method('PATCH')

        <x-edit.select.recorder selector="{{ $loginrecorder->recorder->id }}" :$recorder/>

        <x-create.doublerow label1="Benutzer" name1="username" default1="{{ $loginrecorder->username }}" label2="Passwort" name2="password" default2="{{ $loginrecorder->password }}" />

        <x-create.singlerow label="Beschreibung" name="description" default="{{ $loginrecorder->description }}" />

        <x-edit.hidden hidden="{{ $loginrecorder->hidden }}" />

    </x-create.main>

    @can('loginrecorder_delete')
        <x-deletecard action="{{ route('loginrecorder.destroy', [$customer, $loginrecorder]) }}" />
    @endcan

</x-app-layout>

