<div class="heading">
    Accesspoints
</div>

@foreach ($customer->accesspoints as $accesspoint)
    <div class="card">
        <div class="card-title">
            {{ $accesspoint->name }}
        </div>
        <div class="card-container">

            <div class="card-table" style="float: left; width: 30%;">
                <div class="card-table-title">
                    Allgemein
                </div>
                <table>
                    <tr>
                        <td class="w-120">Hersteller</td>
                        <td>{{ $accesspoint->manufacturer }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Modell</td>
                        <td>{{ $accesspoint->model }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Seriennummer</td>
                        <td>{{ $accesspoint->serialNumber }}</td>
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
                        <td>{{ $accesspoint->username }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Passwort</td>
                        <td>{{ $accesspoint->password }}</td>
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
                        <td>{{ $accesspoint->ip }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Port</td>
                        <td>{{ $accesspoint->port }}</td>
                    </tr>
                </table>
            </div>

            <div style="clear: both;"></div>

        </div>
    </div>

@endforeach
