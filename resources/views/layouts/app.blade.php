<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
        <div>
            <div class="min-h-screen flex flex-col flex-auto flex-shrink-0  ">
                @include('layouts.nav')
                @include('layouts.aside')

                <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
                    {{ $slot }}
                </div>

                @include('layouts.success')

            </div>
        </div>
    </div>

    @livewire('livewire-ui-modal')
    @livewireScripts
</body>

</html>
