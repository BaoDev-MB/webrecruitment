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
                <h1><a href="/"><img src="{{asset('images/logo2.png')}}" alt="Work Scout" /></a></h1>
                    @else
                    <h1><a href="/"><img src="{{asset('images/logo.png')}}" alt="Work Scout" /></a></h1>
                    @endif
                </div>

                <!-- Menu -->
                <nav id="navigation" class="menu">
                    <ul id="responsive">

                        <li><a id="current" href="index-2.html">Home</a>
                        </li>

                        <li><a href="#">Pages</a>
                            <ul>
                                <li><a href="job-page.html">Job Page</a></li>
                                <li><a href="job-page-alt.html">Job Page Alternative</a></li>
                                <li><a href="resume-page.html">Resume Page</a></li>
                                <li><a href="shortcodes.html">Shortcodes</a></li>
                                <li><a href="icons.html">Icons</a></li>
                                <li><a href="pricing-tables.html">Pricing Tables</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </li>

                        <li><a href="#">Browse Listings</a>
                            <ul>
                                <li><a href="browse-jobs.html">Browse Jobs</a></li>
                                <li><a href="browse-resumes.html">Browse Resumes</a></li>
                                <li><a href="browse-categories.html">Browse Categories</a></li>
                            </ul>
                        </li>

                        <li><a href="#">Dashboard</a>
                            <ul>
                                <li><a href="dashboard.html">Dashboard</a></li>
                                <li><a href="dashboard-messages.html">Messages</a></li>
                                <li><a href="dashboard-manage-resumes.html">Manage Resumes</a></li>
                                <li><a href="dashboard-add-resume.html">Add Resume</a></li>
                                <li><a href="dashboard-job-alerts.html">Job Alerts</a></li>
                                <li><a href="dashboard-manage-jobs.html">Manage Jobs</a></li>
                                <li><a href="dashboard-manage-applications.html">Manage Applications</a></li>
                                <li><a href="dashboard-add-job.html">Add Job</a></li>
                                <li><a href="dashboard-my-profile.html">My Profile</a></li>
                            </ul>
                        </li>
                    </ul>


                    <ul class="float-right">
                        @if(Session::has('auth'))
                        <li><a href="#"><i class="fa fa-user"></i>&nbsp {{Session::get('auth')->first_name}}</a>
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