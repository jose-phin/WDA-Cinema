<!-- Fixed navigation -->
<nav class="mavericks-nav navbar navbar-default navbar-static-top navbar-fixed-top">
    <div class="container">
        {{--Left of Nav--}}
        <div class="navbar-header">

            {{--Hamburger Menu--}}
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {{--Logo--}}
            <a class="navbar-brand navbar-title" href="{{ url('/') }}"><i class="fa fa-film" aria-hidden="true"></i>&nbsp;Mavericks Inc. Cinema</a>
        </div>

        {{--Right of Nav--}}
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Movies -->
                <li><a href="{{ url('movies/') }}">Now Showing</a></li>


                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('user/profile') }}">View Profile</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>