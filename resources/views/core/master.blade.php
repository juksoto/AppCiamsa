<!DOCTYPE html>
<html lang="es">
<head>
    @include('core.partials.head')
    @yield('head')
</head>
<body>
<!-- Step One -->
<section class="wrapper-app @yield('class-section')">
    <!-- NAV -->
    <nav>
        @include('core.partials.nav')
    </nav>
    <!-- end NAV -->
    <!-- content -->
    <section class="content">
        @yield('content')
         <!-- //require 'includes/modalIndex.php'-->
    </section>
    <!-- End  content -->
    <!-- Bottom -->
    <section class="row bottom">
        @yield('bottom')
    </section>
    <!-- End  Bottom -->
</section>
<!-- End Step One -->
<footer class="row expanded">
    @include('core.partials.footer')
</footer>

    @include('core.partials.scripts')
    @yield('scripts')
</body>
</html>