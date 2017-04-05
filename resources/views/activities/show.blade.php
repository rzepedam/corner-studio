@extends('layouts.layout')

@section('title') Detalle Actividad @stop

@section('breadcrumb')
    <li><a href="{{ route('activities.index') }}">Actividades</a></li>
    <li class="active"><strong>Detalle</strong></li>
@stop

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td>Profesional</td>
                                <td class="text-center">{{ $activity->professional->full_name }}</td>
                            </tr>
                            <tr>
                                <td>Actividad</td>
                                <td class="text-center">{{ $activity->name }}</td>
                            </tr>
                            <tr>
                                <td>Valor</td>
                                <td class="text-center">{{ '$ ' . $activity->amount }}</td>
                            </tr>
                            <tr>
                                <td>Desde</td>
                                <td class="text-capitalize text-center">{{ $activity->text_start_date }}</td>
                            </tr>
                            <tr>
                                <td>Hasta</td>
                                <td class="text-capitalize text-center">{{ $activity->text_end_date }}</td>
                            </tr>
                            <tr>
                                <td style="vertical-align:middle;">Color</td>
                                <td class="text-center">
                                    <button class="btn btn-circle btn-outline btn-custom-color" style="border-color: {{ $activity->color }}; background: {{ $activity->color }};" type="button"></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('activities.index') }}">Volver</a>
        </div>
    </div>

@stop