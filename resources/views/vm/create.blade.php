<x-app-layout :$customer>
    <x-create.main header="Neue VM" action="{{ route('vm.store', $customer) }}">

        <x-create.singlerow label="Name" name="name" />

        <x-create.doublerow label1="IP 1" name1="ip1" label2="IP 2" name2="ip2" />

        <x-create.doublerow label1="Rustdesk ID" name1="remoteID" label2="Rustdesk Passwort" name2="remotePassword" />

        <x-create.select.operatingsystem :$operatingSystems/>

        <x-create.singlerow label="Dienste Bitte mit komma getrennt angeben (eins,zwei,drei)" name="services" />

    </x-create.main>
</x-app-layout>
