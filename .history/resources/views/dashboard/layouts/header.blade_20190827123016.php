<header class="main-header">




    <!-- Logo -->
    <a href="{{ env('APP_URL') }}/dashboard/welcome" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><strong>Leads</strong></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><strong>Leads</strong></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
               
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ env('APP_URL') }}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs"> @if (Sentinel::check())

                                {{Sentinel::getUser()->first_name}}  {{Sentinel::getUser()->last_name}}
                            @else
                                Guest

                            @endif</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ env('APP_URL') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                            <p>
                                @if (Sentinel::check())

                                     {{Sentinel::getUser()->first_name}}  {{Sentinel::getUser()->last_name}}
                                @else
                                     Guest

                                @endif
                                <small>Member since  {{date_convert(Sentinel::getUser()->created_at)}} </small>
                            </p>
                        </li>


                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">

                                <form action="{{ env('APP_URL') }}/dashboard/logout" method="post" id="logout-frm" name="logout-frm">
                                    {{ csrf_field() }}
                                </form>
                                <a href="#" onClick="document.getElementById('logout-frm').submit();" class="btn btn-default btn-flat">Sign out</a>


                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>