<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('page-title') | Iconic Books</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/assets/admin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/assets/admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/assets/admin/dist/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
    <!-- Logo -->
    <a href="/assets/index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>MS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>CMS</b> Panel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img  src="/uploads/{{ Auth::user()->user_img }}" width="160" height="160" alt="{{ Auth::user()->name }}" class="user-image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/uploads/{{ Auth::user()->user_img }}" width="160" height="160" alt="{{ Auth::user()->name }}" class="img-circle">

                <p>
                  {{ Auth::user()->name }} - {{ Auth::user()->designation }}
                  <small>Member since {{ Auth::user()->created_at }}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ Route('profile') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" class="btn btn-default btn-flat" 
                        onclick="event.preventDefault();
                            this.closest('form').submit();">Sign out</a>
                    </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/uploads/{{ Auth::user()->user_img }}" width="160" height="160" alt="{{ Auth::user()->name }}" class="img-circle">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->name }}</p>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('admin/category/create') || Request::is('admin/category') ? 'active' : null }} treeview">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/category/create') ? 'active' : null }}"><a href="{{ Route('category.create') }}"><i class="fa fa-circle-o"></i> Create Category </a></li>
                    <li class="{{ Request::is('admin/category') ? 'active' : null }}"><a href="{{ Route('category.all') }}"><i class="fa fa-circle-o"></i> View Category </a></li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/author/create') || Request::is('admin/author') ? 'active' : null }} treeview">
                <a href="#">
                    <i class="fa fa-pencil"></i> <span>Author</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/author/create') ? 'active' : null }}"><a href="{{ Route('author.create') }}"><i class="fa fa-circle-o"></i> Create Author </a></li>
                    <li class="{{ Request::is('admin/author') ? 'active' : null }}"><a href="{{ Route('author.all') }}"><i class="fa fa-circle-o"></i> View Author </a></li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/book/create') || Request::is('admin/book') ? 'active' : null }} treeview">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Book</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/book/create') ? 'active' : null }}"><a href="{{ Route('book.create') }}"><i class="fa fa-circle-o"></i> Create Book </a></li>
                    <li class="{{ Request::is('admin/book') ? 'active' : null }}"><a href="{{ Route('book.all') }}"><i class="fa fa-circle-o"></i> View Book </a></li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/media/create') || Request::is('admin/media') ? 'active' : null }} treeview">
                <a href="#">
                    <i class="fa fa-film"></i> <span>Media</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/media/create') ? 'active' : null }}"><a href="{{ Route('media.create') }}"><i class="fa fa-circle-o"></i> Create Media </a></li>
                    <li class="{{ Request::is('admin/media') ? 'active' : null }}"><a href="{{ Route('media.all') }}"><i class="fa fa-circle-o"></i> View Media </a></li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/team/create') || Request::is('admin/team') ? 'active' : null }} treeview">
                <a href="#">
                    <i class="fa fa-user-plus"></i> <span>Team</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/team/create') ? 'active' : null }}"><a href="{{ Route('team.create') }}"><i class="fa fa-circle-o"></i> Create Team </a></li>
                    <li class="{{ Request::is('admin/team') ? 'active' : null }}"><a href="{{ Route('team.all') }}"><i class="fa fa-circle-o"></i> View Team </a></li>
                </ul>
            </li>
        </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>@yield('page-title')</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Simple</li>
                </ol>
            </section>
            <!-- Main content -->
            @yield('main-content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2024 <a href="https://www.alfateemacademy.com/" target="_blank">Al-Fateem Academy</a>.</strong> All rights reserved.
    </footer>
    <!-- ./wrapper -->
    <script src="/assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/assets/admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="/assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="/assets/admin/dist/js/app.min.js"></script>
    <script src="/assets/admin/dist/js/demo.js"></script>
    <script src="/assets/admin/dist/js/my_script.js"></script>
    @yield('scripts')
</body>

</html>