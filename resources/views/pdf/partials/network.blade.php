<div class="heading">
    VLAN
</div>

@foreach ($customer->networks as $network)
    <div class="card">
        <div class="card-title">
            {{ $network->vlanId }} - {{ $network->description }}
        </div>
        <div class="card-container">

            <div class="card-table" style="float: left; width: 30%;">
                <div class="card-table-title">
                    Netzwerk
                </div>
                <table>
                    <tr>
                        <td class="w-120">Netzwerk</td>
                        <td>{{ $network->network }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Subnetzmaske</td>
                        <td>{{ $network->subnetmask }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">CIDR</td>
                        <td>{{ $network->cidr }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Gateway</td>
                        <td>{{ $network->gateway }}</td>
                    </tr>
                </table>
            </div>

            <div class="card-table" style="float: left; width: 30%;">
                <div class="card-table-title">
                    DHCP
                </div>
                <table>
                    <tr>
                        <td class="w-120">Start</td>
                        <td>{{ $network->dhcpStart }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Ende</td>
                        <td>{{ $network->dhcpEnd }}</td>
                    </tr>
                </table>
            </div>

            <div class="card-table" style="float: left; width: 30%;">
                <div class="card-table-title">
                    DNS
                </div>
                <table>
                    <tr>
                        <td class="w-120">DNS 1</td>
                        <td>{{ $network->dns1 }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">DNS 2</td>
                        <td>{{ $network->dns2 }}</td>
                    </tr>
                </table>
            </div>

            <div style="clear: both;"></div>

        </div>
    </div>

@endforeach
