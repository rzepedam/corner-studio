@extends('layouts.layout')

@section('title') Usuarios @stop

@section('title-header') Listado Usuarios @stop

@section('content')

    @include('layouts.messages.error')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    @include('layouts.pages.search', ['url' => 'users'])

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
