<x-app-layout :$customer>
    <x-create.main header="Neue Software Lizenz" action="{{ route('licensesoftware.store', $customer) }}">

        <x-create.singlerow label="Name" name="name" />

        <x-create.singlerow label="Key" name="key" />

        <x-create.singlerow label="Benutzername" name="username" />

        <x-create.singlerow label="Passwort" name="password" />

        <x-create.doublerow type1="date" label1="Start Datum" name1="start_date" type2="date" label2="End Datum" name2="end_date" />

        <x-create.radio label="Abonnement" name="abo" :radios="[
            'Kein Abo' => null,
            'Jährlich' => 'Jährlich',
            'Monatlich' => 'Monatlich',
        ]" />

        <x-input.label value="Datei" class="mt-2" />
        <x-input.file name="file" />

        <x-create.singlerow label="Datei Name" name="file_name" />

    </x-create.main>
</x-app-layout>
