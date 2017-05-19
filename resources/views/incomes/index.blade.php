@extends('layouts.layout')

@section('title') Ingresos @stop

@section('content')

    <div class="row">
        {{-- Consultar Periodo select field --}}
        <div class="col-xs-12 col-sm-4 col-md-4 form-group">
            {{ Form::label('range_request', 'Consultar Periodo') }}
            {{ Form::select('range_request', ['Mes Actual', 'Últimos 3 meses', 'Últimos 6 meses', 'Últimos 12 meses'], 1, ['class' => 'form-control']) }}
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div id="line-container" class="col-sm-offset-2 col-md-offset-2 col-xs-12 col-sm-8 col-md-8 form-group">
            <canvas id="myChartLine"></canvas>
        </div>
    </div>
    <br/><br/>
    <br/><br/>
    <div class="row">
        <div id="pie-container" class="col-sm-offset-2 col-md-offset-2 col-xs-12 col-sm-8 col-md-8 form-group">
            <canvas id="myChartPie"></canvas>
        </div>
    </div>
    <div class="clearfix"></div>

@stop

@section('scripts')

    <script type="text/javascript" src="{{ mix('js/incomes.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function () {

            var ctx, ctx2;
            var months  = {!! $subscriptions->keys() !!};
            var amounts = {!! $subscriptions->values() !!};

            buildChartLine(months, amounts);
            buildChartPie(months, amounts);

            function buildChartLine(months, amounts) {
                ctx = document.getElementById("myChartLine");

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: months,
                        datasets: [{
                            label: "Ingresos",
                            fill: false,
                            lineTension: 0.1,
                            backgroundColor: "rgba(75,192,192,0.4)",
                            borderColor: "rgba(75,192,192,1)",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            pointBorderColor: "rgba(75,192,192,1)",
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(75,192,192,1)",
                            pointHoverBorderColor: "rgba(220,220,220,1)",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 10,
                            data: amounts,
                            spanGaps: false,
                        }]
                    },
                    options: {
                        tooltips: {
                            callbacks: {
                                label: function(tooltipItems, data) {
                                    return '$ ' + tooltipItems.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                }
                            }
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    callback: function(amounts) {
                                        return '$ ' + amounts.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                    }
                                }
                            }]
                        }
                    }
                });
            }

            function buildChartPie(months, amounts) {
                ctx2 = document.getElementById("myChartPie");

                new Chart(ctx2, {
                    type: 'doughnut',
                    data: {
                        labels: months,
                        datasets: [{
                            label: "Ingresos",
                            data: amounts,
                            backgroundColor: [
                                "#EF9A9A",
                                "#F48FB1",
                                "#CE93D8",
                                "#B39DDB",
                                "#9FA8DA",
                                "#90CAF9",
                                "#80DEEA",
                                "#80CBC4",
                                "#A5D6A7",
                                "#FFF59D",
                                "#FFCC80",
                                "#BCAAA4"
                            ],
                            hoverBackgroundColor: [
                                "#F44336",
                                "#E91E63",
                                "#9C27B0",
                                "#673AB7",
                                "#3F51B5",
                                "#2196F3",
                                "#00BCD4",
                                "#009688",
                                "#4CAF50",
                                "#FFEB3B",
                                "#FF9800",
                                "#795548",
                            ]
                        }]
                    }
                });
            }

            $('#range_request').on('change', function () {
                var option = $(this).val();
                $('#myChartLine').remove();
                $('#line-container').append('<canvas id="myChartLine"><canvas>');
                $('#myChartPie').remove();
                $('#pie-container').append('<canvas id="myChartPie"><canvas>');

                $.get("{{ route('incomes') }}",
                    {option: option},
                    function (data) {
                        if (data.status) {
                            buildChartLine(data.months, data.amounts);
                            buildChartPie(data.months, data.amounts);
                        }
                    });
            });

        });
    </script>

@stop