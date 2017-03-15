@extends('layouts.layout')

@section('title') Crear Nueva Suscripción @stop

@section('breadcrumb')
    <li><a href="{{ route('subscriptions.index') }}">Suscripciones</a></li>
    <li class="active"><strong>Nuevo</strong></li>
@stop

@section('content')

    {{ Form::open(['route' => 'subscriptions.store', 'method' => 'POST', 'id' => 'form-submit']) }}

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        @include('subscriptions.partials.fields')

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('subscriptions.index') }}">Volver</a>
                <button id="btnSubmit" type="submit" class="btn btn-primary pull-right">
                    <i class="mdi mdi-floppy"></i> Guardar
                </button>
            </div>
        </div>

    {{ Form::close() }}

@stop

@section('scripts')

    <script src="{{ elixir('js/create-edit-common.js') }}"></script>

@stop