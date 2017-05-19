@extends('layouts.layout')
@section('title') Actividades @stop

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="{{ route('activities.create') }}" class="btn btn-primary">
                        <i class="mdi mdi-plus-circle"></i> Crear Nueva Actividad
                    </a>
                </div>
                <div class="ibox-content">

                    @include('activities.partials.table')

                </div>
            </div>
        </div>
    </div>

    {{ $activities->links() }}

@stop

@section('scripts')

    <script src="{{ mix('js/index-common.js') }}"></script>

@stop