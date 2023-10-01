<x-admin-layout>
    <x-create.main header="Neuer Kunde" action="{{ route('admin.customer.store') }}">

        <x-create.singlerow label="Name" name="name" />

        <x-create.singlerow label="Kundenummer" name="customer_number" />

    </x-create.main>
</x-admin-layout>
