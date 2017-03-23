@extends('layouts.layout')

@section('title') Inicio @stop

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/schedules.css') }}">

@stop

@section('content')

    <div id="calendar" class="col-xs-12 col-sm-12 col-md-12"></div>
    <div class="clearfix"></div>

@stop

@section('scripts')

    <script type="text/javascript" src="{{ elixir('js/schedules.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month'
                },
                buttonText: {
                    today: 'Hoy',
                    month: 'Mes',
                    week: 'Semana',
                    day: 'Día'
                },
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
            });
        });

    </script>

@stop