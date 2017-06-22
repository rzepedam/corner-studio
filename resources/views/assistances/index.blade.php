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
            <div class="col-sm-3" style="padding-left: 0;">
                {{ Form::select('activity', ['*' => '-- Todas --', '-' => '-- No Tiene --'] + $activities->toArray(), null, ['class' => 'form-control', 'id' => 'activity']) }}
            </div>
            <div class="col-sm-6 col-md-4 input-group pull-right">
                {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search...', 'id' => 'search']) }}
                <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-magnify"></i></button>
                    </span>
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
                "pageLength": 25,
                "sDom": '<"top"l>t<"F"ip><"clear"><"clear">',
                "ajax": {
                    url: "/getAssistances",
                },
                "language": {
                    "sProcessing": '<i class="fa fa-spinner fa-pulse fa-3x fa-fw text-success"></i>',
                    "sInfo": 'Mostrando <span class="text-success">_START_</span> a <span class="text-success">_END_</span> de _TOTAL_ registros',
                    "sInfoEmpty": "No existen coincidencias",
                    "sInfoFiltered": '(filtrado de un total de <span class="text-primary">_MAX_</span> registros)',
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "oPaginate": {
                        "sNext": '<i class="fa fa-angle-right" aria-hidden="true"></i>',
                        "sPrevious": '<i class="fa fa-angle-left" aria-hidden="true"></i>'
                    },
                },
                "order": [[2, 'desc']],
                "columns": [
                    {data: 'client.full_name', name: 'client.full_name'},
                    {
                        data: 'activity.name', name: 'activity.name', className: 'text-center', searchable: false,
                        'render': function (data, type, row, meta) {
                            if (!row.activity_id) {
                                return '<span class="badge badge-danger"><span style="color: #FFFFFF">No tiene</span></span>';
                            }
                            return '<span class="badge" style="background:' + row.activity.color + '">' +
                                '<a href="activities/' + row.activity.id + '"><span style="color: #FFFFFF">' + row.activity.name + '</span></a></span>';
                        }
                    },
                    {
                        data: 'created_at', name: 'created_at', className: 'text-center', searchable: false,
                        'render': function (data, type, row, meta) {
                            return moment(data).format('DD MMM HH:mm:ss');
                        }
                    },
                ]
            }

            // Send new parameter to server
            var table = $('#assistances').on('preXhr.dt', function (e, settings, data) {
                data.id = $('#activity').val();
            }).DataTable(params);

            // reolad table to the change activity select
            $('#activity').on('change', function () {
                table.ajax.reload();
            });

            // Search method  
            $('#search').keyup(function () {
                table.search($(this).val()).draw();
            })

        });
    </script>
@stop