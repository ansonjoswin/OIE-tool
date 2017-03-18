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
                    <img id="portalLogo" src="{{asset('images/UNO-icon-color.png')}}">OIE Analytics Tool
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-btn fa-fw fa-cogs"></i>Administration<span class="caret"></span></a>
                            <ul class="dropdown-menu multi level" role="menu">
                                <li>
                                    <a href="{{ url('/users') }}"><i class="fa fa-btn fa-fw fa-user"></i>Users</a>
                                </li>
                                <li>
                                    <a href="{{ url('/usercomments') }}"><i class="fa fa-btn fa-fw fa-tasks"></i>Manage Comments</a>
                                </li>
                                <li>
                                    <a href="{{ url('/uploads') }}"><i class="fa fa-btn fa-fw fa-upload"></i>Upload Files</a>
                                </li>
                                <li>
                                <a href="{{ url('/jobs') }}"><i class="fa fa-btn fa-fw fa-tasks"></i>Jobs</a>
                                </li>
                            </ul>
                        </li>                 
                    @endif
                    
                        @if(Auth::user())
                            <li>
                                <a href="{{ url('/peergroups') }}">Peer Groups</a>
                            </li>
                        @endif
                        @if(Auth::user()->hasRole('admin'))
                            @if(Auth::user())
                                <li>
                                    <a href="{{ url('/userstats') }}">User Statistics</a>
                                </li>
                            @endif
                        @endif
                    </ul>
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li>
                            <a href="{{ url('/login') }}"><i class="fa fa-btn fa-fw fa-user"></i>Login</a>
                        </li>
                        <li>
                            <a href="{{ url('/register') }}"><i class="fa fa-btn fa-fw fa-hand-o-right"></i>Register</a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-fw fa-sign-out" aria-hidden="true" ></i>
                                                    Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="{{ url('/resetPassword') }}"><i class="fa fa-btn fa-fw fa-lock"></i>Change Password</a>
                                    </li>
                                </ul>
                                </li>
                        @endif
                 </ul>
            </div>
        </div>
    </nav>

    <style type="text/css">
        #portalLogo {
            width: 50px;
            height: 50px;
            float: left;
            margin-top: -14px;
        }
    </style>