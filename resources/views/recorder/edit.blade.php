<x-app-layout :$customer>
    <x-create.main header="Recorder bearbeiten" labelsubmit="Speichern" action="{{ route('recorder.update', [$customer, $recorder]) }}">
        @method('PATCH')

        <x-edit.select name="site_id" value="Standort" selector="{{ $recorder->site_id }}" :array="$sites" />

        <x-create.singlerow label="Name" name="name" default="{{ $recorder->name }}" />

        <x-create.doublerow label1="Hersteller" name1="manufacturer" default1="{{ $recorder->manufacturer }}" label2="Model" name2="model" default2="{{ $recorder->model }}" />

        <x-create.singlerow label="Seriennummer" name="serialNumber" default="{{ $recorder->serialNumber }}" />

        <x-create.doublerow14 label1="IP" name1="ip" default1="{{ $recorder->ip }}" label2="Port" name2="port" type2="number" default2="{{ $recorder->port }}" />

        <x-create.doublerow label1="Benutzer" name1="username" default1="{{ $recorder->username }}" label2="Passwort" name2="password" default2="{{ $recorder->password }}" />

    </x-create.main>

    @can('recorder_delete')
        <x-deletecard action="{{ route('recorder.destroy', [$customer, $recorder]) }}" />
    @endcan

</x-app-layout>
