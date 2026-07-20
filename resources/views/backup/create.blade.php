<x-app-layout :$customer>
    <x-create.main header="Neues Backup" action="{{ route('backup.store', $customer) }}">
        <x-create.singlerow label="Name" name="name" />
        <x-create.doublerow label1="Software" name1="software" label2="Zeitplan" name2="schedule" />
        <x-create.doublerow label1="Quelle" name1="source" label2="Ziel" name2="destination" />
        <x-create.doublerow label1="Aufbewahrung" name1="retention" label2="Letzter Erfolg" name2="last_success" type2="date" />
        <x-create.singlerow label="Passwort" name="password" />
        <x-create.singlerow label="Notizen" name="notes" />
    </x-create.main>
</x-app-layout>
