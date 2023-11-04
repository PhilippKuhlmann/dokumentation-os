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

    @include('pdf.partials.securepointutm')

    <div class="page-break"></div>

    @include('pdf.partials.router')

    <div class="page-break"></div>

    @include('pdf.partials.network')

    <div class="page-break"></div>

    @include('pdf.partials.wifi')

    <div class="page-break"></div>

    @include('pdf.partials.networkswitch')

    <div class="page-break"></div>

    @include('pdf.partials.accesspoint')

    <div class="page-break"></div>

    @include('pdf.partials.server')

    <div class="page-break"></div>

    @include('pdf.partials.vm')

    <div class="page-break"></div>

    @include('pdf.partials.nas')

    <div class="page-break"></div>

    @include('pdf.partials.aduser')





</body>

</html>
