@extends('core.master')
@section('title')
    CIAMSA - Paso 1 - Tipo de cultivo
@endsection
@section('class-section')
    wrapper-step-one
    @endsection
    @section('nav')
            <!-- NAV -->
    <nav>
        <section class="row text-small-only-center">
            <article class="small-12 medium-3 column ">
                <a href="">
                    <img src="images/logo-ciamsa.png" alt="" width="180px" class ="logo">
                </a>
            </article>
            <section class="small-12 medium-9 column text-medium-right btn-header">
                <a href="{{ route('index')}}" class="button btn-sunflower"> <span class="icon-home" aria-hidden="true"></span> Inicio</a>
                <a href="cotizar.php" class="button btn-ciamsa"> <span class="icon-user" aria-hidden="true"></span> Solicitar cotización</a>
            </section>
        </section>
    </nav>
    <!-- end NAV -->
    @endsection

    @section('content')
            <!-- title -->
    <section class="row header-title">
        <section class="small-10 small-centered column text-center">
            <article>
                <h2>
                    <span class="step">
                        Paso 1 de 3
                    </span>
                    Tipos de Cultivos
                    <span class="textline">
                        Seleccione su tipo de cultivo
                    </span>
                </h2>
            </article>
        </section>
    </section>
    <!-- End  title -->
    <!-- content -->
    <section class="row content">
        <section class="small-10 medium-9 small-centered column text-center">
            <ul class="row small-up-4 medium-up-5 list-icon-cultivo" id="list-cultivo">
                @forelse($data as $key => $value)
                    <li class ="column icon-cultivo text-center" >
                        <a href="{!! route('stepOne', $value -> id !!}">
                            <img src="{!! asset( 'media/type-crops/'. $value -> icon )!!}" alt="{!! $value -> crops !!}">
                            <h3>
                                {!! $value -> crops !!}
                                {!! $value -> id !!}
                            </h3>
                        </a>
                    </li>
                @empty
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button stage="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        {{ trans('admin.message.no_records_found') }}
                    </div>
                @endforelse
            </ul>
        </section>
    </section>
    <!-- End  content -->
@endsection

@section('bottom')
    <section class="small-12 column text-center">
        <a href="cotizar.php">
            <img data-interchange="[images/ads/forkamix-mezclas-medidas-m.jpg, small], [images/ads/forkamix-mezclas-medidas-m.jpg, medium], [images/ads/forkamix-mezclas-medidas.jpg, large]"  alt="Forkamix a la medida" >
        </a>
    </section>
@endsection
@section('scripts')
    <script>
        {{-- SCRIPTS ANIMATE INDEX --}}
        function animateStepOne()
        {
            $("#list-cultivo li").each(function(indice, elemento) {
                duracion = 100 * indice;
                $(elemento).delay(duracion).animate({ marginTop: "5px", opacity:"1"},1000);
            });
        }
    </script>

    {{-- SCRIPTS MODAL --}}
    <script>
        $('.btnProductos').click(function (e) {
            e.preventDefault();
            $("#response-modalProductos").html("<p>Buscando...</p>");
            var row = $(this).parents('li');
            var name = row.data('name');
            $url = 'images/productos_description/' + name + ".jpg";
            $('#img_producto').attr("src",$url);

        });

        $(document).ready(function(){
            animateStepOne();
        });
    </script>

@endsection