<?
    
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
        'english' => "Angielski"
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
        'english' => "ENGLISH"
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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/appMain.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-1 position-fixed w-100" id="nav">
            <div class="container">
                <a class="navbar-brand p-0" href="{{ url('/') }}">
                    <img src="{{ asset('graphics/logo.jpg') }}" alt="logo" class="p-0" style="height: 65px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto text-dark">
                        <li class="nav-item"> <a class="nav-link text-dark font-weight-bold navLink mr-2"  href="{{ url('/') }}"> {{ $lang[$lan]['homeButton'] }} </a> <li>
                        <li class="nav-item"> <a class="nav-link text-dark font-weight-bold navLink mr-2"  href="{{ url('/#about') }}"> {{ $lang[$lan]['aboutButton'] }} </a> <li>
                        <li class="nav-item"> <a class="nav-link text-dark font-weight-bold navLink mr-2"  href="{{ url('/#projects') }}"> {{ $lang[$lan]['projectsButton'] }} </a> <li>
                        <li class="nav-item"> <a class="nav-link text-dark font-weight-bold navLink mr-2"  href="#"> {{ $lang[$lan]['offersButton'] }} </a> <li>
                        <li class="nav-item"> <a class="nav-link text-dark font-weight-bold navLink mr-2"  href="#contact"> {{ $lang[$lan]['contactButton'] }} </a> <li>
                        <li class="nav-item"> <a class="nav-link text-dark font-weight-bold navLink mr-2"  href="#"> {{ $lang[$lan]['blogButton'] }} </a> <li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark font-weight-bold navLink" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ $lang[$lan]['lang'] }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item font-weight-bold" href="{{ url('/setPlLanguage') }}"> {{ $lang[$lan]['polish'] }} </a>
                                <a class="dropdown-item font-weight-bold" href="{{ url('/setEngLanguage') }}"> {{ $lang[$lan]['english'] }} </a>
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
</html>
