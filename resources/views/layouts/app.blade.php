<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/fonts/font-awesome/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css">
    <script src="https://unpkg.com/flatpickr"></script>

</head>
<body>
    <div id="app">
        <section class="global-ui">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </section>
        <nav class="top">
            
            <ul class="nav navbar-nav">
                <li><a href="/events">Assemble</li>
                <li><a href="/rizeups">Rize Ups</li>
            </ul>

        
            @if (Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
               
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                        
            @endif
                    
        </nav>

        <div class="content">
            @yield('content')
        </div>

        <nav class="bottom">
            <ul>
                <li><a href="/events/new"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                <li><a href="/events"><i class="fa fa-map-marker" aria-hidden="true"></i></a></li>
                <li><a href="/rizeups"><i class="fa fa-globe" aria-hidden="true"></i></a></li>
                <li><a href="/home"><i class="fa fa-user" aria-hidden="true"></i></a></li>
            </ul>
        </nav>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
