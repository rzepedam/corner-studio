@extends('layouts.layout')

@section('title') Editar Actividad @stop

@section('css')

    <link rel="stylesheet" href="{{ mix('css/create-custom-activity.css') }}">

@stop

@section('breadcrumb')
    <li><a href="{{ route('activities.index') }}">Actividades</a></li>
    <li class="active"><strong>Editar</strong></li>
@stop

@section('content')

    @include('layouts.messages.error')

    {{ Form::model($activity, ['route' => ['activities.update', $activity], 'method' => 'PUT', 'id' => 'form-submit']) }}

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

    <script src="{{ mix('js/create-edit-common.js') }}"></script>
    <script src="{{ mix('js/create-custom-activity.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function() {

            $('#color').val("{{ $activity->color }}");

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