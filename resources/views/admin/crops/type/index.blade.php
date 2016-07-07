@extends('admin.layout.master')
@section('title' , trans('admin.crops.title_type_crops'))
@section('content')
    <section class="row">
        <article class="col-md-12">
            <h1 class="title_main text-center">
                {{ trans('admin.crops.title_type_crops') }}
                <span>
                    {{ trans('admin.crops.description_type_crops') }}
                </span>
            </h1>
        </article>
    </section>
    <section class="row text-center">
        <section class="col-md-12">
            <a class="btn btn-success btn-margin" href="{{ route('admin.crops.type.create') }}">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                {{ trans('admin.submit.add') }}
            </a>
        </section>

    </section>
    <section class="row">
        <section id="content-message">
            @include('admin.partials.message')
        </section>
    </section>
    <section class="row row-centered">
        <section class="col-md-8 col-centered">
            @include('admin.crops.type.partials.table')
        </section>
    </section>



@endsection