<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Inicio') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <style>
            body {
                font-family: 'Figtree', sans-serif;
                background-color: #f7f7f7;
                color: #333;
            }

            .custom-card {
                background-color: #ffffff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
            }

            .custom-card-header {
                background-color: #007bff;
                color: white;
                font-size: 1.5rem;
                padding: 1rem;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }

            .custom-card-body {
                padding: 2rem;
            }

            .text-custom {
                font-size: 1.2rem;
                color: #007bff;
            }

            .logo {
                display: block;
                margin: 0 auto;
                width: 80px;
                height: 80px;
            }

            .container-fluid {
                margin-top: 50px;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="logo" />
                </a>
            </div>

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="custom-card shadow-md overflow-hidden sm:rounded-lg">
                            <div class="custom-card-header text-center">
                                <h2>{{ config('app.name', 'Inicio') }}</h2>
                            </div>
                            <div class="custom-card-body">
                                <p class="text-center text-custom">Bienvenido a nuestra plataforma</p>
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
