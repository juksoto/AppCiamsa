@extends('admin.layout.master')
@section('title' , trans('admin.products.edit_tsProducts'))
@section('content')

    <section class="row">
        <article class="col-md-12">
            <h1>
                {!! trans('admin.products.edit_tsProducts') !!}
            </h1>
            <p>
                {!! trans('admin.crops.content_header_tsCrop_crops_edit') !!}
            </p>
        </article>
    </section>


    {!! Form::model($data -> collection,['route' => ['admin.tsProducts.update', $data -> collection], 'method' => 'PUT', 'class' => 'form-horizontal',  'id' => 'form' ])!!}

    <section class="form-group">
        <section class="col-md-12">
            @include('admin.partials.message')
        </section>
    </section>

    <!-- Section Fields -->
        @include('admin.products.tsProducts.partials.fields')
    <!-- End Section Fields -->

    <!-- Section Buttons -->
    <section class="form-group">

        <!-- Button Submit and Cancel -->
        <article class="col-md-offset-2 col-sm-6 text-md-left text-xs-center col-xs-12 col-md-4">
            {!! Form::submit(trans('admin.submit.update'), ['class' => 'btn btn-primary' , 'id' => 'send-form']) !!}
            <a class="btn btn-danger" href="{{ route ('admin.tsProducts.index') }}">{{ trans('admin.submit.back') }}</a>
        </article>
        <!-- End Button Submit and Cancel -->
        {!! Form::close()!!}
        <!-- Button Destroy -->
        <article class="col-md-offset-4 col-md-2 col-sm-6 col-xs-12 col-sm-offset-0 text-sm-right text-xs-center margin-xs-top no-margin-sm-top">
            {!! Form::open(['route' => ['admin.tsProducts.destroy', $data -> collection ], 'method' => 'DELETE', 'class' => '' ])!!}

            @if ($data -> collection -> active == true)
                {!! Form::submit(trans('admin.submit.unpublish'), ['class' => 'btn btn-warning']) !!}
                @else
                {!! Form::submit(trans('admin.submit.publish'), ['class' => 'btn btn-success']) !!}
            @endif

            {!! Form::close()!!}

        </article>
        <!-- End Button Destroy -->
    </section>
    <!-- End Section Buttons -->

    <section class="">
        {!! Form::open(['route' => ['admin.tsProducts.show', ':VALUE_ID'], 'method' => 'GET', 'class' => '' , 'id' => 'form-crops-type'])!!}
        {!! Form::close()!!}
    </section>

@endsection

@section('scripts')
    @include('admin.products.tsProducts.partials.scripts')
    <script tsCrop="text/javascript" src="{{URL::asset('assets/admin/js/custom/custom.js')}}"></script>
@endsection