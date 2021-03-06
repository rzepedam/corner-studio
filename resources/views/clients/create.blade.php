@extends('layouts.layout')

@section('title') Crear Cliente @stop

@section('css')
    <link rel="stylesheet" href="{{ mix('css/create-custom-client.css') }}">
@stop

@section('title-header') Crear Nuevo Cliente @stop

@section('breadcrumb')
    <li><a href="{{ route('clients.index') }}">Clientes</a></li>
    <li class="active"><strong>Nuevo</strong></li>
@stop

@section('breadcrumb')
    <li><a href="{{ route('clients.index') }}">Clientes</a></li>
    <li class="active"><strong>Nuevo</strong></li>
@stop

@section('content')

    @include('layouts.messages.error')

    {{ Form::open(['route' => 'clients.store', 'method' => 'POST', 'id' => 'form-submit']) }}

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">

                    @include('clients.partials.fields')

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('clients.index') }}">Volver</a>
            <div id="spinner" class="sk-spinner sk-spinner-wave pull-right hide">
                <div class="sk-rect1"></div>
                <div class="sk-rect2"></div>
                <div class="sk-rect3"></div>
                <div class="sk-rect4"></div>
                <div class="sk-rect5"></div>
            </div>
            <button id="btnSubmit" type="submit" class="btn btn-primary pull-right">
                <i class="mdi mdi-floppy"></i> Guardar
            </button>
        </div>
    </div>

    {{ Form::close() }}

@stop

@section('scripts')

    <script src="{{ mix('js/create-edit-common.js') }}"></script>
    <script src="{{ mix('js/create-custom-client.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            $('.input-group.date').datepicker("setDate", "-18y");

        });
    </script>
@stop