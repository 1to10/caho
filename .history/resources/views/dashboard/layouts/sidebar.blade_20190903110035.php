<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ env('APP_URL') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>@if (Sentinel::check())

                        {{Sentinel::getUser()->first_name}}  {{Sentinel::getUser()->last_name}}
                    @else
                        Guest

                    @endif</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            
            <li class="treeview">

                <a href="#"><i class="fa fa-tachometer fa-fw"></i> <span>Dashboard</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

                <ul class="treeview-menu">

                        <li><a href="{{ env('APP_URL') }}/dashboard/welcome"><i class="fa fa-list fa-fw"></i>  Quick Glimpse </a></li>
                        <li><a href="{{ env('APP_URL') }}/dashboard/welcome"><i class="fa fa-list fa-fw"></i>  Interactive Charts with filters </a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-users fa-fw"></i> <span>TP Management</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                        <li class="treeview"><a href="#"><i class="fa fa-list fa-fw"></i>  Current Programs </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ env('APP_URL') }}/dashboard/categories"><i class="fa fa-list fa-fw"></i> Program Category </a></li>
                                <li><a href="{{ env('APP_URL') }}/dashboard/registrations??programstatus=current"><i class="fa fa-list fa-fw"></i> All Registrations  </a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-list fa-fw"></i>   Past programs </a>

                             <ul class="treeview-menu">
                                <li><a href="{{ env('APP_URL') }}/dashboard/registrations?programstatus=past"><i class="fa fa-list fa-fw"></i> All Registrations </a></li>
                            </ul>

                        </li>
                </ul>
            </li>
           
            <li class="treeview">
                <a href="#"><i class="fa fa-calendar-o fa-fw"></i> <span>Events</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                        <li class="treeview"><a href="#"><i class="fa fa-list fa-fw"></i>  Current Events </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-list fa-fw"></i>  CAHOCON 2019 </a></li>
                                <li><a href="#"><i class="fa fa-list fa-fw"></i>  CAHOTECH 2019 </a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-list fa-fw"></i>   Past Events </a>

                            <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-list fa-fw"></i>   CAHOCON </a></li>
                                    <li><a href="#"><i class="fa fa-list fa-fw"></i>   CAHOTECH </a></li>
                            </ul>

                        </li>
                </ul>
            </li>

             <li>
                <a href="#">
                    <i class="fa fa-star"></i> <span>Feedback</span>
                </a>
            </li>

             <li>
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Newsletter</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Enquiry Form</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-book"></i> <span>Faculty Mgmt</span>
                </a>
            </li>


            @if (Sentinel::getUser()->hasAccess(['User.ListView']) || Sentinel::getUser()->hasAccess(['Role.ListView']))
                <li class="treeview">

                    <a href="#"><i class="fa fa-male"></i><span>Administartor</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>


                    <ul class="treeview-menu">

                        @if (Sentinel::getUser()->hasAccess(['User.ListView']))
                            <li><a href="{{ env('APP_URL') }}/dashboard/user"><i class="fa fa-list fa-fw"></i> User Listing</a></li>
                        @endif

                        @if (Sentinel::getUser()->hasAccess(['Role.ListView']))
                           <!--  <li><a href="{{ env('APP_URL') }}/dashboard/role"><i class="fa fa-list fa-fw"></i> Role Listing</a></li> -->
                        @endif


                    </ul>
                </li>
            @endif


          
           
    
       
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<script>
    $(document).ready(function() {
        var url = window.location;
// for sidebar menu but not for treeview submenu
        $('ul.sidebar-menu a').filter(function() {
            return this.href == url;
        }).parent().siblings().removeClass('active').end().addClass('active');
// for treeview which is like a submenu
        $('ul.treeview-menu a').filter(function() {
            return this.href == url;
        }).parentsUntil(".sidebar-menu > .treeview-menu").siblings().removeClass('active').end().addClass('active');
    });
</script>