@extends('layouts.layout')

@section('title') Editar Suscripción @stop

@section('css')

    <link rel="stylesheet" href="{{ mix('css/create-custom-subscription.css') }}">
    <link rel="stylesheet" href="/css/style.css">

@stop

@section('breadcrumb')
    <li><a href="{{ route('subscriptions.index') }}">Suscripciones</a></li>
    <li class="active"><strong>Editar</strong></li>
@stop

@section('content')

    @include('layouts.messages.error')

    {{ Form::model($subscription, ['route' => ['subscriptions.update', $subscription], 'method' => 'PUT', 'id' => 'form-submit']) }}

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

    <script type="text/javascript" src="{{ mix('js/create-edit-common.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/create-custom-subscription.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'}
            }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }
        });
    </script>
@stop