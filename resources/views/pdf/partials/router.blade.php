<div class="heading">
    Router
</div>

@foreach ($customer->routers as $router)
    <div class="card">
        <div class="card-title">
            {{ $router->name }}
        </div>
        <div class="card-container">

            <div class="card-table" style="float: left; width: 30%;">
                <div class="card-table-title">
                    Allgemein
                </div>
                <table>
                    <tr>
                        <td class="w-120">Art</td>
                        <td>{{ $router->type }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Seriennummer</td>
                        <td>{{ $router->serialNumber }}</td>
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
                        <td>{{ $router->username }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Passwort</td>
                        <td>{{ $router->password }}</td>
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
                        <td>{{ $router->ip }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Port</td>
                        <td>{{ $router->port }}</td>
                    </tr>
                </table>
            </div>

            <div style="clear: both;"></div>

        </div>
    </div>

@endforeach
