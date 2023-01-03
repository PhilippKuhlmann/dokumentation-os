<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentation - {{ $customer->name }}</title>

    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        .center {
            text-align: center;
            /* Zentriert den Text innerhalb des h1-Tags */
            position: absolute;
            /* Legt fest, dass das Element absolut positioniert wird */
            top: 50%;
            /* Setzt den oberen Rand des Elements auf die Mitte der Seite */
            left: 50%;
            /* Setzt den linken Rand des Elements auf die Mitte der Seite */
            transform: translate(-50%, -50%);
            /* Zentriert das Element innerhalb seiner Elternbox */
        }

        .date {
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .page-break {
            page-break-after: always;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #ddd;
            text-align: left;
        }

        td,
        th {
            padding: 8px;
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="date">
        <span>Stand: {{ date('d.m.Y') }}</span>
    </div>
    <div class="center">
        <svg width="100" height="100">
            <circle cx="50" cy="50" r="40" stroke="green" stroke-width="4" fill="yellow" />
          </svg>
        <h1>Dokumentation</h1>
    </div>


    <div class="page-break"></div>


    <h1>AD-User</h1>

    <table>
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
