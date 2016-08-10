@extends('core.master')
@section('title')
    {{ trans('app.app.fertilizer_title') }}
@endsection
@section('class-section')
    wrapper-step-three
@endsection
@section('nav')
    <a href="{{ route('index')}}" class="button btn-sunflower"> <span class="icon-home" aria-hidden="true"></span> {{ trans('app.submit.home') }}</a>
    <a href="{{ route('stepTwo' , $data -> type_id) }}"  class="button btn-aqua"> <span class="icon-back" aria-hidden="true" style="padding-top:5px"></span> {{ trans('app.submit.back') }}</a>
    <a href="cotizar.php" class="button btn-ciamsa"> <span class="icon-user" aria-hidden="true"></span> {{ trans('app.submit.quote') }}</a>
    @endsection

    @section('content')
            <!-- title -->
    <section class="row header-title">
        <section class="small-10 small-centered column text-center">
            <article>
                <h2>
                    <span class="step">
                       {{ trans('app.app.step_3_3') }}
                    </span>
                    {{ trans('app.app.fertilizer_title') }}
                    <span class="textline">
                        {{ trans('app.app.fertilzer_description_one') . $data -> type . trans('app.app.fertilzer_description_two') . $data -> stage . trans('app.app.fertilzer_description_three')  }}
                    </span>
                </h2>
            </article>
        </section>
    </section>
    <!-- End  title -->
    <!-- content -->
    <section class="row content">

        <section class="small-12 medium-11 small-centered column text-center list-fertilizantes" >
            <ul class="row small-up-3 medium-up-5 list-fertilizantes" id="list-fertilizantes">
                @forelse($data as $key => $value )
                    <li class="column text-center etapa-{!! $data -> stage_id  !!} tipo-{!! $data -> type_id  !!}"  data-id="{!! $value['id'] !!}" data-etapa="{!! $data -> stage  !!}" data-tipo="{!! $data -> type !!}">
                        <a data-open="modalProductos" class="btnReferencia" >
                            <img src="{{asset('media/products/'. $value['category_slug'].'/'. $value['image'])}}" alt="{!! $value['category'] !!} {!! $value['product'] !!}">
                            <h4>
                                {!! $value['category'] !!} {!! $value['product'] !!}
                            </h4>
                        </a>
                    </li>
                @empty
                    <section class="small-6 small-centered">
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            {{ trans('app.app.no_stage_found') }}
                        </div>
                        <p>
                            <a href="{{ route('stepTwo' , $data -> type_id ) }}" class="button btn-danger color-white"> <span class="icon-back" aria-hidden="true" style="padding-top:5px"></span>
                                {{ trans('app.submit.back') }}
                            </a>
                        </p>
                    </section>
                @endforelse
            </ul>
        </section>
    </section>
    <!-- End  content -->
@endsection

@section('bottom')
    <section class="small-12 column text-center">
        <a href="cotizar.php">
            <img data-interchange="[{{asset('images/ads/nitroeffi-m.jpg')}} , small], [{{asset('images/ads/nitroeffi-m.jpg')}} , medium], [{{asset('images/ads/nitroeffi.jpg')}}, large]"  alt="Solucion UAN" >
        </a>
    </section>
@endsection
@section('scripts')
    <script>
        {{-- SCRIPTS ANIMATE INDEX --}}
        function animateStepThree()
        {
            $("#list-fertilizantes li").each(function(indice, elemento) {
                duracion = 150 * indice;
                $(elemento).delay(duracion).animate({ marginTop: "5px", opacity:"1"},1000);
            });
        }
    </script>

    {{-- SCRIPTS MODAL --}}
    <script>
        $(document).ready(function(){
            animateStepThree();
        });
    </script>

@endsection