<!DOCTYPE html>
<html lang="en" style="height:100%;">
<head>
    <meta charset="utf-8">
    <title>VideOn - @yield('title')</title>
    <!-- Always use the Laravel helper functions to link resources, they are always guaranteed to link regardless of page-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="pinegrow, blocks, bootstrap" />
    <meta name="description" content="My new website" />
    <link rel="shortcut icon" href="ico/favicon.png">
    <!-- Core CSS -->
    <link href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet">
    <!-- Style Library -->
    <link href="{{ URL::asset('css/style-library-1.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/plugins.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/blocks.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="{{ URL::asset('js/html5shiv.js') }}"></script>
    <script src="{{ URL::asset('js/respond.min.js') }}"></script>
    <![endif]-->
</head>
@yield('header')
<body data-spy="scroll" data-target="nav" class="">
<div class="container-fluid">
    <header id="header-1" class="header-1">
        <!-- Navbar -->
        <nav class="main-nav navbar-fixed-top headroom headroom--pinned">
            <div class="container">
                <!-- Brand and toggle -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a id="logo" class="navbar-brand" href="/movies">
                        VideOn @if(!Auth::guest() && Auth::user()->privileges == 1): Administrator @endif
                    </a>
                </div>
                <!-- Navigation -->
                <div class="collapse navbar-collapse">
                    <!-- REMEMBER THIS SHOULD ONLY BE VISIBLE TO AN ADMINISTRATOR-->
                    @if(!Auth::guest() && Auth::user()->privileges == 1)
                        <ul id="lefty" class="nav navbar-nav navbar-left">
                            <li class="nav-item">
                                <a href="/movies/create">Add Movie</a>
                            </li>
                            <hr>
                        </ul>
                    @endif

                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                            <a href="/">Home</a>
                        </li>

                        @if(Auth::guest())
                            <li class="nav-item">
                                <a href="/auth/register/">Sign Up</a>
                            </li>
                            <li class="nav-item">
                                <a href="/auth/login/">Login</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="/cart/">Basket</a>
                            </li>
                            <li class="nav-item">
                                <a href="/auth/logout/">Logout</a>
                            </li>
                        @endif
                    </ul>
                    <!--//nav-->
                </div>
                <!--// End Navigation -->
            </div>
            <!--// End Container -->
        </nav>
        <!--// End Navbar -->
    </header>

<div class="row">

    <div class="col-md-12">
        @if(Session::has('flash_message'))
            <div class="alert alert-info">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
        @yield('content')
    </div>
</div>

@yield('footer')
<div class="copyright-bar-2 bg-blue col-md-12">
    <div class="container-fluid text-center">
        <p>© COPYRIGHT 2023 - VideOn Catalogue - JB </p>
    </div>
</div>
</div>
<script>
    $('div.alert').delay(150).slideUp(300);
</script>
<script type="text/javascript" src="{{ URL::asset('js/jquery-1.11.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/plugins.js') }}"></script>
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="{{ URL::asset('js/bskit-scripts.js') }}"></script>
</body>
</html>