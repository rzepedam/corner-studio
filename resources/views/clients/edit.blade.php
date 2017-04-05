@extends('layouts.layout')

@section('title') Editar Cliente @stop

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/create-custom-client.css') }}">

@stop

@section('breadcrumb')
    <li><a href="{{ route('clients.index') }}">Clientes</a></li>
    <li class="active"><strong>Editar</strong></li>
@stop

@section('content')

    @include('layouts.messages.error')

    {{ Form::model($client, ['route' => ['clients.update', $client], 'method' => 'PUT', 'id' => 'form-submit']) }}

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
                <div id="spinner" class="sk-spinner sk-spinner-three-bounce pull-right hide">
                    <div class="sk-bounce1"></div>
                    <div class="sk-bounce2"></div>
                    <div class="sk-bounce3"></div>
                </div>
                <button id="btnSubmit" type="submit" class="btn btn-primary pull-right">
                    <i class="mdi mdi-cached"></i> Actualizar
                </button>
            </div>
        </div>

    {{ Form::close() }}

@stop

@section('scripts')

    <script src="{{ elixir('js/create-edit-common.js') }}"></script>
    <script src="{{ elixir('js/create-custom-client.js') }}"></script>

@stop