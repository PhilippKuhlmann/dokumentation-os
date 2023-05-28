<x-app-layout :$customer>
    <x-create.main header="Neues Netzwerk" action="{{ route('network.store', $customer) }}">

        <x-create.singlerow label="Beschreibung" name="description" />

        <x-create.doublerow14 label1="Netzwerk" name1="network" label2="VLAN ID" name2="vlanId" default2="1"
            type2="number" />

        <x-create.doublerow14 label1="Subnetzmaske" name1="subnetmask" default1="255.255.255.0" label2="CIDR"
            name2="cidr" default2="24" type2="number" />

        <x-create.singlerow label="Gateway" name="gateway" />

        <x-create.doublerow label1="DNS 1" name1="dns1" label2="DNS 2" name2="dns2" />

        <x-create.doublerow label1="DHCP-Start" name1="dhcpStart" label2="DHCP-Ende" name2="dhcpEnd" />

    </x-create.main>
</x-app-layout>
