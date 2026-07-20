<x-admin-layout>
    <x-create.main header="Betriebsystem bearbeiten" labelsubmit="Speichern" action="{{ route('admin.operatingsystem.update', $operatingSystem) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" :default="$operatingSystem->name" />

    </x-create.main>
</x-admin-layout>
