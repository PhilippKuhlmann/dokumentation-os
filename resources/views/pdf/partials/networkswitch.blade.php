<div class="heading">
    Switch
</div>

@foreach ($customer->networkswitches as $networkswitch)
    <div class="card">
        <div class="card-title">
            {{ $networkswitch->name }}
        </div>
        <div class="card-container">

            <div class="card-table" style="float: left; width: 30%;">
                <div class="card-table-title">
                    Allgemein
                </div>
                <table>
                    <tr>
                        <td class="w-120">Hersteller</td>
                        <td>{{ $networkswitch->manufacturer }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Modell</td>
                        <td>{{ $networkswitch->model }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Seriennummer</td>
                        <td>{{ $networkswitch->serialNumber }}</td>
                    </tr>
                </table>
            </div>

            <div class="card-table" style="float: left; width: 30%;">
                <div class="card-table-title">
                    Login
                </div>
                <table>
                    <tr>
                        <td class="w-120">Benutzername</td>
                        <td>{{ $networkswitch->username }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Passwort</td>
                        <td>{{ $networkswitch->password }}</td>
                    </tr>
                </table>
            </div>


            <div class="card-table" style="float: left; width: 30%;">
                <div class="card-table-title">
                    Netzwerk
                </div>
                <table>
                    <tr>
                        <td class="w-120">IP</td>
                        <td>{{ $networkswitch->ip }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Port</td>
                        <td>{{ $networkswitch->port }}</td>
                    </tr>
                </table>
            </div>

            <div style="clear: both;"></div>

        </div>
    </div>

@endforeach
