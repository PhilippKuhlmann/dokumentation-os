<x-app-layout :$customer>
    <x-create.main header="Zugriffs Lizenz bearbeiten" labelsubmit="Speichern" action="{{ route('licenseaccess.update', [$customer, $licenseaccess]) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" :default="$licenseaccess->name" />

        <x-create.singlerow label="Key" name="key" :default="$licenseaccess->key" />

        <x-input.label value="Datei" class="mt-2" />
        <x-input.file name="file" />

        <x-create.singlerow label="Datei Name" name="file_name" />

    </x-create.main>

    @can('licenseaccess_delete')
        <x-deletecard action="{{ route('licenseaccess.destroy', [$customer, $licenseaccess]) }}" />
    @endcan

</x-app-layout>

