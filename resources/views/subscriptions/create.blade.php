@extends('layouts.layout')

@section('title') Crear Nueva Suscripción @stop

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/create-custom-subscription.css') }}">

@stop

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

    <script type="text/javascript" src="{{ elixir('js/create-edit-common.js') }}"></script>
    <script type="text/javascript" src="{{ elixir('js/create-custom-subscription.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"95%"}
            }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }

            $('.input-group.date').datepicker("setDate", "+1m");
            $('.input-group.date').datepicker("setStartDate", "{{ date('d-m-Y') }}");
        });
    </script>
@stop