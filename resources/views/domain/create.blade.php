<x-app-layout :$customer>
    <x-create.main header="Neue Domain" action="{{ route('domain.store', $customer) }}">
        <x-create.singlerow label="Domain" name="name" />
        <x-create.doublerow label1="Registrar" name1="registrar" label2="Ablaufdatum" name2="expiry_date" type2="date" />
        <x-create.doublerow label1="Nameserver 1" name1="nameserver1" label2="Nameserver 2" name2="nameserver2" />
        <x-create.singlerow label="Notizen" name="notes" />
    </x-create.main>
</x-app-layout>
