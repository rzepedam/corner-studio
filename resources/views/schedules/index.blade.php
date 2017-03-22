@extends('layouts.layout')

@section('title') Calendario @stop

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/schedules.css') }}">

@stop

@section('content')

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h3>Actividades
                    <small>(Arrastrar y soltar donde desea ubicar)</small>
                </h3>
            </div>
            <div class="ibox-content">
                <div id="external-events">
                    @foreach($activities as $activity)
                        <div id="{{ $activity->id }}" class="badge external-event" style="background-color: {{ $activity->color }}">{{ $activity->name }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {!! Form::open(['route' => ['schedules.store'], 'method' => 'POST']) !!}
    {!! Form::close() !!}
    <div id="calendar" class="col-xs-12 col-sm-12 col-md-9"></div>
    <div class="clearfix"></div>

@stop

@section('scripts')

    <script type="text/javascript" src="{{ elixir('js/schedules.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script type="text/javascript">

        $(document).ready(function () {

            function ini_events(ele) {
                ele.each(function () {
                    var eventObject = {
                        title: $.trim($(this).text())
                    };

                    $(this).data('eventObject', eventObject);

                    $(this).draggable({
                        zIndex: 1070,
                        revert: true,
                        revertDuration: 0
                    });

                });
            }

            ini_events($('#external-events div.external-event'));

            var date = new Date();

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'agendaWeek,agendaDay'
                },
                defaultView: 'agendaWeek',
                allDaySlot: false,
                buttonText: {
                    today: 'Hoy',
                    month: 'Mes',
                    week: 'Semana',
                    day: 'Día'
                },
                editable: true,
                droppable: true,
                events: function (start, end, timezone, callback) {
                    $.ajax({
                        url: "{{ route('schedules.index') }}",
                        success: function (response) {
                            var events = [];
                            $.each(response, function (index, value) {
                                events.push({
                                    id: $(this).attr('id'),
                                    title: value.activity.name,
                                    start: $(this).attr('start'),
                                    end: $(this).attr('end'),
                                    activity: value.activity,
                                    color: value.activity.color
                                });
                            });
                            callback(events);
                        }
                    });
                },

                drop: function (date) {
                    var originalEventObject = $(this).data('eventObject');
                    var copiedEventObject   = $.extend({}, originalEventObject);

                    copiedEventObject.start           = date;
                    copiedEventObject.end             = date;
                    copiedEventObject.id              = $(this).attr('id');
                    copiedEventObject.backgroundColor = $(this).css("background-color");

                    var activity_id = copiedEventObject.id;
                    var start       = copiedEventObject.start.format("YYYY-MM-DD HH:mm");
                    var end         = copiedEventObject.end.add(1, 'hours').format("YYYY-MM-DD HH:mm");
                    var crsfToken   = document.getElementsByName("_token")[0].value;

                    $.ajax({
                        url: '{{ route('schedules.store') }}',
                        data: 'activity_id=' + activity_id + '&start=' + start + '&end=' + end,
                        type: "POST",
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        },
                        success: function (response) {
                            if (response.status) {
                                $('#calendar').fullCalendar('refetchEvents');
                            }else{
                                swal({
                                    title: "Oops...!",
                                    text: 'La fecha del evento debe estar comprendida entre el <p></p><span class="text-success">' + moment(response.start).format('LL') + '</span> al <span class="text-success">' + moment(response.end).format('LL') + '</span>',
                                    type: "error",
                                    html: true
                                });
                            }
                        }
                    });
                },

                eventResize: function (event) {
                    var id        = event.id;
                    var start     = event.start.format("YYYY-MM-DD HH:mm");
                    var end       = event.end.format("YYYY-MM-DD HH:mm");
                    var crsfToken = document.getElementsByName("_token")[0].value;

                    $.ajax({
                        url: 'schedules/' + id,
                        data: 'start=' + start + '&end=' + end + '&id=' + id,
                        type: "PUT",
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        },
                        success: function (response) {
                            if (response.status) {
                                $('#calendar').fullCalendar('refetchEvents');
                            }else{
                                swal({
                                    title: "Oops...!",
                                    text: 'La fecha del evento debe estar comprendida entre el <p></p><span class="text-success">' + moment(response.start).format('LL') + '</span> al <span class="text-success">' + moment(response.end).format('LL') + '</span>',
                                    type: "error",
                                    html: true
                                });
                                $('#calendar').fullCalendar('refetchEvents');
                            }
                        }
                    });
                },

                eventDrop: function (event) {
                    var id        = event.id;
                    var start     = event.start.format("YYYY-MM-DD HH:mm");
                    var end       = event.end.format("YYYY-MM-DD HH:mm");
                    var crsfToken = document.getElementsByName("_token")[0].value;

                    $.ajax({
                        url: 'schedules/' + id,
                        data: 'id=' + id + '&start=' + start + '&end=' + end,
                        type: 'PUT',
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        },
                        success: function (response) {
                            if (response.status) {
                                $('#calendar').fullCalendar('refetchEvents');
                            }else{
                                swal({
                                    title: "Oops...!",
                                    text: 'La fecha del evento debe estar comprendida entre el <p></p><span class="text-success">' + moment(response.start).format('LL') + '</span> al <span class="text-success">' + moment(response.end).format('LL') + '</span>',
                                    type: "error",
                                    html: true
                                });
                                $('#calendar').fullCalendar('refetchEvents');
                            }
                        }
                    });
                },

                eventMouseover: function( event, jsEvent, view ) {
                    $(this).attr({
                        'data-title': event.title,
                        'data-toggle': 'popover',
                        'data-html': 'true',
                        'data-container': 'body',
                        'data-placement': 'top',
                        'data-content': '<i class="mdi mdi-face text-warning"></i> ' + event.activity.professional.full_name + '<p class="text-center"><i class="mdi mdi-checkbox-multiple-marked-circle-outline text-success"></i> ' + event.start.format('LL') + '<br />' + event.start.format('LT') + ' - ' + event.end.format('LT') + ' hrs</p>'
                    });

                    $(this).popover('show');
                },

                eventMouseout: function (calEvent, jsEvent) {
                    $(this).popover('hide');
                },

                eventClick: function (event, jsEvent, view) {
                    var id        = event.id;
                    var crsfToken = document.getElementsByName("_token")[0].value;
                    swal({
                            title: "Eliminar actividad ?",
                            text: 'Está a punto de eliminar la actividad <span class="text-danger">' + event.title + '</span>. Presione confirmar para realizar la operación',
                            type: "warning",
                            html: true,
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Confirmar",
                            cancelButtonText: "Cancelar",
                            closeOnConfirm: false,
                            closeOnCancel: true
                        },
                        function(isConfirm){
                            if (isConfirm) {
                                $.ajax({
                                    url: 'schedules/' + id,
                                    data: 'id=' + id,
                                    headers: {
                                        "X-CSRF-TOKEN": crsfToken
                                    },
                                    type: "DELETE",
                                    success: function (response) {
                                        if (response.status) {
                                            $('#calendar').fullCalendar('removeEvents', event._id);
                                            swal("Felicidades!", "La operación fue realizada satisfactoriamente.", "success");
                                        }else{
                                            swal("Oops...!", "Ha ocurrido un error.", "error");
                                        }
                                    },
                                });
                            }
                        });
                },

                dayClick: function (date, jsEvent, view) {
                    if (view.name === "month") {
                        $('#calendar').fullCalendar('gotoDate', date);
                        $('#calendar').fullCalendar('changeView', 'agendaDay');
                    }
                }
            });
        });

    </script>

@stop