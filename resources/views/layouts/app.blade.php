<?php
    
    if(session('language') == 'pl'){
        $lan = 'pl';
    } else {
        $lan = 'eng';
    }

    $lang['pl'] = array(
        'title' => 'Grafik komputeorwy',
        'lang' => 'PL',
        'homeButton' => 'HOME',
        'aboutButton' => 'O MNIE',
        'projectsButton' => 'PROJEKTY',
        'offersButton' => 'OFERTY',
        'contactButton' => 'KONTAKT',
        'blogButton' => 'BLOG',
        'polish' => "POLSKI",
        'english' => "ANGIELSKI",
        'footer' => "Wszelkie prawa zastrzeżone."
    );

    $lang['eng'] = array(
        'title' => 'Computer graphics',
        'lang' => 'ENG',
        'homeButton' => 'HOME',
        'aboutButton' => 'ABOUT',
        'projectsButton' => 'PROJECTS',
        'offersButton' => 'OFFERS',
        'contactButton' => 'CONTACT',
        'blogButton' => 'BLOG',
        'polish' => "POLISH",
        'english' => "ENGLISH",
        'footer' => "All rights reserved."
    );

?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta description="Portfolio grafika komputerowego.">
    <link rel="shortcut icon" href="{{ asset('graphics/logo.png') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ $lang[$lan]['title'] }} </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/appOwn.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Icons -->
    <!-- zaimportowane za pomocą pliku sass w public, a wcześniej uruchomione polecenie npm run production -->

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/appOwn.css') }}" rel="stylesheet">

</head>

<body class="d-flex flex-column min-vh-100">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light position-fixed w-100" id="nav">
            <div class="container">
                <a class="navbar-brand p-0" href="{{ url('/') }}">
                    <img src="{{ asset('graphics/logo.jpg') }}" alt="logo" class="p-0" style="height: 66px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <a href="https://www.facebook.com/designbykw"> <i class="fab fa-facebook-circle"></i> </a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto text-dark text-center">
                        <li class="nav-item mr-2"> <a class="nav-link text-dark font-weight-bold navLink pb-0"
                                href="{{ url('/#baner') }}"> {{ $lang[$lan]['homeButton'] }} </a>
                            <div class="navUnderline"> </div>
                        <li>
                        <li class="nav-item mr-2"> <a class="nav-link text-dark font-weight-bold navLink pb-0"
                                href="{{ url('/#about') }}"> {{ $lang[$lan]['aboutButton'] }} </a>
                            <div class="navUnderline"> </div>
                        <li>
                        <li class="nav-item mr-2"> <a class="nav-link text-dark font-weight-bold navLink pb-0"
                                href="{{ url('/#projects') }}"> {{ $lang[$lan]['projectsButton'] }} </a>
                            <div class="navUnderline"> </div>
                        <li>
                        <li class="nav-item mr-2"> <a class="nav-link text-dark font-weight-bold navLink pb-0"
                                href="{{ url('/offers')}}"> {{ $lang[$lan]['offersButton'] }} </a>
                            <div class="navUnderline"> </div>
                        <li>
                        <li class="nav-item mr-2"> <a class="nav-link text-dark font-weight-bold navLink pb-0"
                                href="{{ url('/#contact') }}"> {{ $lang[$lan]['contactButton'] }} </a>
                            <div class="navUnderline"> </div>
                        <li>
                        <li class="nav-item mr-2"> <a class="nav-link text-dark font-weight-bold navLink pb-0"
                                href="{{ url('/blog') }}"> {{ $lang[$lan]['blogButton'] }} </a>
                            <div class="navUnderline"> </div>
                        <li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark font-weight-bold navLink"
                                href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                v-pre>
                                {{ $lang[$lan]['lang'] }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item font-weight-bold" href="{{ url('/setPlLanguage') }}">
                                    {{ $lang[$lan]['polish'] }} </a>
                                <a class="dropdown-item font-weight-bold"
                                    href="{{ url('/setEngLanguage') }}">{{ $lang[$lan]['english'] }} </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

    </div>
</body>
<footer class="mt-auto">
    <p class="bg-dark text-light mb-0 text-center p-2"> &copy;2020 Damian Bohonos. {{ $lang[$lan]['footer'] }} </p>
</footer>

</html>