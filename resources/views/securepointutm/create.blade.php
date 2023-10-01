<x-app-layout :$customer>
    <x-create.main header="Neue Securepoint UTM" action="{{ route('securepointutm.store', $customer) }}">

        <x-create.select name="site_id" value="Standort" :array="$sites" />

        <x-create.singlerow label="Name" name="name" />

        <x-create.doublerow label1="Type" name1="type" label2="Seriennummer" name2="serialNumber" />

        <x-create.singlerow label="Benutzername" name="username" />

        <x-create.singlerow label="Passwort" name="password" />

        <x-create.singlerow label="Cloud Backup Passwort" name="cloudBackupPassword" />

        <x-create.singlerow label="USC-PIN" name="uscpin" />

        <x-create.singlerow label="IP" name="ip" />

        <x-create.singlerow label="Admin URL" name="urlAdmin" />

        <x-create.singlerow label="User URL" name="urlUser" />

        <x-create.singlerow label="Externe URL" name="urlExternal" />

    </x-create.main>
</x-app-layout>
