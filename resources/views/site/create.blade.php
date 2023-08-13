<x-app-layout :$customer>
    <x-create.main header="Neuer Standort" action="{{ route('site.store', $customer) }}">

            <x-create.singlerow label="Name" name="name" />

            <x-create.doublerow14 label1="Straße" name1="street" label2="Hausnummer" name2="house_number" />

            <x-create.doublerow label1="PLZ" name1="zip" label2="Stadt" name2="city" />

    </x-create.main>
</x-app-layout>
