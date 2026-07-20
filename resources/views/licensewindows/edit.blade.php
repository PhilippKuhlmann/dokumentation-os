<x-app-layout :$customer>
    <x-create.main header="Windows Lizenz bearbeiten" labelsubmit="Speichern" action="{{ route('licensewindows.update', [$customer, $licensewindows]) }}">
        @method('PATCH')

        <x-edit.select.operatingsystem selector="{{ $licensewindows->operatingSystem->id }}" :$operatingSystems/>

        <x-create.singlerow label="Key" name="key" :default="$licensewindows->key" />

        <x-input.label value="Datei" class="mt-2" />
        <x-input.file name="file" />

        <x-create.singlerow label="Datei Name" name="file_name" />

    </x-create.main>

    @can('licensewindows_delete')
        <x-deletecard action="{{ route('licensewindows.destroy', [$customer, $licensewindows]) }}" />
    @endcan

</x-app-layout>

