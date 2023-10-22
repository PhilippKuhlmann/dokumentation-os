<x-app-layout :$customer>
    <x-create.main header="Neue Windows Lizenz" action="{{ route('licensewindows.store', $customer) }}">

        <x-create.select.operatingsystem :$operatingSystems/>

        <x-create.singlerow label="Key" name="key" />

        <x-input.label value="Datei" class="mt-2" />
        <x-input.file name="file" />

        <x-create.singlerow label="Datei Name" name="file_name" />

    </x-create.main>
</x-app-layout>
