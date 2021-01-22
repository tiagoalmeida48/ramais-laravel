<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('assets/css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Logo</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="active"><a href="#">Ramais</a></li>
                    <li><a href="#">Novidades</a></li>
                    <li><a href="#">Empresas</a></li>
                    <li><a href="#">Setores</a></li>
                    <li><a href="#">Meus dados</a></li>
                    <li><a href="#">Sair</a></li>
                </ul>
                <ul class="sidenav" id="mobile-demo">
                    <li class="active"><a href="#">Ramais</a></li>
                    <li><a href="#">Novidades</a></li>
                    <li><a href="#">Empresas</a></li>
                    <li><a href="#">Setores</a></li>
                    <li><a href="#">Meus dados</a></li>
                    <div class="divider"></div>
                    <li><a href="#">Sair</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <br>
        @yield('content')
    </main>
    <footer>

    </footer>
    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/materialize.js') }}"></script>
</body>
</html>