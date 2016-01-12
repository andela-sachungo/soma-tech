<nav class="navbar navbar-default navbar-color" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <!--trigger the collapsing nature of the navbar list-->
            <button type="button" class="navbar-toggle" data-toggle="collapse"
             data-target="#navbar-hamburger">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!--Sites Logo-->
          <a class="navbar-brand" href="/">soma-tech</a>
       </div>

        <!--add responsive features to navbar(collapsible list) -->
       <div class="collapse navbar-collapse" id="navbar-hamburger">
            <ul class="nav navbar-nav navbar-right">
                @if (auth()->user())
                    <div class = "btn-group navbar-btn">
                        <button type="button" class="btn btn-default">
                            {{ auth()->user()->name }}
                        </button>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle = "dropdown"
                        aria-haspopup="true" aria-expanded="false">
                            <span class = "caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('dashboard') }}"><span class="glyphicon glyphicon-user"></span> Dashboard</a>
                            </li>
                            <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span> Help</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Signout</a></li>
                        </ul>
                    </div>
                @else
                    <li><a href="{{ route('login') }}" target="_self">Login</a></li>
                    <li><a href="{{ route('register') }}" target="_self">Register</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
