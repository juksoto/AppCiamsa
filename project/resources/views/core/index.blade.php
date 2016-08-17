@extends('core.master')

@section('title')
    {!! trans('app.app.index_title') !!}
@endsection

@section('class-section')
    wrapper-step
@endsection

@section('nav')
            <a href="{!! route('quote') !!}" class="button btn-ciamsa hide-for-small-only"> <span class="icon-user" aria-hidden="true"></span> {!! trans('app.submit.quote') !!}</a>
@endsection

@section('content')
    <section class="row">
        <section class="small-12 column">
            @include('core.partials.message')
        </section>
    </section>
        <!-- Logos -->
    <section class="row hide-for-small-only">
        <section class="small-10 small-centered column text-center">
            <ul class="row small-up-2 medium-up-4 list-logo" >
                <li class="column text-center" data-name="forkamix">
                    <a data-open="productosModal" class="btnProductos" >
                        <img src="{{ asset( 'images/logo_forkamix.png' )}}" alt="Forkamix">
                    </a>
                </li>
                <li class="column text-center" data-name="nutrikimia">
                    <a data-open="productosModal" class="btnProductos" >
                        <img src="{{ asset( 'images/logo_nutrikimia.png' )}}" alt="Nutrikimia">
                    </a>
                </li>
                <li class="column text-center"  data-name="nitroeffi">
                    <a data-open="productosModal" class="btnProductos">
                        <img src="{{ asset( 'images/logo_nitroeffi.png' )}}" alt="Nitro Effi100">
                    </a>
                </li>
                <li class="column text-center" data-name="solucionuan">
                    <a data-open="productosModal" class="btnProductos" >
                        <img src="{{ asset( 'images/logo_solucion_uan.png' )}}" alt="Solucion UAN">
                    </a>
                </li>
            </ul>
        </section>
    </section>
    <!-- End  Logos -->
    <!-- header image -->
    <section class="row header-image">
        <section class="small-12 column text-center">
            <a href="{{route('stepOne')}}">
                <img src="{{ asset( 'images/producto_nutrir_su_cultivo.png')}}" alt="Conozca el producto para nutrir su cultivo" width="490">
            </a>
            <h1>Conozca
						<span class="color-ciamsa2">
							el producto
						</span>
						<span class="small">
							para nutrir su cultivo
						</span>
            </h1>
            <section class="row">
                <article class="small-7 medium-3 column text-center small-centered medium-centered">
                    <a href="{{ route('stepOne') }}" class="button btn-grapefruit expanded ">
                        Iniciar aquí
                    </a>
                </article>
            </section>
            <section class="row">
                <article class="small-7 medium-3  column text-center small-centered">
                    <a href="{{ route('quote') }}" class="button btn-ciamsa expanded show-for-small-only">
                        <span class="icon-user" aria-hidden="true"></span> Solicitar cotización
                    </a>
                </article>
            </section>

        </section>
    </section>
    <!-- End  header image -->
    <!-- Logos Small -->
    <section class="row show-for-small-only">
        <section class="small-12 small-centered column text-center">
            <ul class="row small-up-2  list-logo-small" >
                <li class="column text-center" data-name="forkamix">
                    <a data-open="productosModal" class="btnProductos" >
                        <img src="{{ asset( 'images/logo_forkamix.png')}}" alt="Forkamix">
                    </a>
                </li>
                <li class="column text-center" data-name="nutrikimia">
                    <a data-open="productosModal" class="btnProductos" >
                        <img src="{{ asset( 'images/logo_nutrikimia.png')}}" alt="Nutrikimia">
                    </a>
                </li>
                <li class="column text-center"  data-name="nitroeffi">
                    <a data-open="productosModal" class="btnProductos">
                        <img src="{{ asset( 'images/logo_nitroeffi.png')}}" alt="Nitro Effi100">
                    </a>
                </li>
                <li class="column text-center" data-name="solucionuan">
                    <a data-open="productosModal" class="btnProductos" >
                        <img src="{{ asset( 'images/logo_solucion_uan.png')}}" alt="Solucion UAN">
                    </a>
                </li>
            </ul>
        </section>
    </section>
    <!-- End  Logos Small -->

    <section class="">
        {!! Form::open(['route' => ['modal', ':VALUE_ID'], 'method' => 'POST', 'class' => '' , 'id' => 'form-modal'])!!}
        {!! Form::close()!!}
    </section>

    @include('core.index.modal')
@endsection

@section('bottom')
    <section class="small-12 column text-center">
        <img src="{{asset('images/bottom-ciamsa.png') }}" alt="Expertos en mezclas" width="694">
    </section>
@endsection
@section('scripts')
    <script>
        {{-- SCRIPTS ANIMATE INDEX --}}
        function animateIndex()
        {
            $('.list-logo').fadeIn("slow");
            $('.header-image img').animate({ marginTop:"10px" , opacity:"1"},1000);
            $('.header-image h1 ').delay(100).animate({ marginTop:"0px" , opacity:"1"},1000);
            $('.header-image .button ').delay(100).animate({ marginTop:"5px" , opacity:"1"},1000);
            $("#paraanimar").animate({paddingBottom:"150px"},3000);
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
            animateIndex();
        });

    </script>

@endsection