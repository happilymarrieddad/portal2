<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/slate/bootstrap.min.css" rel="stylesheet">
    @yield('css')

</head>
<body style="@yield('body')">

    <nav class="navbar navbar-inverse" role="navigation" id="display-nav-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <!-- Left Menu -->
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Warhammer Fantasy <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <!-- Armies -->
                            <li>{{ HTML::linkRoute('beastmen.index', 'Beastmen', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('bretonnia.index', 'Bretonnia', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('daemons.index', 'Daemons of Chaos', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('darkelves.index', 'Dark Elves', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('dwarfs.index', 'Dwarfs', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('highelves.index', 'High Elves', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('lizardmen.index', 'Lizardmen', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('ogre.index', 'Ogre Kingdoms', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('orcsgobs.index', 'Orcs & Goblins', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('skaven.index', 'Skaven', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('empire.index', 'The Empire', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('tombkings.index', 'Tomb Kings', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('vampires.index', 'Vampire Counts', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('chaos.index', 'Warriors of Chaos', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('woodelves.index', 'Wood Elves', array(), array()) }}</li>
                        </ul>
                    </li>
                </ul>



                <!-- Right Menu -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a id="button-menu-hide">Hide Menu&#9650;</a></li>
                    @if($admin)<li><a href="#">Admin</a></li>@endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Logged in as {{$username}} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Profile</a></li>
                            <li><a href="/logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 text-center">
            <button class="btn btn-sm btn-danger" id="button-menu-show" style="display: none">&#9660;</button>
        </div>
        <div class="col-sm-12">
            <button style="display:none" class="btn btn-md btn-block btn-danger" id="alert-error"></button>
            <button class="btn btn-md btn-info btn-block" id="alert-loading">Loading Systems...</button>
            <button style="display:none" class="btn btn-md btn-block btn-success" id="alert-success"></button>
        </div>
    </div>

    <!-- Alert System -->
    <div class="row">
    </div><br />

    <div class="row">
        <div class="col-md-2 col-md-offset-1">
            @yield('subnav')
        </div>
        <div class="col-md-7 col-md-offset-1">
            @yield('content')
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script src="js/main.js"></script>
    @yield('js')
    <script src="js/startup.js"></script>

</body>
</html>