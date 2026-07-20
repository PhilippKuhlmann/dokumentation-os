<x-app-layout :$customer>
    <x-create.main header="Neues Zertifikat" action="{{ route('certificate.store', $customer) }}">
        <x-create.singlerow label="Bezeichnung" name="name" />
        <x-create.doublerow label1="Domain / CN" name1="common_name" label2="Aussteller" name2="issuer" />
        <x-create.doublerow label1="Typ" name1="type" label2="Ablaufdatum" name2="expiry_date" type2="date" />
        <x-create.singlerow label="Ausgestellt am" name="issued_date" type="date" />
        <x-create.singlerow label="Notizen" name="notes" />
    </x-create.main>
</x-app-layout>
