@extends('layouts.layout')

@section('title') Crear Actividad @stop

@section('css')
    <link rel="stylesheet" href="{{ mix('css/create-custom-activity.css') }}">
@stop

@section('title-header') Crear Nueva Actividad @stop

@section('breadcrumb')
    <li><a href="{{ route('activities.index') }}">Actividades</a></li>
    <li class="active"><strong>Nuevo</strong></li>
@stop

@section('content')

    @include('layouts.messages.error')

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
    <script src="{{ mix('js/create-custom-activity.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function() {
            $('#startDate').datepicker("setDate", "{{ date('d-m-Y') }}");
            $('#startDate').datepicker("setStartDate", "{{ date('d-m-Y') }}");
            $('#endDate').datepicker("setDate", "+1m");
            $('#endDate').datepicker("setStartDate", "+1m");

            $('.money').autoNumeric({
                aSep: '.',
                aDec: ',',
                aSign: '$ ',
                aPad: false,
                aForm: false
            });

            $('.btn-custom-color').on('click', function()  {
                if ($( this ).css( "background-color" ) === 'rgba(0, 0, 0, 0)' )
                {
                    $("#content-colors .btn-custom-color").each(function(index, element) {
                        $(element).css('background', 'transparent');
                    });
                    $(this).css('background', $(this).attr('id'));
                    $('#color').val($(this).attr('id'));
                } else {
                    $(this).css('background', 'transparent');
                    $('#color').val('');
                }
            })
        });

    </script>
@stop