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
        <section class="row text-small-only-center">
            <article class="small-12 medium-3 column text-center">
                <a href="">
                    <img src="{{ asset( 'images/logo-ciamsa.png' )}}" alt="" width="180px" class ="logo">
                </a>
            </article>
            <section class="small-12 medium-9 column text-medium-right btn-header hide-for-small-only">
                @yield('nav')
            </section>
        </section>
    </nav>
    <!-- end NAV -->
    <!-- content -->
    <section class="content">
        @yield('content')
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