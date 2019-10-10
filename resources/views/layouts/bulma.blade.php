<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!--Scripts-->
        <script
              src="https://code.jquery.com/jquery-3.4.1.min.js"
              integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
              crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
        <script src="{{ asset('js/bulma.js') }}" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('images/logo.png') }}" rel="shortcut icon" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

        <!-- Bulma Version 0.7.5-->
        <link rel="stylesheet" href="https://unpkg.com/bulma@0.7.5/css/bulma.min.css" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/bulma.min.css')}}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>
    <body class="has-navbar-fixed-top">
        <section class="hero is-light is-fullheight-with-navbar">
            @if (Route::has('login'))
            <div class="hero-head">
                @auth
                <nav class="navbar is-transparent is-fixed-top" role="navigation" aria-label="main navigation">
                    <div class="navbar-brand">
                        <a class="navbar-item">
                            <h1 class="title is-2">
                                biometric
                            </h1>
                        </a>
                        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navmenu">
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                        </a>
                    </div>
                    <div id="navmenu" class="navbar-menu">
                        <div class="navbar-end">
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link">
                                    <figure class="image is-32x32">
                                        <img class="is-rounded" src="{{asset('images/profile/Auth::user()->pix')}}">
                                    </figure>
                                    <figcation>{{Auth::user()->user_name}}</figcation>
                                </a>
                                <div class="navbar-dropdown">
                                    <a href="{{ route('users.show',Auth::user()->id) }}" class="navbar-item">
                                        <i class="fa fa-cogs"></i>&nbsp;&nbsp;
                                        Account Settings
                                    </a>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" class="navbar-item">
                                        <i class="fa fa-power-off"></i>&nbsp;&nbsp;
                                        {{ __('Log out') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        <div class="hero-body is-paddingless">
            <div class="columns is-marginless" style="width:100%;">
                <div class="column is-one-fifth">
                    <aside class="menu">
                        <p class="menu-label">
                    admin
                </p>
                <ul class="menu-list is-marginless is-paddingless">
                    <a class="menu-item is-marginless is-paddingless" href="{{ route('admins.index') }}">Admin</a>
                </ul>
                <p class="menu-label">
                    course
                </p>
                <ul class="menu-list is-marginless is-paddingless">
                    <a class="menu-item is-marginless is-paddingless" href="{{ route('courses.index') }}">Course</a>
                </ul>
                <p class="menu-label">
                    department
                </p>
                <ul class="menu-list is-marginless is-paddingless">
                    <a class="menu-item is-marginless is-paddingless" href="{{ route('departments.index') }}">Department</a>
                </ul>
                <p class="menu-label">
                    faculty
                </p>
                <ul class="menu-list is-marginless is-paddingless">
                    <a class="menu-item is-marginless is-paddingless" href="{{ route('faculties.index') }}">Faculty</a>
                </ul>
                <p class="menu-label">
                    lecturer
                </p>
                <ul class="menu-list is-marginless is-paddingless">
                    <a class="menu-item is-marginless is-paddingless" href="{{ route('lecturers.index') }}">Lecturer</a>
                </ul>
                <p class="menu-label">
                    level
                </p>
                <ul class="menu-list is-marginless is-paddingless">
                    <a class="menu-item is-marginless is-paddingless" href="{{ route('levels.index') }}">Level</a>
                </ul>
                <p class="menu-label">
                    password reset
                </p>
                <ul class="menu-list is-marginless is-paddingless">
                    <a class="menu-item is-marginless is-paddingless" href="{{ route('password_resets.index') }}">Password Reset</a>
                </ul>
                <p class="menu-label">
                    register
                </p>
                <ul class="menu-list is-marginless is-paddingless">
                    <a class="menu-item is-marginless is-paddingless" href="{{ route('registers.index') }}">Register</a>
                </ul>
                <p class="menu-label">
                    section
                </p>
                <ul class="menu-list is-marginless is-paddingless">
                    <a class="menu-item is-marginless is-paddingless" href="{{ route('sections.index') }}">Section</a>
                </ul>
                <p class="menu-label">
                    student
                </p>
                <ul class="menu-list is-marginless is-paddingless">
                    <a class="menu-item is-marginless is-paddingless" href="{{ route('students.index') }}">Student</a>
                </ul>
                <p class="menu-label">
                    user type
                </p>
                <ul class="menu-list is-marginless is-paddingless">
                    <a class="menu-item is-marginless is-paddingless" href="{{ route('user_types.index') }}">User Type</a>
                </ul>
                <p class="menu-label">
                    user
                </p>
                <ul class="menu-list is-marginless is-paddingless">
                    <a class="menu-item is-marginless is-paddingless" href="{{ route('users.index') }}">User</a>
                </ul>
                @endauth
            </aside>
                    </div>
                <div class="column">
                    @yield('content')
                </div>
            </div>
                @endif
        </div>
        <div class="hero-foot">
            <div class="level">
                <div class="level-left">&copy;&nbsp;AHERTL, All rights reserved</div>
                <div class="level-right">powered by: AHERTL&trade;</div>
            </div>
        </div>
        </section>
    </body>
</html>