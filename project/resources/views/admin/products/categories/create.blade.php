@extends('admin.layout.master')
@section('title' , trans('admin.products.create_categories'))
@section('content')

    <section class="row">
        <article class="col-md-12">
            <h1>
                {!! trans('admin.products.create_categories') !!}
            </h1>
            <p>
               {!! trans('admin.products.content_create_categories') !!}
            </p>
        </article>
    </section>

    {!! Form::open(['route' => 'admin.products.categories.store', 'method' => 'POST', 'class' => 'form-horizontal' , 'id' => 'form'])!!}
        <section class="form-group">
            <section class="col-md-12">
                @include('admin.partials.message')
            </section>
        </section>

        @include('admin.products.categories.partials.fields')

        <section class="form-group">
            <article class="col-sm-offset-2 col-sm-10">
                {!! Form::submit(trans('admin.submit.add'), ['class' => 'btn btn-primary' , 'id' => 'send-form']) !!}
                <a class="btn btn-danger" href="{{ route('admin.products.categories.index') }}">{{ trans('admin.submit.back') }}</a>
            </article>
        </section>
   {!! Form::close()!!}

@endsection

@section('scripts')
    @include('admin.products.categories.partials.scripts')
@endsection