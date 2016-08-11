@extends('core.master')

@section('title')
   {!! trans ('app.app.quoter_title') !!}
@endsection

@section('class-section')
    wrapper-cotizar
@endsection

@section('nav')
    <a href="{{ route('index')}}" class="button btn-sunflower"> <span class="icon-home" aria-hidden="true"></span> {{ trans('app.submit.home') }}</a>
    <a href="{{ URL::previous() }}"  class="button btn-aqua"> <span class="icon-back" aria-hidden="true" style="padding-top:5px"></span> {{ trans('app.submit.back') }}</a>
@endsection

    @section('content')
        <!-- BG PAPER -->
        <section class="bg-paper expanded">
            <!--  CONTENT -->
            <section class="content">
                <!-- title -->
                <section class="row header-title text-center">
                    <article class="small-12 small-centered column text-center">
                        <h2>
                            {!! trans ('app.app.quoter_title') !!}
							<span class="textline">
								{!! trans ('app.app.quoter_description') !!}
							</span>
                        </h2>
                    </article>
                </section>
                <!-- End  title -->
            </section>
            <!-- END CONTENT -->
            <!-- FORM -->
            <section class="row form-cotizar text-center">
                <section class="small-12 medium-8 columns medium-centered">
                    {!! Form::open(['route' => 'quote.create', 'method' => 'POST', 'class' => 'form-horizontal' , 'id' => 'form'])!!}
                        @include('core.quote.fields')
                    {!! Form::close()!!}
                </section>
            </section>
            <!-- END FORM -->
        </section>
        <!-- END BG PAPER -->
@endsection

@section('bottom')
    <section class="small-12 column text-center">
        <img data-interchange="[{{asset('images/ads/nitroeffi-m.jpg')}} , small], [{{asset('images/ads/nitroeffi-m.jpg')}} , medium], [{{asset('images/ads/nitroeffi.jpg')}}, large]"  alt="Solucion UAN" >
    </section>
@endsection
@section('scripts')


@endsection