<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Neuton:200" rel="stylesheet">
        @yield("style")
    </head>
    <body>
        <div class="container" id="mainNav">
            <div class="row">
                <nav class="navbar">
                    <div class="col-md-11 col-md-offset-1">
                        <div class="divide">
                            <a class="navbar-brand" href="{{URL('homepage')}}" id="logo"><i class="fa fa-gavel"></i> MaZad</a>
                        </div>
                        <div class="divide">
                            <h3>Welcome <i class="glyphicon glyphicon-fire"></i> MaZad</h3>
                        </div>
                        <div class="divide">
                            <ul class="nav navbar-nav">
                                <li><a href="{{URL('/')}}"><i class="glyphicon glyphicon-home"></i> Home Page</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="breadcrumb">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a style="color:blue" href="{{ route('login') }}">Login</a></li>
                        <li><a style="color:blue" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a style="color: blue;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <a href="{{url('/myitem')}}" class="btn btn-primary">My Item</a>
                    <a href="profile/{{Auth::id()}}" class="btn btn-primary">Edit My Profile</a>
                    @endif
            </div>
        </div>
        <div class="container">
        @yield("content")
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        @yield("script")
    </body>
</html>