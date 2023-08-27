<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/images/favicon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <style>
        body {
            background-image: url("/images/background.png");
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }
      </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-DINPro text-gray-900">

    {{ $slot }}

</body>

</html>
