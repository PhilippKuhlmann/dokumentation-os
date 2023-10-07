<x-app-layout :$customer>
    <x-create.main header="AD-Gruppe bearbeiten" labelsubmit="Ändern" action="{{ route('adgroup.update', [$customer, $adgroup]) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" default="{{ $adgroup->name }}" />

        <x-create.singlerow label="Beschreibung" name="description" default="{{ $adgroup->description }}" />

    </x-create.main>

    @can('adgroup_delete')
        <x-deletecard action="{{ route('adgroup.destroy', [$customer, $adgroup]) }}" />
    @endcan

</x-app-layout>
