<div class="heading">
    NAS
</div>

@foreach ($customer->nas as $nas)
    <div class="card">
        <div class="card-title">
            {{ $nas->name }}
        </div>
        <div class="card-container">

            <div class="card-table" style="float: left; width: 30%;">
                <div class="card-table-title">
                    Hardware
                </div>
                <table>
                    <tr>
                        <td class="w-120">Hersteller</td>
                        <td>{{ $nas->manufacturer }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Modell</td>
                        <td>{{ $nas->model }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Seriennummer</td>
                        <td>{{ $nas->serialNumber }}</td>
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
                        <td>{{ $nas->ip1 }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">IP-Adresse 2</td>
                        <td>{{ $nas->ip2 }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Port</td>
                        <td>{{ $nas->port }}</td>
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
                        <td>{{ $nas->username }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Passwort</td>
                        <td>{{ $nas->password }}</td>
                    </tr>
                </table>
            </div>


            <div style="clear: both;"></div>

        </div>
    </div>

@endforeach
