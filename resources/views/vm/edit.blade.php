<x-app-layout :$customer>
    <x-create.main header="VM bearbeiten" labelsubmit="Speichern" action="{{ route('vm.update', [$customer, $vm]) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" default="{{ $vm->name }}" />

        <x-create.doublerow label1="IP 1" name1="ip1" default1="{{ $vm->ip1 }}" label2="IP 2" name2="ip2" default2="{{ $vm->ip2 }}" />

        <x-create.doublerow label1="Rustdesk ID" name1="remoteID" default1="{{ $vm->remoteID }}" label2="Rustdesk Passwort" name2="remotePassword" default2="{!! $vm->remotePassword !!}" />

        <x-edit.select.operatingsystem selector="{{ $vm->operatingSystem->id }}" :$operatingSystems/>

        <x-create.singlerow label="Dienste Bitte mit komma getrennt angeben (eins,zwei,drei)" name="services" default="{{ implode(',', $vm->services) }}" />

    </x-create.main>

    <x-deletecard action="{{ route('vm.destroy', [$customer, $vm]) }}" />

</x-app-layout>

