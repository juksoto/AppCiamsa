<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Pagina no encontrada.
    </title>
    <meta name="description" content="Conozca el producto para nutrir su cultivo en 3 pasos.">
    <link rel="stylesheet" href="{{ asset( 'assets/css/foundation.css' ) }}" />
    <link rel="stylesheet" href="{{ asset( 'assets/css/normalize.css' ) }}" />
    <link rel="stylesheet" href="{{ asset( 'assets/vendors/bootflat/css/bootflat.min.css' ) }}" />
    <link rel="stylesheet" href="{{ asset( 'assets/css/style.css' ) }}" />
    <link href="" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset( 'favicon.ico' ) }}">
</head>
<body>
<!-- Step One -->
<section class="wrapper-app wrapper-step error404">
    <!-- NAV -->
    <nav>
        <section class="row text-small-only-center">
            <article class="small-12 medium-3 column text-center">
                <a href="">
                    <img src="{{ asset( 'images/logo-ciamsa.png' )}}" alt="" width="180px" class ="logo">
                </a>
            </article>
            <section class="small-12 medium-9 column text-medium-right btn-header hide-for-small-only">

            </section>
        </section>
    </nav>
    <!-- end NAV -->
    <!-- content -->
    <section class="content text-center">
        <section class="row">
            <section class="col-xs-12">
                <h1>
                    404
                </h1>
                <h2>
                    Página no encontrada
                </h2>
                <p>
                    <a href="{{ url()->previous() }}" class="button btn-grapefruit  ">Regresar</a>
                </p>
            </section>
        </section>
    </section>
    <!-- End  content -->
    <!-- Bottom -->
    <section class="row bottom" >
        <section class="small-12 column text-center">
            <img src="{{asset('images/bottom-ciamsa.png') }}" alt="Expertos en mezclas" width="694">
        </section>
    </section>
    <!-- End  Bottom -->
</section>
<!-- End Step One -->
<footer class="row expanded">
    <section class="small-12 text-center">
        <p>
            Una solución de <a href="http://innovalamarca.com/" target="_blank" style="color:#B0C600"> INNOVABRAND</a>
        </p>
    </section>
</footer>
</body>
</html>