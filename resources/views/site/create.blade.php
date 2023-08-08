<x-app-layout :$customer>
    <x-create.main header="Neuer Standort" action="{{ route('site.store', $customer) }}">

            <x-create.singlerow label="Name" name="name" />

    </x-create.main>
</x-app-layout>
