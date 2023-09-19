<x-app-layout :$customer>
    <x-create.main header="Neue Windows Lizenz" action="{{ route('licensewindows.store', $customer) }}">

        <x-create.select.operatingsystem :$operatingSystems/>

        <x-create.singlerow label="Key" name="key" />

    </x-create.main>
</x-app-layout>
