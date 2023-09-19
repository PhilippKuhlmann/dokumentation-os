<x-app-layout :$customer>
    <x-create.main header="Windows Lizenz bearbeiten" labelsubmit="Speichern" action="{{ route('licensewindows.update', [$customer, $licensewindows]) }}">
        @method('PATCH')

        <x-edit.select.operatingsystem selector="{{ $licensewindows->operatingSystem->id }}" :$operatingSystems/>

        <x-create.singlerow label="Key" name="key" default="{{ $licensewindows->key }}" />

    </x-create.main>

    <x-deletecard action="{{ route('licensewindows.destroy', [$customer, $licensewindows]) }}" />

</x-app-layout>

