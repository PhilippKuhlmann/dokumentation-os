<div class="heading">
    Securepoint UTM
</div>

@foreach ($customer->securepointutms as $utm)
    <div class="card">
        <div class="card-title">
            {{ $utm->name }}
        </div>
        <div class="card-container">

            <div class="card-table" style="float: left; width: 50%;">
                <div class="card-table-title">
                    Allgemein
                </div>
                <table>
                    <tr>
                        <td class="w-120">Art</td>
                        <td>{{ $utm->type }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Seriennummer</td>
                        <td>{{ $utm->serialNumber }}</td>
                    </tr>
                </table>
            </div>

            <div class="card-table" style="float: left; width: 50%;">
                <div class="card-table-title">
                    Login
                </div>
                <table>
                    <tr>
                        <td class="w-120">Benutzername</td>
                        <td>{{ $utm->username }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Passwort</td>
                        <td>{{ $utm->password }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Cloud Backup Passwort</td>
                        <td>{{ $utm->cloudBackupPassword }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">USC-PIN</td>
                        <td>{{ $utm->uscPin }}</td>
                    </tr>
                </table>
            </div>

            <div style="clear: both;"></div>

            <div class="card-table" style="float: left; width: 50%;">
                <div class="card-table-title">
                    URL
                </div>
                <table>
                    <tr>
                        <td class="w-120">IP</td>
                        <td>{{ $utm->ip }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Admin URL</td>
                        <td>{{ $utm->urlAdmin }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">User URL</td>
                        <td>{{ $utm->urlUser }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">Externe URL</td>
                        <td>{{ $utm->urlExternal }}</td>
                    </tr>
                </table>
            </div>

            <div style="clear: both;"></div>

        </div>
    </div>

@endforeach
