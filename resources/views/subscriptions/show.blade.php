@extends('layouts.layout')

@section('title') Detalle Suscripción <span class="badge badge-primary">{{ $subscription->state }}</span> @stop

@section('breadcrumb')
    <li><a href="{{ route('subscriptions.index') }}">Suscripciones</a></li>
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
                                <td>Cliente</td>
                                <td class="text-center">{{ $subscription->client->full_name }}</td>
                            </tr>
                            <tr>
                                <td>Método de Pago</td>
                                <td class="text-capitalize text-center">{{ $subscription->payment->name }}</td>
                            </tr>
                            <tr>
                                <td>Fecha Inicio</td>
                                <td class="text-capitalize text-center">{{ $subscription->created_at }}</td>
                            </tr>
                            <tr>
                                <td>Fecha Término</td>
                                <td class="text-capitalize text-center">{{ $subscription->text_end_date }}</td>
                            </tr>
                            <tr>
                                <td>Nº Documento</td>
                                <td class="text-center">{{ $subscription->num_voucher }}</td>
                            </tr>
                            <tr>
                                <td>Día Pago</td>
                                <td class="text-center">{{ $subscription->payday }}</td>
                            </tr>
                            <tr>
                                <td>Actividades Suscritas</td>
                                <td class="text-center">
                                    @foreach($subscription->activities as $activity)
                                        <?php $random = array_rand(config('constants.colors'), 1); ?>
                                        <span class="badge badge-{{ $random }}" style="background: {{ $activity->color }}">
                                            <a href="{{ url('activities/' . $activity->id) }}">{{ $activity->name }}</a>
                                        </span>
                                    @endforeach
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
            <a href="{{ route('subscriptions.index') }}">Volver</a>
        </div>
    </div>

@stop