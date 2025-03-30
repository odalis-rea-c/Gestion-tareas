<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
            padding: 24px;
        }

        header {
            width: 100%;
            max-width: 960px;
            margin-bottom: 24px;
        }

        .nav-auth {
            display: flex;
            justify-content: flex-end;
            gap: 16px;
        }

        .nav-auth a {
            padding: 6px 16px;
            border-radius: 4px;
            text-decoration: none;
        }

        .nav-auth a.border {
            border: 1px solid #19140035;
        }

        .nav-auth a.border:hover {
            border-color: #1915014a;
        }

        .nav-auth a.border-dark {
            border-color: #3E3E3A;
        }

        .nav-auth a.border-dark:hover {
            border-color: #62605b;
        }

        .nav-auth a.text-dark {
            color: #EDEDEC;
        }

        .nav-auth a.text-light {
            color: #1b1b18;
        }

        .nav-auth a.border-transparent {
            border-color: transparent;
        }

        .nav-auth a.border-transparent:hover{
            border-color: #19140035;
        }

        .nav-auth a.border-transparent.text-dark:hover{
            border-color: #3E3E3A;
        }

        .spacer {
            height: 58px;
        }

        @media (min-width: 992px) {
            .spacer {
                display: block;
            }
        }

        .dark-mode {
            background-color: #0a0a0a;
            color: #EDEDEC;
        }

        .light-mode {
            background-color: #FDFDFC;
            color: #1b1b18;
        }
    </style>
</head>
<body class="light-mode">
    <header>
        <h1 class="text-center mb-4">Registro de Tareas</h1>
        @if (Route::has('login'))
            <nav class="nav-auth">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-light border border-dark text-dark">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-light border-transparent text-dark">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-light border border-dark text-dark">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    @if (Route::has('login'))
        <div class="spacer d-none d-lg-block"></div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>