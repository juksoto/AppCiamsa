@extends('admin.layout.master')
@section('title' , trans('admin.products.edit_categories'))
@section('content')

    <section class="row">
        <article class="col-md-12">
            <h1>
                {!! trans('admin.products.edit_categories') !!}
            </h1>
            <p>
                {!! trans('admin.products.content_edit_categories') !!}
            </p>
        </article>
    </section>


    {!! Form::model($data -> collection,['route' => ['admin.products.categories.update', $data -> collection], 'method' => 'PUT', 'class' => 'form-horizontal',  'id' => 'form' ])!!}

    <section class="form-group">
        <section class="col-md-12">
            @include('admin.partials.message')
        </section>
    </section>

    <!-- Section Fields -->
        @include('admin.products.categories.partials.fields')
    <!-- End Section Fields -->

    <!-- Section Buttons -->
    <section class="form-group">

        <!-- Button Submit and Cancel -->
        <article class="col-md-offset-2 col-sm-6 text-md-left text-xs-center col-xs-12 col-md-4">
            {!! Form::submit(trans('admin.submit.update'), ['class' => 'btn btn-primary' , 'id' => 'send-form']) !!}
            <a class="btn btn-danger" href="{{ route('admin.products.categories.index') }}">{{ trans('admin.submit.back') }}</a>
        </article>
        <!-- End Button Submit and Cancel -->
        {!! Form::close()!!}
        <!-- Button Destroy -->
        <article class="col-md-offset-4 col-md-2 col-sm-6 col-xs-12 col-sm-offset-0 text-sm-right text-xs-center margin-xs-top no-margin-sm-top">

            {!! Form::open(['route' => ['admin.products.categories.destroy', $data -> collection], 'method' => 'DELETE', 'class' => '' ])!!}

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

@endsection

@section('scripts')
    @include('admin.products.categories.partials.scripts')
@endsection