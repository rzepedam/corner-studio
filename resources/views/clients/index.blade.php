@extends('layouts.layout')

@section('title') Clientes @stop

@section('title-header') Listado Clientes @stop

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    @include('layouts.pages.search', ['url' => 'clients'])

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