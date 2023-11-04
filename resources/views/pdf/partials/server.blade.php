<div class="heading">
    Server
</div>

@foreach ($customer->servers as $server)
    <div class="card">
        <div class="card-title">
            {{ $server->name }}
        </div>
        <div class="card-container">

            <div class="card-table" style="float: left; width: 30%;">
                <div class="card-table-title">
                    Hardware
                </div>
                <table>
                    <tr>
                        <td class="w-120">Hersteller</td>
                        <td>{{ $server->manufacturer }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Modell</td>
                        <td>{{ $server->model }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Seriennummer</td>
                        <td>{{ $server->serialNumber }}</td>
                    </tr>
                </table>
            </div>

            <div class="card-table" style="float: left; width: 30%;">
                <div class="card-table-title">
                    Netzwerk
                </div>
                <table>
                    <tr>
                        <td class="w-120">IP-Adresse 1</td>
                        <td>{{ $server->ip1 }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">IP-Adresse 2</td>
                        <td>{{ $server->ip2 }}</td>
                    </tr>
                </table>
            </div>

            <div class="card-table" style="float: left; width: 30%;">
                <div class="card-table-title">
                    BMC
                </div>
                <table>
                    <tr>
                        <td class="w-120">BMC IP-Adresse</td>
                        <td>{{ $server->bmcIp }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">BMC Benutzer</td>
                        <td>{{ $server->bmcUser }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">BMC Passwort</td>
                        <td>{{ $server->bmcPassword }}</td>
                    </tr>
                </table>
            </div>

            <div style="clear: both;"></div>

            <div class="card-table" style="float: left; width: 50%;">
                <div class="card-table-title">
                    Dienste
                </div>
                <div class="service-container">
                    @foreach ($server->services as $key => $value)
                        {{ $value }},
                    @endforeach
                </div>
            </div>

            <div class="card-table" style="float: left; width: 50%;">
                <div class="card-table-title">
                    Betriebsystem
                </div>
                <div class="">
                    {{ $server->operatingSystem->name }}
                </div>
            </div>


            <div style="clear: both;"></div>

        </div>
    </div>

@endforeach
