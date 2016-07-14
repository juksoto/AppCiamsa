@extends('admin.layout.master')
@section('title' , trans('admin.crops.edit_tsCrop_title'))
@section('content')

    <section class="row">
        <article class="col-md-12">
            <h1>
                {!! trans('admin.crops.edit_tsCrop_title') !!} {!! $data -> typeCrop -> crops!!}
            </h1>
            <p>
                {!! trans('admin.crops.content_header_tsCrop_crops_edit') !!}
            </p>
        </article>
    </section>


    {!! Form::model($data -> stageCrop,['route' => ['admin.crops.tsCrop.update', $data -> stageCrop], 'method' => 'PUT', 'class' => 'form-horizontal',  'id' => 'form' ])!!}

    <section class="form-group">
        <section class="col-md-12">
            @include('admin.partials.message')
        </section>
    </section>

    <!-- Section Fields -->
        @include('admin.crops.tsCrop.partials.fields')
    <!-- End Section Fields -->

    <!-- ID Tipo y Etapa del Cultivo -->
    {!! Form::hidden('stageHasTypeCrop' ,$data -> stageHasTypeCrop ) !!}
    <!-- End ID Tipos de Cultivo -->


    <!-- Section Buttons -->
    <section class="form-group">

        <!-- Button Submit and Cancel -->
        <article class="col-md-offset-2 col-sm-6 text-md-left text-xs-center col-xs-12 col-md-4">
            {!! Form::submit(trans('admin.submit.update'), ['class' => 'btn btn-primary' , 'id' => 'send-form']) !!}
            <a class="btn btn-danger" href="{{ route ('admin.crops.tsCrop.show', $data -> typeCrop -> id ) }}">{{ trans('admin.submit.back') }}</a>
        </article>
        <!-- End Button Submit and Cancel -->
        {!! Form::close()!!}
        <!-- Button Destroy -->
        <article class="col-md-offset-4 col-md-2 col-sm-6 col-xs-12 col-sm-offset-0 text-sm-right text-xs-center margin-xs-top no-margin-sm-top">
<?php /*
            {!! Form::open(['route' => ['admin.crops.tsCrop.destroy', array($collection, 'type' => $data -> collections-> id ), 'method' => 'DELETE', 'class' => '' ])!!}

            @if ($data -> collection -> active == true)
                {!! Form::submit(trans('admin.submit.unpublish'), ['class' => 'btn btn-warning']) !!}
                @else
                {!! Form::submit(trans('admin.submit.publish'), ['class' => 'btn btn-success']) !!}
            @endif

            {!! Form::close()!!}
-->*/ ?>
        </article>
        <!-- End Button Destroy -->
    </section>
    <!-- End Section Buttons -->

@endsection

@section('scripts')
    @include('admin.crops.tsCrop.partials.scripts')
@endsection