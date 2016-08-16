@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
<section class="row">
    <article class="col-md-12">
        <h1 class="title_main text-center">
            {{ trans('admin.admin.admin_title') }}

        </h1>
    </article>
</section>
<section class="row">
    <section class="col-xs-12">
        <table class="table table-striped table-hover table-condensed">
            <tr>
                <th>Detalles</th>
                <th>Accion</th>
            </tr>
            <tr>
                <td>
                    Crear tipo de cultivos
                </td>
                <td>
                    <a href="{!! route('admin.crops.type.index') !!}"> Ir a</a>
                </td>
            </tr>
            <tr>
                <td>
                    Crear etapas del cultivo
                </td>
                <td>
                    <a href="{!! route('admin.crops.stage.index') !!}"> Ir a</a>
                </td>
            </tr>
            <tr>
                <td>
                    Crear categorias
                </td>
                <td>
                    <a href="{!! route('admin.products.categories.index') !!}"> Ir a</a>
                </td>
            </tr>
            <tr>
                <td>
                    Crear productos
                </td>
                <td>
                    <a href="{!! route('admin.products.products.index') !!}"> Ir a</a>
                </td>
            </tr>
            <tr>
                <td>
                    Relacion Productos y categorias
                </td>
                <td>
                    <a href="{!! route('admin.tsProducts.index') !!}"> Ir a</a>
                </td>
            </tr>
            <tr>
                <td>
                    Registros
                </td>
                <td>
                    <a href="{!! route('admin.register.index') !!}"> Ir a</a>
                </td>
            </tr>
            <tr>
                <td>
                    Aplicacion
                </td>
                <td>
                    <a href="{!! route('index') !!}"> Ir a</a>
                </td>
            </tr>
        </table>
    </section>
</section>
</div>
@endsection
