@extends('core.master')
@section('title')
    CIAMSA - Paso 1 - Tipo de cultivo
@endsection
@section('class-section')
    wrapper-step-two
    @endsection
    @section('nav')
        <a href="{{ route('index')}}" class="button btn-sunflower"> <span class="icon-home" aria-hidden="true"></span> {{ trans('app.submit.home') }}</a>
        <a href="{{ route('stepOne') }}"  class="button btn-aqua"> <span class="icon-back" aria-hidden="true" style="padding-top:5px"></span> {{ trans('app.submit.back') }}</a>
        <a href="cotizar.php" class="button btn-ciamsa"> <span class="icon-user" aria-hidden="true"></span> {{ trans('app.submit.quote') }}</a>
    @endsection

    @section('content')
            <!-- title -->
    <section class="row header-title">
        <section class="small-10 small-centered column text-center">
            <article>
                <h2>
                    <span class="step">
                       {{ trans('app.app.step_2_3') }}
                    </span>
                    {{ trans('app.app.stage_crops') }}
                    <span class="textline">
                        {{ trans('app.app.select_stage_crops') }}
                    </span>
                </h2>
            </article>
        </section>
    </section>
    <!-- End  title -->
    <!-- content -->
    <section class="row content">

        <section class="small-10 @if($data -> cantType == 2) medium-8 @else medium-11 @endif small-centered column text-center">
            <ul class="row small-up-1 medium-up-{!! $data -> cantType !!}  list-image-cultivo" id="list-image-cultivo">
                @forelse($data as $key => $value)
                    <li class ="column text-center cultivo-{!! $key !!}"  >
                        <a href="{{ route('stepTwo', $value -> id) }}">
                            <img src="{!! asset( 'media/stage-crops/'. $value -> image )!!}" alt="" >
                            <h3>
                                {!! $value -> stage !!}
                            </h3>
                            <?php
                            if (isset( $value -> subline )){
                            ?> <p class="subline"> {!! $value -> subline !!}</p>
                            <?php
                            }
                            ?>
                        </a>
                    </li>
                @empty
                   <section class="small-6 small-centered">
                       <div class="alert alert-danger alert-dismissible fade in" role="alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                           {{ trans('app.app.no_stage_found') }}
                       </div>
                       <p>
                           <a href="{{ route('stepOne') }}" class="button btn-danger color-white"> <span class="icon-back" aria-hidden="true" style="padding-top:5px"></span>
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
            <img data-interchange="[{{asset('images/ads/solucion-uan-m.jpg')}} , small], [{{asset('images/ads/solucion-uan-m.jpg')}} , medium], [{{asset('images/ads/solucion-uan.jpg,')}} large ]"  alt="Solucion UAN" >
        </a>
    </section>
@endsection
@section('scripts')
    <script>
        {{-- SCRIPTS ANIMATE INDEX --}}
        function animateStepTwo()
        {
            $("#list-image-cultivo li").each(function(indice, elemento) {
                duracion = 150 * indice;
                $(elemento).delay(duracion).animate({ marginTop: "5px", opacity:"1"},1000);
            });
        }
    </script>

    {{-- SCRIPTS MODAL --}}
    <script>
        $(document).ready(function(){
            animateStepTwo();
        });
    </script>

@endsection