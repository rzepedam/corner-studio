@extends('layouts.layout')

@section('title') Registro Asistencia @stop

@section('css')
    <link rel="stylesheet" href="{{ mix('css/assistances/index.css') }}">
@endsection

@section('title-header') Registro Asistencia @stop

@section('breadcrumb')
    <li class="active"><strong>Registro Asistencia</strong></li>
@stop

@section('content')

    @include('layouts.messages.error')

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <div class="row">
                <div class="col-sm-3">
                    {{ Form::select('activity', ['*' => '-- Todas --', '-' => '-- No Tiene --'] + $activities->toArray(), null, ['class' => 'form-control', 'id' => 'activity']) }}
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="ibox-content">

            @include('assistances.partials.table')

        </div>
    </div>

@stop

@section('scripts')
    <script src="{{ mix('js/index-common.js') }}"></script>
    <script src="{{ mix('js/assistances/index.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var params = {
                "processing": true,
                "serverSide": true,
                "destroy": true,
                "responsive": true,
                "ajax": {
                    url: "/getAssistances",
                },
                "order": [[ 4, 'desc' ]],
                "columns": [
                    {data: 'client.full_name', name: 'client_id'},
                    {
                        data: 'activity.name', name: 'activity', className: 'text-center',
                        'render': function (data, type, row, meta) {
                            if (! row.activity_id) {
                                return '<span class="badge badge-danger"><span style="color: #FFFFFF">No tiene</span></span>';
                            }
                            return '<span class="badge" style="background:' + row.activity.color + '">' +
                                '<a href="activities/' + row.activity.id + '"><span style="color: #FFFFFF">' + row.activity.name + '</span></a></span>';
                        }
                    },
                    {
                        data: 'created_at', name: 'date', className: 'text-center',
                        'render': function (data, type, row, meta) {
                            return moment(data).format('DD-MM-YYYY');
                        }
                    },
                    {
                        data: 'created_at', name: 'hour', className: 'text-center',
                        'render': function (data, type, row, meta) {
                            return moment(data).format('HH:mm:ss');
                        }
                    },
                    {data: 'created_at', name: 'created_at', visible: false}
                ]
            }

            var table = $('#assistances')
                .on('preXhr.dt', function (e, settings, data) {
                    data.id = $('#activity').val()
                })
                .DataTable(params);

            $('#activity').on('change', function () {
                table.ajax.reload();
            });
        });
    </script>
@stop