@extends('layouts.layout')

@section('title') Registro Asistencia @stop

@section('title-header') Registro Asistencia @stop

@section('breadcrumb')
    <li class="active"><strong>Registro Asistencia</strong></li>
@stop

@section('content')

    @include('layouts.messages.error')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            {{ Form::open(['url' => 'assistances', 'method' => 'GET', 'role' => 'search']) }}
                <div class="col-sm-3">
                    {{ Form::select('activity', ['' => 'Seleccione Actividad'] + $activities->toArray(), null, ['class' => 'form-control']) }}
                </div>
                <div class="col-sm-4 input-group pull-right">
                    {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search...']) }}
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-magnify"></i></button>
                    </span>
                </div>
            {{ Form::close() }}
            <div class="clearfix"></div>
        </div>
        <div class="ibox-content">

            @include('assistances.partials.table')

        </div>
    </div>

    {{ $assistances->links() }}

@stop

@section('scripts')
    <script src="{{ mix('js/index-common.js') }}"></script>
@stop