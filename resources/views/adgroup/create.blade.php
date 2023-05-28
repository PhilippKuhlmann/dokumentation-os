<x-app-layout :$customer>
    <x-create.main header="Neue AD-Gruppe" action="{{ route('adgroup.store', $customer) }}">

        <x-create.singlerow label="Name" name="name" />

        <x-create.singlerow label="Beschreibung" name="description" />

    </x-create.main>
</x-app-layout>
