@extends('admin.layout.master')
@section('title' , trans('admin.products.create_products'))
@section('content')

    <section class="row">
        <article class="col-md-12">
            <h1>
                {!! trans('admin.products.create_products') !!}
            </h1>
            <p>
               {!! trans('admin.products.content_create_products') !!}
            </p>
        </article>
    </section>

    {!! Form::open(['route' => 'admin.products.products.store', 'method' => 'POST', 'class' => 'form-horizontal' , 'id' => 'form', 'files' => true])!!}
        <section class="form-group">
            <section class="col-md-12">
                @include('admin.partials.message')
            </section>
        </section>

        @include('admin.products.products.partials.fields')

        <section class="form-group">
            <article class="col-sm-offset-2 col-sm-10">
                {!! Form::submit(trans('admin.submit.add'), ['class' => 'btn btn-primary' , 'id' => 'send-form']) !!}
                <a class="btn btn-danger" href="{{ route('admin.products.products.index') }}">{{ trans('admin.submit.back') }}</a>
            </article>
        </section>
   {!! Form::close()!!}

@endsection

@section('scripts')
    @include('admin.products.products.partials.scripts')
@endsection