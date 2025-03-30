<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Produsys') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        html, body {
            height: 100%;
        }

    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-200 h-full">
<div class="bg-gray-800 text-white shadow-md fixed w-full z-10 top-0 left-0">
    @include('layouts.navigation')
</div>

<div class="flex pt-16">
    <div class="w-64 fixed top-16 left-0 h-screen z-20">
        @include('components.side-bar')
    </div>

    <main class="flex-1 ml-64 bg-gray-200 p-6 overflow-auto">
        @yield('content')
    </main>
</div>
</body>
</html>
