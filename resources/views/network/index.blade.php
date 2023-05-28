<x-app-layout :$customer>

    <x-sitetopmenu>
        <x-input.linkbutton label="Neu" link="/{{ Request::path() }}/create" />
    </x-sitetopmenu>

    @foreach ($networks as $network)
        <x-card>
            <x-slot:head>
                <x-show.header editUrl="/{{ Request::path() }}/{{ $network->id }}/edit">
                    VLAN {{ $network->vlanId }} - {{ $network->description }}
                </x-show.header>
            </x-slot>

            <x-slot:body>

                <x-minitablecard title="Netzwerk" :array="[
                    'Netzwerk' => $network->network,
                    'Subnetzmakske' => $network->subnetmask,
                    'CIDR' => $network->cidr,
                    'Gateway' => $network->gateway,
                ]" />

                <x-minitablecard title="DHCP" :array="[
                    'Start' => $network->dhcpStart,
                    'Ende' => $network->dhcpEnd,
                ]" />

                <x-minitablecard title="DNS" :array="[
                    'DNS 1' => $network->dns1,
                    'DNS 2' => $network->dns2,
                ]" />

            </x-slot>
        </x-card>
    @endforeach

</x-app-layout>
