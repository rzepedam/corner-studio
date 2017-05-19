@extends('layouts.layout')

@section('title') Profesionales @stop

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="{{ route('professionals.create') }}" class="btn btn-primary">
                        <i class="mdi mdi-plus-circle"></i> Crear Nuevo Profesional
                    </a>
                </div>
                <div class="ibox-content">

                    @include('professionals.partials.table')

                </div>
            </div>
        </div>
    </div>

    {{ $professionals->links() }}

@stop

@section('scripts')

    <script src="{{ elixir('js/index-common.js') }}"></script>

@stop