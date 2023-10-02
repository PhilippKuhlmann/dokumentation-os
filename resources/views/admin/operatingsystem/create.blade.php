<x-admin-layout>
    <x-create.main header="Neues Betriebsystem" action="{{ route('admin.operatingsystem.store') }}">

        <x-create.singlerow label="Name" name="name" />

    </x-create.main>
</x-admin-layout>
