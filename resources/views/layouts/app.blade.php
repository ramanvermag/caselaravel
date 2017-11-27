<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Case Law') }} @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/skin-purple.css')}}">
    <link rel="stylesheet" href="{{asset('css/ownStyle.css')}}">
    <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">

    @if(!Auth::guest())
    <div class="wrapper">

        <header class="main-header">
            <a href="{{url('/')}}" class="logo"> <span class="logo-mini"><b>A</b>LT</span> <span class="logo-lg"><b>LatestCase</b>Law</span> </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-envelope-o"></i> <span class="label label-success">4</span> </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <div class="pull-left"> <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> </div>
                                                <h4> Support Team <small><i class="fa fa-clock-o"></i> 5 mins</small> </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell-o"></i> <span class="label label-warning">10</span> </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#"> <i class="fa fa-users text-aqua"></i> 5 new members joined today </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-flag-o"></i> <span class="label label-danger">9</span> </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <h3> Design some buttons <small class="pull-right">20%</small> </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">20% Complete</span> </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"> <a href="#">View all tasks</a> </li>
                            </ul>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> <span class="hidden-xs">Alexander Pierce</span> </a>
                            <ul class="dropdown-menu">
                                <li class="user-header"> <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                     <p>
                          {{ Auth::user()->name }}
                          <small>Member since <?php 

                                    $utc =  Auth::user()->create_at;
                                    $dt = new DateTime($utc);
                                    $tz = new DateTimeZone('Asia/Kolkata');
                                    $dt->setTimezone($tz);
                                    echo $dt->format('D d M Y h:i:s a'), PHP_EOL;


                           ?></small>
                        </p>
                                </li>
                                <!-- 
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center"> <a href="#">Followers</a> </div>
                                        <div class="col-xs-4 text-center"> <a href="#">Sales</a> </div>
                                        <div class="col-xs-4 text-center"> <a href="#">Friends</a> </div>
                                    </div>
                                </li>
                                -->
                                <li class="user-footer">
                                    <div class="pull-left"> <a href="{{url('profile')}}" class="btn btn-default btn-flat">Profile</a> </div>
                                    <div class="pull-right">
                                      <a href="{{ route('logout') }}" 
                                         class="btn btn-default btn-flat" 
                                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                       Logout
                                     </a>
                                      
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                      </form>
                                     
                                     </div>
                                </li>
                            </ul>
                        </li>
                        <li> <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> </li>
                    </ul>
                </div>
            </nav>
        </header>
        
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image"> <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> </div>
                    <div class="pull-left info">
                        <p>Alexander Pierce</p><a href="#"><i class="fa fa-circle text-success"></i> Online</a> </div>
                </div>
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search..."> <span class="input-group-btn"> <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button> </span> </div>
                </form>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="">
                        <a href="{{url('/')}}"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> <span class="pull-right-container"> <!-- <i class="fa fa-angle-left pull-right"></i>  --></span> </a>
                         <!--  -->
                         <!--  -->
                        <ul class="treeview-menu">
                            <li><a href="{{url('/')}}"><i class="fa fa-circle-o"></i>Dashboard</a></li>
                        </ul>
                    </li>
                    <!--

                    <li class="treeview">
                        <a href="#"> <i class="fa fa-files-o"></i> <span>Layout Options</span> <span class="pull-right-container"> <span class="label label-primary pull-right">4</span> </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                            <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                            <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                            <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="../widgets.html"> <i class="fa fa-th"></i> <span>Widgets</span> <span class="pull-right-container"> <small class="label pull-right bg-green">Hot</small> </span> </a>
                    </li>
                     -->
                    <li class="treeview">
                        <a href="#"> <i class="fa fa-users"></i> <span>Members</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('users/create')}}"><i class="fa fa-circle-o"></i> Add members</a></li>
                            <li><a href="{{url('users')}}"><i class="fa fa-circle-o"></i> view members</a></li>
                            <!-- <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li> -->
                            <!-- <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li> -->
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"> <i class="fa fa-laptop"></i> <span>Permissions</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('permissions')}}"><i class="fa fa-circle-o"></i>View permissions</a></li>
                            <li><a href="{{url('permissions/create')}}"><i class="fa fa-circle-o"></i>Create permission</a></li>
                           
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"> <i class="fa fa-edit"></i> <span>CaseLaws</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('caselaws/create')}}"><i class="fa fa-circle-o"></i>Add New Caselaw</a></li>
                            <li><a href="{{url('caselaws')}}"><i class="fa fa-circle-o"></i>View Caselaws</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#"> <i class="fa fa-edit"></i> <span>Message</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('message/create')}}"><i class="fa fa-circle-o"></i>New message</a></li>
                            <li><a href="{{url('message')}}"><i class="fa fa-circle-o"></i>View Messages</a></li>
                        </ul>
                    </li>


                    <li class="treeview">
                        <a href="#"> <i class="fa fa-edit"></i> <span>Roles</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('roles')}}"><i class="fa fa-circle-o"></i>Add Role</a></li>
                            <li><a href="{{url('roles')}}"><i class="fa fa-circle-o"></i>View Roles</a></li>
                        </ul>
                    </li>
                   
                    <li>
                       <a href="{{url('baract')}}"><i class="fa fa-circle-o"></i>Bar Acts</a>
                    </li>
                    <li>
                       <a href="{{url('chapter')}}"><i class="fa fa-circle-o"></i>Chapters</a>
                    </li>
                    <li>
                       <a href="{{url('section')}}"><i class="fa fa-circle-o"></i>Section</a>
                    </li>

                

                 <!--    <li class="treeview">
                        <a href="#"> <i class="fa fa-table"></i> <span>Tables</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                            <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="../calendar.html"> <i class="fa fa-calendar"></i> <span>Calendar</span> <span class="pull-right-container"> <small class="label pull-right bg-red">3</small> <small class="label pull-right bg-blue">17</small> </span> </a>
                    </li>
                    <li>
                        <a href="../mailbox/mailbox.html"> <i class="fa fa-envelope"></i> <span>Mailbox</span> <span class="pull-right-container"> <small class="label pull-right bg-yellow">12</small> <small class="label pull-right bg-green">16</small> <small class="label pull-right bg-red">5</small> </span> </a>
                    </li>
                 -->
                </ul>
            </section>
        </aside>


        <!-- content append acording to action start -->

        @yield('content-of-user')

        <!-- 
                
        <div class="content-wrapper">
            <section class="content-header">
                <h1> Blank page <small>it all starts here</small> </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Title</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"> <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body"> Start creating your amazing application! </div>
                    <div class="box-footer"> Footer </div>
                </div>
            </section>
        </div>

         -->


        <!-- content append acording to action end -->


        
        <footer class="main-footer">
            <div class="pull-right hidden-xs"> <b>Version</b> 2.4.0 </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> 
            All rights reserved. 
        </footer>

    

        <aside class="control-sidebar control-sidebar-dark">
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)"> <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"> <i class="menu-icon fa fa-user bg-yellow"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"> <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"> <i class="menu-icon fa fa-file-code-o bg-green"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading"> Custom Template Design <span class="label label-danger pull-right">70%</span> </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading"> Update Resume <span class="label label-success pull-right">95%</span> </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading"> Laravel Integration <span class="label label-warning pull-right">50%</span> </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading"> Back End Framework <span class="label label-primary pull-right">68%</span> </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>
                        <div class="form-group">
                            <label class="control-sidebar-subheading"> Report panel usage
                                <input type="checkbox" class="pull-right" checked> </label>
                            <p> Some information about this general settings option </p>
                        </div>
                        <div class="form-group">
                            <label class="control-sidebar-subheading"> Allow mail redirect
                                <input type="checkbox" class="pull-right" checked> </label>
                            <p> Other sets of options are available </p>
                        </div>
                        <div class="form-group">
                            <label class="control-sidebar-subheading"> Expose author name in posts
                                <input type="checkbox" class="pull-right" checked> </label>
                            <p> Allow the user to show his name in blog posts </p>
                        </div>
                        <h3 class="control-sidebar-heading">Chat Settings</h3>
                        <div class="form-group">
                            <label class="control-sidebar-subheading"> Show me as online
                                <input type="checkbox" class="pull-right" checked> </label>
                        </div>
                        <div class="form-group">
                            <label class="control-sidebar-subheading"> Turn off notifications
                                <input type="checkbox" class="pull-right"> </label>
                        </div>
                        <div class="form-group">
                            <label class="control-sidebar-subheading"> Delete chat history <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a> </label>
                        </div>
                    </form>
                </div>
            </div>
        </aside>
        
        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        
        <div class="control-sidebar-bg"></div>
    </div>
    @else

    <div class="wrapper">
        <header class="main-header">
            <a href="../../index2.html" class="logo"> <span class="logo-mini"><b>A</b>LT</span> <span class="logo-lg"><b>Admin</b>LTE</span> </a>
            <nav class="navbar navbar-static-top"></nav>
        </header>
        <!-- content append acording to action start -->
        @yield('content-of-guest')
        <!-- content append acording to action end -->
        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    @endif


    <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    <script src="{{asset('dist/js/demo.js')}}"></script>
    <script src="{{asset('js/fc.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script>
        // $(document).ready(function() {
        //     $('.sidebar-menu').tree()
        // })
    </script>
</body>

</html>