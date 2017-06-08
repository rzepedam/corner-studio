@extends('layouts.layout')

@section('title') Suscripciones @stop

@section('title-header') Listado Suscripciones @stop

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    @include('layouts.pages.search', ['url' => 'subscriptions'])

                </div>
                <div class="ibox-content">

                    @include('subscriptions.partials.table')

                </div>
            </div>
        </div>
    </div>

    {{ $subscriptions->links() }}

@stop

@section('scripts')

    <script src="{{ mix('js/index-common.js') }}"></script>

@stop