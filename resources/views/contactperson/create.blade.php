<x-app-layout :$customer>
    <x-create.main header="Neuer Ansprechpartner" action="{{ route('contactperson.store', $customer) }}">

            <x-create.singlerow label="Vorname" name="first_name" />

            <x-create.singlerow label="Nachname" name="last_name" />

            <x-create.singlerow label="Telefonnummer" name="phone" />

            <x-create.singlerow label="E-Mail" name="mail" />


    </x-create.main>
</x-app-layout>
