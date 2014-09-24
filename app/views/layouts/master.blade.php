<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/spacelab/bootstrap.min.css" rel="stylesheet">
    @yield('css')

</head>
<body>

    <nav class="navbar navbar-inverse" role="navigation">
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
                            <li>{{ HTML::linkRoute('home.index', 'Beastmen', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('home.index', 'Bretonnia', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('home.index', 'Daemons of Chaos', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('home.index', 'Dark Elves', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('home.index', 'Dwarfs', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('home.index', 'High Elves', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('home.index', 'Lizardmen', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('home.index', 'Ogre Kingdoms', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('home.index', 'Orcs & Goblins', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('home.index', 'Skaven', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('home.index', 'The Empire', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('home.index', 'Tomb Kings', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('home.index', 'Vampire Counts', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('home.index', 'Warriors of Chaos', array(), array()) }}</li>
                            <li>{{ HTML::linkRoute('home.index', 'Wood Elves', array(), array()) }}</li>



                        </ul>
                    </li>
                </ul>


                <!-- Right Menu -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Admin</a></li>
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


    <div class="col-md-2 col-md-offset-1">
        @yield('subnav')
    </div>
    <div class="col-md-7 col-md-offset-1">
        @yield('content')
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"></script>

    @yield('js')

</body>
</html>