<x-admin-layout>
    <x-create.main header="Kunde bearbeiten" labelsubmit="Ändern" action="{{ route('admin.customer.update', $customer) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" default="{{ $customer->name }}" />

        <x-create.singlerow label="Kundenummer" name="customer_number" default="{{ $customer->customer_number }}" />

    </x-create.main>
</x-admin-layout>
