<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentation - {{ $customer->name }}</title>

    <style>
        @font-face {
            font-family: 'CoconPro';
            src: url('fonts/CoconPro.otf');
        }

        @font-face {
            font-family: 'DINPro-Regular';
            src: url('fonts/DINPro-Regular.otf');
        }

        html {
            font-family: 'DINPro-Regular';
        }

        .CoconPro {
            font-family: 'CoconPro';
        }

        .center {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }



        .title {
            font-size: 60px;
            color: #194b7e;
        }

        .customer {
            font-size: 30px;
        }

        .logocontailer {
            text-align: center;
        }

        .logo {
            height: 250px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 200px;
            display: block;
        }

        .date {
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .page-break {
            page-break-after: always;
        }

        .heading {
            font-family: 'CoconPro';
            font-size: 32px;
            color: #01b0ec;
        }


        .card {
            margin-top: 25px;
            width: 100%;
            border: 1px solid #01b0ec;
            padding: 5px;

        }

        .card-title {
            font-size: 20px;
        }

        .card-container {
            width: 100%;

        }

        .card-table {
            font-size: 12px;
            margin-right: 3%;
        }

        .card-table-title {
            font-size: 12px;
            color: #9ca3af;
        }

        .w-120 {
            min-width: 120px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th {
            font-family: 'DINPro-Regular';
            font-weight: 400;
            text-align: left;
            padding-top: 8px;
            padding-bottom: 8px;
            background-color: #194b7e;
            color: white;
        }

        .table td {
            border-bottom: 1px solid #01b0ec;
            padding-top: 4px;
            padding-bottom: 4px;
        }



    </style>
</head>

<body>
    <div class="date">
        <span>Stand: {{ date('d.m.Y') }}</span>
    </div>
    <div class="logocontailer">
        <img src="./images/stadel_systeme_logo.svg" class="logo" />
    </div>

    <div class="center">

        <div class="CoconPro title">
            Dokumentation
        </div>
        <div class="customer">
            {{ $customer->name }}
        </div>

    </div>




<div class="page-break"></div>



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



<div class="page-break"></div>



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


<div class="page-break"></div>



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



<div class="page-break"></div>



    <div class="heading">
        WLAN
    </div>

    <table class="table">
        <tr>
            <th>SSID</th>
            <th>Netzwerk</th>
            <th>Verschlüsselung</th>
            <th>Passwort</th>
        </tr>
        @foreach ($customer->wifis as $wifi)
            <tr>
                <td>{{ $wifi->ssid }}</td>
                <td>{{ $wifi->network->vlanId }}</td>
                <td>{{ $wifi->encryption }}</td>
                <td>{{ $wifi->password }}</td>
            </tr>
        @endforeach
    </table>




<div class="page-break"></div>



    <div class="heading">
        AD-User
    </div>

    <table class="table">
        <tr>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Benutzername</th>
            <th>Passwort</th>
        </tr>
        @foreach ($customer->adusers as $aduser)
            <tr>
                <td>{{ $aduser->firstName }}</td>
                <td>{{ $aduser->lastName }}</td>
                <td>{{ $aduser->username }}</td>
                <td>{{ $aduser->password }}</td>
            </tr>
        @endforeach
    </table>



</body>

</html>
