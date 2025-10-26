<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Perumdam Tirta Mukti') }}</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-[#fff8d6]">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

        <!-- Logo -->
        <div>
            <a href="/">
                <img src="{{ asset('storage/logo.png') }}" alt="Perumdam Tirta Mukti" class="w-24 h-24 mx-auto">
            </a>
        </div>

        <!-- Form Login -->
        <div class="w-full sm:max-w-md mt-6 mx-6 my-6  shadow-md border-2 sm:rounded-xl">
            {{ $slot }}
        </div>

        <!-- Footer optional -->
        <div class="mt-4 text-sm text-gray-600">
            &copy; {{ date('Y') }} Perumdam Tirta Mukti. All rights reserved.
        </div>
    </div>
</body>
</html>
