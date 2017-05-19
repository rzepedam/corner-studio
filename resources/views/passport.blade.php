<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <title>Corner-Studio | Passport</title>
    <link rel="stylesheet" href="/css/passport.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style>
        body {
            padding-top: 20px;
        }
    </style>
</head>
<body class="gray-bg">
    <div id="app" class="col-md-8 col-md-offset-2">
        <div class="section animated fadeInRight">
        <passport-clients></passport-clients>
        <passport-authorized-clients></passport-authorized-clients>
        <passport-personal-access-tokens></passport-personal-access-tokens>
        </div>
    </div>

    <script src="/js/passport.js"></script>
</body>
</html>