<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        .bg-with-text {
            background-image: url('/images/isph.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: sans-serif;
            color: #ffffff;
            text-align: center;
        }
    </style>
</head>

<body class="antialiased">
    <div class="font-sans text-gray-900
     relative bg-with-text">
        {{ $slot }}</div>
    </div>
</body>


{{-- <body class="h-screen
    bg-cover bg-center bg-no-repeat
    bg-[url('/images/restaurant_d.jpg')]">
    <div class="font-sans text-gray-900 antialiased" style="background-image:
    url('/images/restaurant_d.jpg')">
        {{ $slot }}
    </div>
</body> --}}

</html>
