@php
    $countries = App\Models\Country::all();
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />

        <!--[if IE]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->


        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>IOF Global Orienteering Volunteer Platform</title>

        <!-- Scripts -->

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/datepicker.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/media.css') }}">
        <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>

    </head>

    <body class="d-flex flex-column">
        <div class="wrapper flex-grow-1">
            <header>
                <div class="shadow container-fluid eltop">
                    <div class="row justify-content-between align-items-center">
                        <a href="/" class="col-auto logo d-none d-xl-block">
                            <img src="{{ asset('images/logo.svg') }}" width="160" alt="" />
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
                                    <img src="{{ asset('images/logo.svg') }}" width="160" alt="" />
                                </a>
                                <a href="#" class="order-1 pl-3 pr-3 main_menu_burger">
                                    <img src="{{ asset('images/menu.svg') }}" alt="" />
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
                                                        @if (isset($user) && $user->volunteer)
                                                        <a href="{{ route('volunteer.edit', $user->volunteer) }}">
                                                            Edit your Volunteer
                                                        </a>
                                                        @else
                                                        <a href="{{ route('volunteer.list') }}">
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
                                                        <a href="{{ route('project.registerForm') }}">
                                                            Register a Project
                                                        </a>
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
                                                        <a href="{{ route('host.registerForm') }}">
                                                            Register as a Host Family
                                                        </a>
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
                                                        <a href="{{ route('guest.registerForm') }}">
                                                            Register as a Guest
                                                        </a>
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
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#registration-modal">
                                                NEW USER
                                            </a>
                                        </li>
                                        <li class="mr-3 m_red menu-item">
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#login-modal">
                                                SIGN IN
                                            </a>
                                        </li>
                                    @else
                                        <li class="ml-auto mr-3 m_red menu-item">
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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





            <main>
                @yield('content')
                <div class="clear"></div>
            </main>
            <footer>
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <aside>
                            <h4>International Orienteering Federation</h4>
                            <p>Drottninggatan 47 31/2 tr<br>
                                SE-65225 Karlstad<br>
                                SWEDEN<br>
                                <a href="mailto:iof@orienteering.org">iof@orienteering.org</a></p>
                        </aside>
                        <aside>
                            <img src="{{ asset('images/connectingworldwide.png') }}" alt="" width="200"/>
                        </aside>
                    </div>
                </div>
            </footer>

            @guest
                <div class="modal" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form id="signinForm" method="POST" action="login">
                                    @csrf
                                    <p class="big-desc">You may sign in using your e-mail and password...</p>
                                    <div class="form-group row desc">
                                        <label class="col-3 col-form-label col-form-label-sm" for="email">E-mail: </label>
                                        <div class="col-9">
                                            <input class="form-control form-control-sm" type="text" name="email" size="20" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row desc">
                                        <label class="col-3 col-form-label col-form-label-sm" for="password">Password: </label>
                                        <div class="col-9">
                                            <input class="form-control form-control-sm" type="password" name="password" size="20" required="">
                                        </div>
                                    </div>
                                    <div class="mx-0 form-group row">
                                        <button type="submit" class="btn btn-primary">Sign in!</button>
                                        <a href="restore" class="resetPassword-link">
                                            Restore password
                                        </a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal" id="registration-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form id="registerForm" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <p class="big-desc">All fields are required!</p>
                                    <div class="form-group row desc">
                                        <label class="col-3 col-form-label col-form-label-sm" for="firstname">Firstname<span class="warn-title">*</span>: </label>
                                        <div class="col-9">
                                            <input class="form-control form-control-sm" type="text" name="firstname" size="20" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row desc">
                                        <label class="col-3 col-form-label col-form-label-sm" for="lastname">Lastname<span class="warn-title">*</span>: </label>
                                        <div class="col-9">
                                            <input class="form-control form-control-sm" type="text" name="lastname" size="20" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row desc">
                                        <label class="col-3 col-form-label col-form-label-sm" for="name">Country<span class="warn-title">*</span>: </label>
                                        <div class="col-9">
                                            <select type="text" name="country" id="country" required="">
                                                @foreach($countries as $country )
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row desc">
                                        <label class="col-3 col-form-label col-form-label-sm" for="name">E-mail<span class="warn-title">*</span>: </label>
                                        <div class="col-9">
                                            <input class="form-control form-control-sm" type="text" name="email" size="20" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row desc">
                                        <label class="col-3 col-form-label col-form-label-sm" for="name">Password<span class="warn-title">*</span>: </label>
                                        <div class="col-9">
                                            <input class="form-control form-control-sm" type="password" name="password" size="20" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row desc">
                                        <label class="col-3 col-form-label col-form-label-sm" for="name">Password Confirmation<span class="warn-title">*</span>: </label>
                                        <div class="col-9">
                                            <input class="form-control form-control-sm" type="password" name="password_confirmation" size="20" required="">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <script language="javascript" type="text/javascript">
                    jQuery(document).ready(function ($) {

                        // load countries list
                        $.ajax({
                            type: "GET",
                            url: 'countries',
                            success: function (data) {
                                $('#country').empty().append(data);
                            }
                        });

                        $('#register').click(function () {
                            $('#register').hide();
                            $('#registerBlock').show();
                            $('#signInBlock').hide();
                            $('#signIn').show();
                        });

                        $('#signIn').click(function () {
                            $('#registerBlock').hide();
                            $('#register').show();
                            $('#signInBlock').show();
                            $('#signIn').hide();
                        });
                    });

                </script>
            @endguest
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('js/datepicker.min.js') }}"></script>

            <script language="javascript" type="text/javascript">
                $.fn.datepicker.language['en'] = {
                    days: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                    daysShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                    daysMin: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    today: 'Today',
                    clear: 'Clear',
                    dateFormat: 'mm/dd/yyyy',
                    timeFormat: 'hh:ii aa',
                    firstDay: 0
                };

            </script>
            <script src="{{ asset('js/main.js') }}"></script>
    </body>

</html>
