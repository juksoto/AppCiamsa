<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <title>
      @yield ('title') - CIAMSA APP Admin
    </title>
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('admin/bootflat/css/bootflat.min.css') }}" rel="stylesheet" type="text/css" >
    <link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
    <link href="{{  asset('admin/css/style.css') }}" rel="stylesheet" type="text/css" >
    @yield('head')
</head>
<body class="admin @yield('body-css')">
    <section class="container">
        @yield('content')
    </section>

    @include('admin.layout.partials.scripts')
    @yield('scripts')
</body>
</html>