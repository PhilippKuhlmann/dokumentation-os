<x-app-layout :$customer>
    <x-create.main header="Neue Zugriffs Lizenz" action="{{ route('licenseaccess.store', $customer) }}">

        <x-create.singlerow label="Name" name="name" />

        <x-create.singlerow label="Key" name="key" />

    </x-create.main>
</x-app-layout>
