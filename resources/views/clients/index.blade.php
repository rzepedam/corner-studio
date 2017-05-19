@extends('layouts.layout')
@section('title') Clientes @stop

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="{{ route('clients.create') }}" class="btn btn-primary">
                        <i class="mdi mdi-plus-circle"></i> Crear Nuevo Cliente
                    </a>
                </div>
                <div class="ibox-content">

                    @include('clients.partials.table')

                </div>
            </div>
        </div>
    </div>

    {{ $clients->links() }}

@stop

@section('scripts')

    <script src="{{ mix('js/index-common.js') }}"></script>

@stop