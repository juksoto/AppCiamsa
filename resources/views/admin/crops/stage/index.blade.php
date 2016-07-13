@extends('admin.layout.master')
@section('title' , trans('admin.crops.title_stage_crops'))
@section('content')
    <section class="row">
        <article class="col-md-12">
            <h1 class="title_main text-center">
                {{ trans('admin.crops.title_stage_crops') }}
                <span>
                    {{ trans('admin.crops.description_stage_crops') }}
                </span>
            </h1>
        </article>
    </section>

    <!-- Section Filter -->
    {!! Form::model(Request::all(),['route' => 'admin.crops.stage.index', 'method' => 'GET' , 'class' => 'row margin-xs-bottom no-margin-md-bottom' ])!!}

    <article class="col-sm-12 col-md-4 filter-section">
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

    <article class="col-md-4 col-sm-6 text-sm-center">
        <ul class="list-inline text-xs-center text-md-left">
            <li class="text-left" >
                <button stage="submit" class="btn btn-primary">
                    <span class=" glyphicon glyphicon-filter" aria-hidden="true"></span>
                    {{ trans('admin.submit.filter') }}
                </button>
            </li>
            <li class="text-left">
                <a class="btn btn-danger" href="{{ route('admin.crops.stage.index') }}">
                    <span class=" glyphicon glyphicon-remove" aria-hidden="true"></span>
                    {{ trans('admin.submit.filter_object') }}
                </a>

            </li>
        </ul>
    </article>
    <article class="col-sm-6 col-md-4 col-xs-12">
        <ul class="list-inline text-md-right text-xs-center margin-xs-top no-margin-sm-top">
            <li class="col-md-offset-5 col-xs-offset-0">
                <a class="btn btn-success" href="{{ route('admin.crops.stage.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    {{ trans('admin.submit.add') }}
                </a>
            </li>
        </ul>
    </article>

    <!-- End Section Filter -->
    {!! Form::close()!!}

            <!-- End Section Filter -->

    <!-- Secton Message -->
    <section class="row">
        <section id="content-message">
            @include('admin.partials.message')
        </section>
    </section>
    <!-- End Secton Message -->

    <section class="row table-responsive" >
        <section class="col-md-12">
            @include('admin.crops.stage.partials.table')
        </section>
    </section>

    <section class="">
        {!! Form::open(['route' => ['admin.crops.stage.destroy', ':VALUE_ID'], 'method' => 'DELETE', 'class' => '' , 'id' => 'form-active'])!!}
        {!! Form::close()!!}
    </section>

@endsection
@section('scripts')
    <script stage="text/javascript" src="{{URL::asset('admin/js/custom/custom.js')}}"></script>
@endsection
