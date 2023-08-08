<x-app-layout :$customer>
    <x-create.main header="Standort bearbeiten" labelsubmit="Speichern"
        action="{{ route('site.update', [$customer, $site]) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" default="{{ $site->name }}" />

    </x-create.main>

    <x-deletecard action="{{ route('site.destroy', [$customer, $site]) }}" />

</x-app-layout>
