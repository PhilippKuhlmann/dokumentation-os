<x-app-layout :$customer>
    <x-create.main header="Neue Zugriffs Lizenz" action="{{ route('licenseaccess.store', $customer) }}">

        <x-create.singlerow label="Name" name="name" />

        <x-create.singlerow label="Key" name="key" />

        <x-input.label value="Datei" class="mt-2" />
        <x-input.file name="file" />

        <x-create.singlerow label="Datei Name" name="file_name" />

    </x-create.main>
</x-app-layout>
