<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="h-screen bg-gray-100 dark:bg-gray-900">

<head>
    <title>{{ config('app.name') }}</title>

    <!-- Meta -->
    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta charset="utf-8">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.nav')

    <div class="flex w-full overflow-hidden pt-16">
        @include('layouts.aside')

        <div class="md:ml-64 h-full w-full overflow-y-auto">
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
