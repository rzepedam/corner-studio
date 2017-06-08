@extends('layouts.layout')

@section('title') Actividades @stop

@section('title-header') Listado Actividades @stop

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    @include('layouts.pages.search', ['url' => 'activities'])

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