<x-app-layout :$customer>
    <x-create.main header="Computer bearbeiten" labelsubmit="Ändern" action="{{ route('computer.update', [$customer, $computer]) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" default="{{ $computer->name }}" />

        <x-create.doublerow label1="Hersteller" name1="manufacturer" default1="{{ $computer->manufacturer }}" label2="Model" name2="model" default2="{{ $computer->model }}" />

        <x-create.singlerow label="Seriennummer" name="serialNumber" default="{{ $computer->serialNumber }}" />

        <x-create.singlerow label="IP-Adresse" name="ip" default="{{ $computer->ip }}" />

        <x-edit.select.operatingsystem selector="{{ $computer->operatingSystem->id }}" :$operatingSystems/>

    </x-create.main>

    <x-deletecard action="{{ route('computer.destroy', [$customer, $computer]) }}" />

</x-app-layout>
