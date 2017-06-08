@extends('layouts.layout')

@section('title') Profesionales @stop

@section('title-header') Listado Profesionales @stop

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    @include('layouts.pages.search', ['url' => 'professionals'])

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

    <script src="{{ mix('js/index-common.js') }}"></script>

@stop