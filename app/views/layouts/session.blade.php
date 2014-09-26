<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/spacelab/bootstrap.min.css" rel="stylesheet">
    @yield('css')
</head>
<body style="background-image:url('../images/home-wormhole1.gif'); background-repeat: no-repeat; background-size: 100%">

    <br /><br /><br /><br /><br /><br /><br />
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @yield('content')
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"></script>
    @yield('js')

</body>
</html>