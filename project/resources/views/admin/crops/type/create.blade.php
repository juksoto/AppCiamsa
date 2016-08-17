@extends('admin.layout.master')
@section('title' , trans('admin.crops.title_type_crops'))
@section('content')

    <section class="row">
        <article class="col-md-12">
            <h1>
                {!! trans('admin.crops.new_type_crops') !!}
            </h1>
            <p>
               {!! trans('admin.crops.content_header_type_crops') !!}
            </p>
        </article>
    </section>

    {!! Form::open(['route' => 'admin.crops.type.store', 'method' => 'POST', 'class' => 'form-horizontal' , 'id' => 'form', 'files' => true])!!}
        <section class="form-group">
            <section class="col-md-12">
                @include('admin.partials.message')
            </section>
        </section>

        @include('admin.crops.type.partials.fields')

        <section class="form-group">
            <article class="col-sm-offset-2 col-sm-10">
                {!! Form::submit(trans('admin.submit.add'), ['class' => 'btn btn-primary' , 'id' => 'send-form']) !!}
                <a class="btn btn-danger" href="{{ route('admin.crops.type.index') }}">{{ trans('admin.submit.back') }}</a>
            </article>
        </section>
   {!! Form::close()!!}

@endsection

@section('scripts')
    @include('admin.crops.type.partials.scripts')
@endsection