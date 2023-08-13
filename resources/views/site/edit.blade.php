<x-app-layout :$customer>
    <x-create.main header="Standort bearbeiten" labelsubmit="Speichern"
        action="{{ route('site.update', [$customer, $site]) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" default="{{ $site->name }}" />

        <x-create.doublerow14 label1="Straße" name1="street" default1="{{ $site->street }}" label2="Hausnummer" name2="house_number" default2="{{ $site->house_number }}" />

        <x-create.doublerow label1="PLZ" name1="zip" default1="{{ $site->zip }}" label2="Stadt" name2="city" default2="{{ $site->city }}" />

    </x-create.main>

    <x-deletecard action="{{ route('site.destroy', [$customer, $site]) }}" />

</x-app-layout>
