@extends('layouts.layout')

@section('title') Crear Nueva Actividad @stop

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/create-custom-activity.css') }}">

@stop

@section('breadcrumb')
    <li><a href="{{ route('activities.index') }}">Actividades</a></li>
    <li class="active"><strong>Nuevo</strong></li>
@stop

@section('content')

    {{ Form::open(['route' => 'activities.store', 'method' => 'POST', 'id' => 'form-submit']) }}

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        @include('activities.partials.fields')

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('activities.index') }}">Volver</a>
                <button id="btnSubmit" type="submit" class="btn btn-primary pull-right">
                    <i class="mdi mdi-floppy"></i> Guardar
                </button>
            </div>
        </div>

    {{ Form::close() }}

@stop

@section('scripts')

    <script src="{{ elixir('js/create-edit-common.js') }}"></script>
    <script src="{{ elixir('js/create-custom-activity.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function() {
            $('#startDate').datepicker("setDate", "{{ date('d-m-Y') }}");
            $('#startDate').datepicker("setStartDate", "{{ date('d-m-Y') }}");
            $('#endDate').datepicker("setDate", "+1m");
            $('#endDate').datepicker("setStartDate", "+1m");
        });

    </script>
@stop