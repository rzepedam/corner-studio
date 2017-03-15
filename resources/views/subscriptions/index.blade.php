@extends('layouts.layout')
@section('title') Listado de Suscripciones @stop

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="{{ route('subscriptions.create') }}" class="btn btn-primary">
                        <i class="mdi mdi-plus-circle"></i> Crear Nueva Suscripción
                    </a>
                </div>
                <div class="ibox-content">

                    @include('subscriptions.partials.table')

                </div>
            </div>
        </div>
    </div>

@stop