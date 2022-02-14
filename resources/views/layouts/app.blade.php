@php
    $countries = App\Models\Country::all()
@endphp

        <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon"/>

    <!-- [if IE] >
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <! [endif] -->


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IOF Global Orienteering Volunteer Platform</title>

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/media.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>

</head>

<body class="d-flex flex-column">
@include('sweetalert::alert')
<div class="wrapper flex-grow-1 d-flex flex-column">
    <header>
        <div class="shadow container-fluid eltop">
            <div class="row justify-content-between align-items-center">
                <a href="/" class="col-auto d-flex logo d-none home mr-3">
                    <i class="fas fa-home my-auto home" aria-hidden="true"></i>
                    <img src="{{ asset('images/logo.svg') }}" width="160" alt=""/>
                </a>
                <nav class="flex-grow-1 d-flex flex-column justify-content-end">
                    <div class="col-12 child d-flex justify-content-between align-items-center">
                        <ul id="menu-top-external-links-menu" class="menu top_menu d-flex align-items-center">
                            <li id="menu-item-28" class="menu-item">
                                <a target="_blank" rel="noopener noreferrer" href="https://orienteering.sport/">
                                    INTERNATIONAL ORIENTEERING FEDERATION
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="main d-flex justify-content-end justify-content-xl-start align-items-center">
                        <a href="/" class="col logo d-block d-xl-none">
                            <img src="{{ asset('images/logo.svg') }}" width="160" alt=""/>
                        </a>
                        <a href="#" class="order-1 pl-3 pr-3 main_menu_burger">
                            <img src="{{ asset('images/menu.svg') }}" alt=""/>
                        </a>
                        <ul id="menu-main-menu" class="menu main_menu d-xl-flex align-items-center w-100">
                            <li class="menu-item menu-item-has-children">
                                <a href="#">
                                    Volunteer
                                </a>
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a href="#">Column 1</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item">
                                                @if(isset($user) && $user->volunteer)
                                                    <a href="{{ route('volunteer.edit', $user->volunteer) }}">
                                                        Edit Volunteer
                                                    </a>
                                                @else
                                                    <a href="{{ route('volunteer.register') }}">
                                                        Register as a Volunteer
                                                    </a>
                                                @endif

                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">Column 2</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item">
                                                <a href="{{ route('volunteer.searchForm') }}">
                                                    Search a Volunteer
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#">
                                    Projects
                                </a>
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a href="#">Column 1</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item">
                                                @if(isset($user) && $user->projects->count())
                                                    <a href="{{ route('project.list') }}">
                                                        List of Projects
                                                    </a>
                                                @else
                                                    <a href="{{ route('project.register') }}">
                                                        Register a Project
                                                    </a>
                                                @endif
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">Column 2</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item">
                                                <a href="{{ route('project.searchForm') }}">
                                                    Search a Project
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#">
                                    Host family
                                </a>
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a href="#">Column 1</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item">
                                                @if(isset($user) && $user->host)
                                                    <a href="{{ route('host.edit', $user->host) }}">
                                                        Edit your Host Family
                                                    </a>
                                                @else
                                                    <a href="{{ route('host.register') }}">
                                                        Register as a Host Family
                                                    </a>
                                                @endif
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">Column 2</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item">
                                                <a href="{{ route('host.searchForm') }}">
                                                    Find a host family
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#">
                                    Guest
                                </a>
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a href="#">Column 1</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item">
                                                @if(isset($user) && $user->guest)
                                                    <a href="{{ route('guest.edit', $user->guest) }}">
                                                        Edit Guest
                                                    </a>
                                                @else
                                                    <a href="{{ route('guest.register') }}">
                                                        Register as a Guest
                                                    </a>
                                                @endif
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">Column 2</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item">
                                                <a href="{{ route('guest.searchForm') }}">
                                                    Search a guest
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            @guest
                                <li class="ml-auto m_green menu-item">
                                    <a href="{{ route('register') }}">
                                        NEW USER
                                    </a>
                                </li>
                                <li class="mr-3 m_red menu-item">
                                    <a href="{{ route('login') }}" >
                                        SIGN IN
                                    </a>
                                </li>
                            @else
                                <li class="ml-auto mr-3 m_red menu-item">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

    </header>

    <main class="flex-grow-1">
        @yield('content')
        <div class="clear"></div>
    </main>
    <footer>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <aside aria-label="Footer">
                    <h4>International Orienteering Federation</h4>
                    <p>Drottninggatan 47 31/2 tr<br>
                        SE-65225 Karlstad<br>
                        SWEDEN<br>
                        <a href="mailto:iof@orienteering.org">iof@orienteering.org</a></p>
                </aside>
            </div>
        </div>
    </footer>
</div>
</body>

</html>
