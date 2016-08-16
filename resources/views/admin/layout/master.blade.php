<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <title>
      @yield ('title') - CIAMSA APP Admin
    </title>
    <link href="{{ asset('assets/css/normalize.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/admin/bootflat/css/bootflat.min.css') }}" rel="stylesheet" type="text/css" >
    <link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
    <link href="{{  asset('assets/admin/css/style.css') }}" rel="stylesheet" type="text/css" >
    @yield('head')
</head>
<body class="admin @yield('body-css')">
        <nav class="navbar  navbar-static-top" style="background: #FFF" >
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand">
                        Registros
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                   <p style="padding: 1em 0">
                                       {{ Auth::user()->name }}
                                   </p>
                            </li>

                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <section class="container">
            @yield('content')
        </section>

    @include('admin.layout.partials.scripts')
    @yield('scripts')
</body>
</html>