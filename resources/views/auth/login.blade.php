<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <title>Corner-Studio | Login</title>
    <link rel="stylesheet" href="{{ mix('css/login.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">
                    <img src="{{ asset('img/logo_full.png') }}" alt="">
                </h1>
            </div>
            {{ Form::open(['route' => 'login', 'method' => 'POST']) }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input name="email" type="email" class="form-control" placeholder="Email" required="">
                    @if ($errors->has('email'))
                        <span>
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input name="password" type="password" class="form-control" placeholder="Password" required="">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                <a href="javascript:void(0)"><small>Forgot password?</small></a>

            {{ Form::close() }}
            <p class="m-t">
                <small>
                    <strong>Copyright</strong> <a target="_blank" href="http://controlqtime.cl">Controlqtime</a> &copy; 2017
                </small> 
            </p>
        </div>
    </div>

    <script src="{{ mix('js/login.js') }}"></script>
</body>
</html>
