@extends('core.master')
@section('title')
    {{ trans('app.app.type_crops') }}
@endsection
@section('class-section')
    wrapper-step-one
@endsection
@section('nav')
    <a href="{{ route('index')}}" class="button btn-sunflower"> <span class="icon-home" aria-hidden="true"></span> {{ trans('app.submit.home') }}</a>
    <a href="{!! route('quote') !!}" class="button btn-ciamsa"> <span class="icon-user" aria-hidden="true"></span> {!! trans('app.submit.quote') !!}</a>
@endsection

    @section('content')
        <!-- title -->
    <section class="row header-title">
        <section class="small-10 small-centered column text-center">
            <article>
                <h2>
                    <span class="step">
                       {{ trans('app.app.step_1_3') }}
                    </span>
                    {{ trans('app.app.type_crops') }}
                    <span class="textline">
                        {{ trans('app.app.select_type_crops') }}
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
                        <a href="{{ route('stepTwo', $value -> id) }}">
                            <img src="{!! asset( 'media/type-crops/'. $value -> icon )!!}" alt="{!! $value -> crops !!}">
                            <h3>
                                {!! $value -> crops !!}
                            </h3>
                        </a>
                    </li>
            @empty
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    {{ trans('app.app.no_type_found') }}
                </div>
            @endforelse
            </ul>
        </section>
    </section>
    <!-- End  content -->
@endsection

@section('bottom')
    <section class="small-12 column text-center">
        <a href="{!! route('quote') !!}">
            <img data-interchange="[{{asset('images/ads/forkamix-mezclas-medidas-m.jpg')}}, small], [{{asset('images/ads/forkamix-mezclas-medidas-m.jpg') }}, medium], [{{asset('images/ads/forkamix-mezclas-medidas.jpg') }}, large]"  alt="Forkamix a la medida" >
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

        $(document).ready(function(){
            animateStepOne();
        });
    </script>

@endsection