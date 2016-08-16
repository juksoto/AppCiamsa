@extends('admin.layout.master')
@section('title' , trans('admin.register.register_title'))
@section('content')
    <section class="row">
        <article class="col-md-12">
            <h1 class="title_main text-center">
                {{ trans('admin.register.register_title') }}
                <span>
                    {{ trans('admin.register.register_description') }}
                </span>
            </h1>
        </article>
    </section>

    <section class="row">
        <section class="col-sm-7">
            <!-- Section Filter -->
            {!! Form::model(Request::all(),['route' => 'admin.register.index', 'method' => 'GET' , 'class' => 'row margin-xs-bottom no-margin-md-bottom' ])!!}

            <article class="col-sm-12 col-sm-6 filter-section">
                <div class="row">
                    <!-- Search Field -->
                    <div class="col-sm-8">
                        <div class="form-search search-only form-group">
                            <i class="search-icon glyphicon glyphicon-search"></i>
                            {!! Form::text('search', null, ['class' => 'form-control search-query', 'placeholder' => trans('admin.filter.search') ])  !!}
                        </div>
                    </div>
                    <!-- End Search Field -->

                    <!-- Active Select -->
                    <div class="col-sm-4 no-padding">
                        {!! Form::select ('active' , config('CiamsaApp.active') , null , [ 'class' => 'form-control col-sm-2']) !!}
                    </div>
                    <!-- End Active Select -->
                </div>
            </article>

            <article class="col-md-6 col-sm-6 text-sm-center">
                <ul class="list-inline text-xs-center text-md-left">
                    <li class="text-left" >
                        <button type="submit" class="btn btn-primary">
                            <span class=" glyphicon glyphicon-filter" aria-hidden="true"></span>
                            {{ trans('admin.submit.filter') }}
                        </button>
                    </li>
                    <li class="text-left">
                        <a class="btn btn-danger" href="{{ route('admin.crops.type.index') }}">
                            <span class=" glyphicon glyphicon-remove" aria-hidden="true"></span>
                            {{ trans('admin.submit.filter_object') }}
                        </a>

                    </li>
                </ul>
            </article>
            {!! Form::close()!!}
                    <!-- End Section Filter -->
            <!-- Section Ranks -->
        </section>


        <article class="col-xs-12 col-sm-12 col-md-4 ">
            {!! Form::open(['route' => 'admin.register.report', 'method' => 'POST' , 'class' => '' ])!!}
            <section class="row">
                  <section class="col-xs-12 col-sm-6">
                    <select name="cantRegistros" id="" @if ($collection -> countRegister == 0)  disabled="disabled" @endif required>
                        <option value=""> Seleccione el rango </option>
                        @if ($collection -> countRegister != 0)

                            @foreach($collection -> options as $option )
                                <option value="{!! $option['rankStart']!!}|{!! $option['rankEnd']!!}"> {!! $option['rankStart']!!} a {!! $option['rankEnd']!!}</option>
                            @endforeach
                        @endif
                    </select>

                </section>
                <section class="col-xs-12 col-sm-6">
                    {!! Form::submit(trans('admin.submit.download'), ['class' => 'btn btn-success ' , 'id' => 'send-form']) !!}
                </section>
            </section>
            {!! Form::close()!!}
        </article>



                <!-- End Section Filter -->
    </section>




    <!-- Secton Message -->
    <section class="row">
        <section id="content-message">
            @include('admin.partials.message')
        </section>
    </section>
    <!-- End Secton Message -->

    <section class="row row-centered">
        <section class="col-md-12">
            @include('admin.register.partials.table')
            {{ $collection -> render() }}
        </section>
    </section>

    <section class="">
        {!! Form::open(['route' => ['admin.crops.type.destroy', ':VALUE_ID'], 'method' => 'DELETE', 'class' => '' , 'id' => 'form-active'])!!}
        {!! Form::close()!!}
    </section>

@endsection
@section('scripts')
    <script type="text/javascript" src="{{URL::asset('admin/js/custom/custom.js')}}"></script>
@endsection
