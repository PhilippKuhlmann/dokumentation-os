<x-app-layout :$customer>
    <x-create.main header="Neuer Server" action="{{ route('server.store', $customer) }}">

        <x-create.singlerow label="Name" name="name" />

        <x-create.doublerow label1="Hersteller" name1="manufacturer" label2="Model" name2="model" />

        <x-create.singlerow label="Seriennummer" name="serialNumber" />

        <x-create.doublerow label1="IP 1" name1="ip1" label2="IP 2" name2="ip2" />

        <x-create.singlerow label="BMC IP" name="bmcIp" />

        <x-create.doublerow label1="BMC User" name1="bmcUser" label2="BMC Passwort" name2="bmcPassword" />

        <x-create.select.operatingsystem :$operatingSystems/>

        <x-create.singlerow label="Dienste Bitte mit komma getrennt angeben (eins,zwei,drei)" name="services" />

    </x-create.main>
</x-app-layout>
