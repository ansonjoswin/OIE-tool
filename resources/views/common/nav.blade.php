<link rel="stylesheet" href="{{ url('css') }}/nav.css"/>

<div id="header">
    <div class="hide-mobile main-header clearfix">
        <div id="logohead" class="inner-content">
            <div class="subsite-logos">

                <div class="home-logo" style="padding-right: 20px; border-right: 1px solid #cccccc ;">
                    <a href="#">
                        <img alt="University of Nebraska Omaha"
                             src="{{asset('images/UNO-icon-color.png')}}">
                    </a>
                </div>

                <div>
                    <a class="college" href="#">University of Nebraska Omaha</a>
                    <a class="department" href="#">OIE Analytics Tool</a>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
        @if (Auth::check())
            <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    {{-- Menu for Users with Administration Role Only --}}
                    @if(Auth::user()->can(['manage-users','manage-roles']))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                <i class="fa fa-btn fa-fw fa-cogs"></i>Administration<span class="caret"></span></a>
                            <ul class="dropdown-menu multi level" role="menu">
                                <li>
                                    <a href="{{ url('/users') }}"><i class="fa fa-btn fa-fw fa-user"></i>Users</a>
                                </li>
                                <li>
                                    <a href="{{ url('/usercomments') }}"><i class="fa fa-btn fa-fw fa-tasks"></i>Manage
                                        Comments</a>
                                </li>
                                <li>
                                    <a href="{{ url('/uploads') }}"><i class="fa fa-btn fa-fw fa-upload"></i>Upload
                                        Files</a>
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

                    @if(Auth::user())
                        @if(Auth::user()->hasRole('admin'))
                            <li>
                                <a href="{{ url('/userstats') }}">User Statistics</a>
                            </li>
                        @endif
                    @endif
                    @if(Auth::user()->hasRole('admin'))
                        <li>
                            <a href="{{ url('https://analytics.google.com/') }}" id="GoogleAnalytics">Google
                                Analytics</a>
                        </li>
                    @endif
                    @endif
                </ul>



                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="navBtn">
                            <a href="{{ url('/login') }}"><span><i class="fa fa-btn fa-fw fa-user"></i>Login</span></a>
                        </li>
                        <li class="navBtn">
                            <a href="{{ url('/register') }}"><span><i class="fa fa-btn fa-fw fa-hand-o-right"></i>Register</span></a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();"><i
                                                class="fa fa-btn fa-fw fa-sign-out" aria-hidden="true"></i>
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>

                                </li>
                                <li>
                                    <a href="{{ url('/resetPassword') }}"><i class="fa fa-btn fa-fw fa-lock"></i>Change
                                        Password</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
        </div>
    </div>
</nav>

