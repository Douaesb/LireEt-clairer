<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handlee&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Books</title>
</head>

<body class="bg-yellow-900">
    @include('partials.nav')
    @extends('partials.panier')
    <main>
        @yield('welcome')
        @yield('welcomeClient')
        @yield('dashboard')
        @yield('users')
        @yield('categories')
        @yield('oneBook')
        @yield('oneAccessoire')
        @yield('contact')
        @yield('books')
        @yield('accessoires')




    </main>
    @include('partials.footer')
    {{-- <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>
