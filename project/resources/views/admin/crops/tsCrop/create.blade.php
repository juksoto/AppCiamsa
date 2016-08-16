@extends('admin.layout.master')
@section('title' , trans('admin.crops.title_tsCrop_crops_stage'))
@section('content')
    <section class="row">
        <article class="col-md-12">
            <h1>
                {!! trans('admin.crops.title_tsCrop_crops_stage') !!} @if (isset($data -> typeCrop)) -  {!! $data -> typeCrop -> crops  !!} @endif
            </h1>
            <p>
               {!! trans('admin.crops.content_header_tsCrop_crops') !!}
            </p>
        </article>
    </section>

    {!! Form::open(['route' => 'admin.crops.tsCrop.store', 'method' => 'POST', 'class' => 'form-horizontal' , 'id' => 'form'])!!}
        <section class="form-group">
            <section class="col-md-12">
                @include('admin.partials.message')
            </section>
        </section>

        @include('admin.crops.tsCrop.partials.fields')

        <section class="form-group">
            <article class="col-sm-offset-2 col-sm-10">
                {!! Form::submit(trans('admin.submit.add'), ['class' => 'btn btn-primary' , 'id' => 'send-form']) !!}
                <a class="btn btn-danger" href="{{ route('admin.crops.tsCrop.index') }}">{{ trans('admin.submit.back') }}</a>
            </article>
        </section>
   {!! Form::close()!!}

@endsection

@section('scripts')
    @include('admin.crops.tsCrop.partials.scripts')
@endsection