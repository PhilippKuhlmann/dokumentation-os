<x-app-layout :$customer>
    <x-create.main header="Securepoint UTM bearbeiten" labelsubmit="Speichern" action="{{ route('securepointutm.update', [$customer, $securepointutm]) }}">
        @method('PATCH')

        <x-edit.select name="site_id" value="Standort" selector="{{ $securepointutm->site_id }}" :array="$sites" />

        <x-create.singlerow label="Name" name="name" default="{{ $securepointutm->name }}" />

        <x-create.doublerow label1="Type" name1="type" default1="{{ $securepointutm->type }}" label2="Seriennummer" name2="serialNumber" default2="{{ $securepointutm->serialNumber }}" />

        <x-create.singlerow label="Benutzername" name="username" default="{{ $securepointutm->username }}" />

        <x-create.singlerow label="Passwort" name="password" default="{!! $securepointutm->password !!}" />

        <x-create.singlerow label="Cloud Backup Passwort" name="cloudBackupPassword" default="{!! $securepointutm->cloudBackupPassword !!}" />

        <x-create.singlerow label="USC-PIN" name="uscpin" default="{!! $securepointutm->uscpin !!}" />

        <x-create.singlerow label="IP" name="ip" default="{{ $securepointutm->ip }}" />

        <x-create.singlerow label="Admin URL" name="urlAdmin" default="{{ $securepointutm->urlAdmin }}" />

        <x-create.singlerow label="User URL" name="urlUser" default="{{ $securepointutm->urlUser }}" />

        <x-create.singlerow label="Externe URL" name="urlExternal" default="{{ $securepointutm->urlExternal }}" />

    </x-create.main>

    <x-deletecard action="{{ route('securepointutm.destroy', [$customer, $securepointutm]) }}" />

</x-app-layout>
