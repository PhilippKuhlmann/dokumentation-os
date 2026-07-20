<x-app-layout :$customer>
    <x-create.main header="Ansprechpartner bearbeiten" labelsubmit="Speichern" action="{{ route('contactperson.update', [$customer, $contactperson]) }}">
        @method('PATCH')

        <x-create.singlerow label="Vorname" name="first_name" :default="$contactperson->first_name" />

        <x-create.singlerow label="Nachname" name="last_name" :default="$contactperson->last_name" />

        <x-create.singlerow label="Tel." name="phone" :default="$contactperson->phone" />

        <x-create.singlerow label="E-Mail" name="mail" :default="$contactperson->mail" />

    </x-create.main>

    @can('contactperson_delete')
        <x-deletecard action="{{ route('contactperson.destroy', [$customer, $contactperson]) }}" />
    @endcan

</x-app-layout>
