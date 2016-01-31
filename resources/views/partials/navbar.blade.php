<nav class="navbar navbar-default navbar-color navbar-fixed-top color-text" role="navigation">
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
            <a class="navbar-brand" href="/">
                SomaTech
            </a>
       </div>

        <!--add responsive features to navbar(collapsible list) -->
       <div class="collapse navbar-collapse" id="navbar-hamburger">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="{{ route('aboutpage') }}" target="_self"> About</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (auth()->user())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if(auth()->user()->avatar)
                                <img src="{{ auth()->user()->avatar }}" class="img-circle img-responsive brand-image navbar-nav">
                            @else
                                <img src="/image/person_avatar.png" class="img-circle img-responsive brand-image navbar-nav">
                            @endif
                            <span id="username">{{ auth()->user()->name }}</span>
                           <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu"  id="droplist">
                           <li><a href="{{ route('dashboard') }}"><span class="glyphicon glyphicon-user"></span> Dashboard</a>
                            </li>
                            <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span> Help</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Signout</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" target="_self"><span class="glyphicon glyphicon-log-in"></span>  Login</a></li>
                    <li><a href="{{ route('register') }}" target="_self"><span class="glyphicon glyphicon-plus-sign"></span> Register</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
