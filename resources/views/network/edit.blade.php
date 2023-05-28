<x-app-layout :$customer>
    <x-create.main header="Netzwerk bearbeiten" labelsubmit="Ändern" action="{{ route('network.update', [$customer, $network]) }}">
        @method('PATCH')

        <x-create.singlerow label="Beschreibung" name="description" default="{{ $network->description }}" />

        <x-create.doublerow14 label1="Netzwerk" name1="network" default1="{{ $network->network }}" label2="VLAN ID" name2="vlanId" default2="1"
            type2="number" default2="{{ $network->vlanId }}"  />

        <x-create.doublerow14 label1="Subnetzmaske" name1="subnetmask" default1="255.255.255.0" default1="{{ $network->subnetmask }}" label2="CIDR"
            name2="cidr" default2="24" type2="number" default2="{{ $network->cidr }}" />

        <x-create.singlerow label="Gateway" name="gateway" default="{{ $network->gateway }}" />

        <x-create.doublerow label1="DNS 1" name1="dns1" default1="{{ $network->dns1 }}" label2="DNS 2" name2="dns2" default2="{{ $network->dns2 }}" />

        <x-create.doublerow label1="DHCP-Start" name1="dhcpStart" default1="{{ $network->dhcpStart }}" label2="DHCP-Ende" name2="dhcpEnd" default2="{{ $network->dhcpEnd }}" />

    </x-create.main>

    <x-deletecard action="{{ route('network.destroy', [$customer, $network]) }}" />

</x-app-layout>
