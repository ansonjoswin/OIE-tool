<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            {{--<a class="navbar-brand" href="{{ url('/') }}">Laravel</a>--}}
            <a class="navbar-brand" href="{{ url('/') }}">
                OIE Analytics Tool
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            @if (Auth::check())
                    <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/home') }}">Home</a></li>
                {{-- Menu for Users with Administration Role Only --}}
                @if(Auth::user()->can(['manage-users','manage-roles']))
                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" >
                            <i class="fa fa-btn fa-fw fa-cogs" id="administration"></i>Administration<span class="caret"></span></a>
                        <ul class="dropdown-menu multi level" role="menu">
                            <li><a href="{{ url('/users') }}" id = "users"><i class="fa fa-btn fa-fw fa-user"></i>Users</a></li>

                            <li><a href="{{ url('/roles') }}"><i class="fa fa-btn fa-fw fa-users"></i>Roles</a></li>

                          {{-- (for next sprint)  <li><a href="{{ url('/schools') }}"><i class="fa fa-btn fa-fw fa-university"></i>Schools</a></li> --}}
							<li><a href="{{ url('/uploads') }}"><i class="fa fa-btn fa-fw fa-upload"></i>Uploads</a></li>

                            {{--<li><a href="{{ url('/schools') }}"><i class="fa fa-btn fa-fw fa-university"></i>Schools</a></li>--}}

                            {{--<li class="divider"></li>--}}
                            {{--<li><a href="{{ url('/files') }}"><i class="fa fa-btn fa-fw fa-file"></i>Files</a></li>--}}
                        </ul>
                    </li>
                @endif
            </ul>
            @endif

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    {{--<li><a href="{{ url('/login') }}" id = "login"><i class="fa fa-btn fa-lg fa-fw fa-sign-in"></i>Login</a></li>--}}
                    <li><a href="{{ url('/login') }}" id = "login"><i class="fa fa-btn fa-fw fa-user"></i>Login</a></li>
                    <li><a href="{{ url('/register') }}" id = "register"><i class="fa fa-btn fa-fw fa-hand-o-right"></i>Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" id = "dropdown-menu">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}logout-button" id = "logout-button" 
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-fw fa-sign-out" aria-hidden="true" ></i>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                            </li>
                            <li><a href="{{ url('/resetPassword') }}" id = "change-password" ><i class="fa fa-btn fa-fw fa-lock"></i>Change Password</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/help') }}"><i class="fa fa-btn fa-fw fa-question-circle"></i>Help</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
