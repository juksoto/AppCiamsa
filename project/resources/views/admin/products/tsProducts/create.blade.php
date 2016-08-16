@extends('admin.layout.master')
@section('title' , trans('admin.products.create_tsProducts'))
@section('content')
    <section class="row">
        <article class="col-md-12">
            <h1>
                {!! trans('admin.products.create_tsProducts') !!}
            </h1>
            <p>
               {!! trans('admin.products.create_content_header_tsProducts') !!}
            </p>
        </article>
    </section>

    {!! Form::open(['route' => 'admin.tsProducts.store', 'method' => 'POST', 'class' => 'form-horizontal' , 'id' => 'form'])!!}
        <section class="form-group">
            <section class="col-md-12">
                @include('admin.partials.message')
            </section>
        </section>

        @include('admin.products.tsProducts.partials.fields')

        <section class="form-group">
            <article class="col-sm-offset-2 col-sm-10">
                {!! Form::submit(trans('admin.submit.add'), ['class' => 'btn btn-primary' , 'id' => 'send-form']) !!}
                <a class="btn btn-danger" href="{{ route('admin.tsProducts.index') }}">{{ trans('admin.submit.back') }}</a>
            </article>
        </section>
   {!! Form::close()!!}

    <section class="">
        {!! Form::open(['route' => ['admin.tsProducts.show', ':VALUE_ID'], 'method' => 'GET', 'class' => '' , 'id' => 'form-crops-type'])!!}
        {!! Form::close()!!}
    </section>
@endsection

@section('scripts')
    @include('admin.products.tsProducts.partials.scripts')
    <script text="text/javascript" src="{{URL::asset('assets/admin/js/custom/custom.js')}}"></script>
@endsection