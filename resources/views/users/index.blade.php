@extends('layouts.layout')

@section('title') Usuarios @stop

@section('title-header') Listado Usuarios @stop

@section('breadcrumb')
    <li class="active"><strong>Usuarios</strong></li>
@stop

@section('content')

    @include('layouts.messages.error')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus-circle"></i> Crear Nuevo Usuario
                    </a>
                </div>
                <div class="ibox-content">

                    @include('users.partials.table')

                </div>
            </div>
        </div>
    </div>

    {{ $users->links() }}

@stop

@section('scripts')
    <script src="{{ mix('/js/index-common.js') }}"></script>
@stop
