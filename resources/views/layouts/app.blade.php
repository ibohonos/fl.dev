<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'FL.dev')</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav>
            <div class="container">
                <div class="nav-wrapper">
                    <ul id="nav-mobile-left" class="left hide-on-med-and-down">
                        <li><a href="{{ route('projects') }}">Проекти</a></li>
                    </ul>
                    <a href="{{ url('/') }}" class="brand-logo center">{{ config('app.name', 'Laravel') }}</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        @guest
                            <li><a href="{{ route('login') }}">Вхід</a></li>
                            <li><a href="{{ route('register') }}">Реєстрація</a></li>
                        @else
                            <!-- Dropdown Trigger -->
                            <li>
                                <a class="dropdown-button" href="#!" data-activates="dropdownUser" style="display: flex;">
                                    <img src="{{ Auth::user()->avatar }}" style="border-radius: 50%; width: 40px; height: 40px; align-self: center; margin-right: 10px;">
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<i class="material-icons right">arrow_drop_down</i>
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @auth
            <!-- Dropdown Structure -->
            <ul id="dropdownUser" class="dropdown-content">
                <li>
                    <a href="{{ route('dashboard') }}">Особистий кабінет</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Вихід
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        @endauth

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
