<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="/img/logo.png">
    <title>Corner-Studio | @yield('title')</title>
    <link rel="stylesheet" href="{{ elixir('css/layout.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    @yield('css')

</head>

<body class="fixed-navigation mini-navbar pace-done">
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">

        @include('layouts.sections.sidebar')

    </nav>

    <div id="page-wrapper" class="fixed-sidebar mini-navbar pace-done gray-bg dashboards.dashboard_1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">

                @include('layouts.sections.header')

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>
                    @yield('title')
                </h2>
                <ol class="breadcrumb">
                    @yield('breadcrumb')
                </ol>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">

            @yield('content')

        </div>
    </div>

</div>

<script src="{{ elixir('js/layout.js') }}"></script>

@yield('scripts')

</body>
</html>
