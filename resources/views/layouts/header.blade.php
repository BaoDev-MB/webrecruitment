<!-- Header
================================================== -->

@if($dashboard??''!='')
    <header class="dashboard-header">
        @else
            <header class="{{$transparent ?? ''}} sticky-header">
                @endif
                
                <div class="container">
                    <div class="sixteen columns">

                        <!-- Logo -->
                        <div id="logo">
                            @if ($transparent ?? '' != '')
                                <h1><a href="/"><img src="{{asset('images/logo2.png')}}" alt="Work Scout"/></a></h1>
                            @else
                                <h1><a href="/"><img src="{{asset('images/logo.png')}}" alt="Work Scout"/></a></h1>
                            @endif
                        </div>

                        <!-- Menu -->
                        <nav id="navigation" class="menu">
                            <ul id="responsive">

                                <li><a id="current" href="{{route('index')}}">Home</a>
                                </li>
                                @if(session('auth')!=null&&session('group')!=null)
                                    <li>
                                        @if(in_array(3, session('group')))
                                            <a href="{{route('companyjobs')}}">Browse Resumes</a>
                                        @elseif(in_array(4,session('group')))
                                            <a href="{{route('jobs.index')}}">Browse Jobs</a>
                                        @endif

                                    </li>

                                    <li><a href="#">Dashboard</a>
                                        {{--                            <ul>--}}
                                        {{--                                <li><a href="dashboard.html">Dashboard</a></li>--}}
                                        {{--                                <li><a href="dashboard-messages.html">Messages</a></li>--}}
                                        {{--                                <li><a href="dashboard-manage-resumes.html">Manage Resumes</a></li>--}}
                                        {{--                                <li><a href="dashboard-add-resume.html">Add Resume</a></li>--}}
                                        {{--                                <li><a href="dashboard-job-alerts.html">Job Alerts</a></li>--}}
                                        {{--                                <li><a href="dashboard-manage-jobs.html">Manage Jobs</a></li>--}}
                                        {{--                                <li><a href="dashboard-manage-applications.html">Manage Applications</a></li>--}}
                                        {{--                                <li><a href="dashboard-add-job.html">Add Job</a></li>--}}
                                        {{--                                <li><a href="dashboard-my-profile.html">My Profile</a></li>--}}
                                        {{--                            </ul>--}}
                                    </li>
                                @endif
                            </ul>


                            <ul class="float-right">
                                @if(Session::has('auth'))
                                    <li>
                                        <a href="#"><i class="fa fa-user"></i>{{Session::get('auth')->first_name}}
                                        </a>
                                        <ul>
                                            <li>
                                            <li><a href="">Profile</a></li>
                                            <li><a href="{{route('logout')}}">Logout</a></li>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{route('register')}}"><i class="fa fa-user"></i> Sign Up</a></li>
                                    <li><a href="{{route('login')}}"><i class="fa fa-lock"></i> Log In</a></li>
                                @endif
                            </ul>

                        </nav>

                        <!-- Navigation -->
                        <div id="mobile-navigation">
                            <a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i></a>
                        </div>

                    </div>
                </div>
            </header>
            <div class="clearfix"></div>
