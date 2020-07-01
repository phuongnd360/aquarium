<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="14400">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('public/backend') }}/img/favicon.ico" type="image/x-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'XANH TUOI TROPICAL FISH CO.,LTD') }}</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/css/import.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="{{ asset('public/backend') }}/plugins/fonts/google-font.css" rel="stylesheet">
    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> -->
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/toastr/toastr.min.css">
    <!--  <link type="text/css" rel="stylesheet" href="http://example.com/image-uploader.min.css"> -->
    <link href="{{ asset('public/backend') }}/plugins/bootstrap-filestyle/css/bootstrap.min.css" rel="stylesheet">
      <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/summernote/summernote-bs4.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/photo-gallery-redman/css/redman-photoGallery.min.css">

    <!-- jQuery -->
    <script src="{{ asset('public/backend') }}/plugins/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
<!--             <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> -->

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="{{route('backend.contacts.index')}}">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-info navbar-badge">{{@count_contact_new()}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">{{@count_contact_new()}} Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="{{route('backend.contacts.index')}}" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> {{@count_contact_new()}} new messages
                            <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{route('backend.contacts.index')}}" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>

                <li class="dropdown user user-menu open">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" marked="1" aria-expanded="true">
              <img src="{{ asset('public/backend') }}/img/user2-160x160.jpg" class="user-image" alt="">
              <span class="hidden-xs" googl="true">{{Auth::user()->first_name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('public/backend') }}/img/user2-160x160.jpg" class="img-circle">

                <p>
                  {{Auth::user()->last_name}} {{Auth::user()->first_name}}
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="{{route('backend.users.detail',Auth::user()->id)}}" marked="1"><i class="fas fa-arrow-circle-right"></i> My Profile</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{route('backend.users.logout')}}" class="btn btn-default btn-flat" marked="1"><i class="fa fa-power-off gray"></i> Sign out</a>
                </div>
              </li>
            </ul>
          </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('backend.dashboard.index')}}" class="brand-link" style="padding-left: 3px;">
                <img src="{{ asset('public/backend') }}/img/admin-logo.gif" alt="Logo" class="brand-image img-circle elevation-3 txt-blue" style="opacity: .8">
                <span class="brand-text font-weight-light">Xanh Tuoi</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('public/backend') }}/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <!--         <div class="info">
          <a href="#" class="d-block">User</a>
        </div> -->

                    <div class="pull-left info">
                        <p class="user-online">{{Auth::user()->first_name}}</p>
                        <a href="#" class="txt-online"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>

                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="{{route('backend.dashboard.index')}}" class="nav-link {{ activeMenu('dashboard')}}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <!-- Category -->
                        <!-- <li class="nav-header">CATEGORY MANAGEMENT</li> -->
                        <li class="nav-item has-treeview">
                            <a href="javascript:void(0);" class="nav-link {{ activeMenu('categories')}}">
                                <i class="fa fa-th"></i>
                                <p>
                                    Category
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('backend.categories.index')}}" class="nav-link">
                                        <i class="fa fa-list"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('backend.categories.create')}}" class="nav-link">
                                        <i class="fa fa-plus"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Products -->
                        <!-- <li class="nav-header">PRODUCTS MANAGEMENT</li> -->
                        <li class="nav-item has-treeview">
                            <a href="javascript:void(0);" class="nav-link {{ activeMenu('products')}}">
                                <i class="fa fa-cubes"></i>
                                <p>
                                    Products
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('backend.products.index')}}" class="nav-link">
                                        <i class="fa fa-list"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('backend.products.create')}}" class="nav-link">
                                        <i class="fa fa-plus"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Facility -->
                        <li class="nav-item has-treeview">
                            <a href="javascript:void(0);" class="nav-link {{ activeMenu('facilities')}}">
                                <i class="fa fa-cubes"></i>
                                <p>
                                    Facility
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('backend.facilities.index')}}" class="nav-link">
                                        <i class="fa fa-list"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('backend.facilities.create')}}" class="nav-link">
                                        <i class="fa fa-plus"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('backend.gallery.index')}}" class="nav-link {{ activeMenu('gallery')}}">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Gallery
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="javascript:void(0);" class="nav-link {{ activeMenu('videos')}}">
                                <i class="fa fa-file-movie-o"></i>
                                <p>
                                    Videos
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('backend.videos.index')}}" class="nav-link">
                                        <i class="fa fa-list"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('backend.videos.create')}}" class="nav-link">
                                        <i class="fa fa-plus"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="javascript:void(0);" class="nav-link {{ activeMenu('contacts')}}">
                                <i class="fa fa-envelope"></i>
                                <p>
                                    Contacts
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">{{@count_contact_new()}}</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('backend.contacts.index')}}" class="nav-link">
                                        <i class="fa fa-list"></i>
                                        <p>List</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <!-- Users -->
                        <li class="nav-item has-treeview">
                            <a href="javascript:void(0);" class="nav-link {{ activeMenu('users')}}">
                                <i class="fa fa-users"></i>
                                <p>
                                    Users
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('backend.users.index')}}" class="nav-link">
                                        <i class="fa fa-list"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('backend.users.add')}}" class="nav-link">
                                        <i class="fa fa-user-plus"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Setting -->
                        <!--           <li class="nav-header">SETTING MANAGEMENT</li> -->
                        <li class="nav-item has-treeview">
                            <a href="javascript:void(0);" class="nav-link {{ activeMenu('settings')}}">
                                <i class="fa fa-cog"></i>
                                <p>
                                    Settings
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('backend.settings.index')}}" class="nav-link">
                                        <i class="fa fa-envelope"></i>
                                        <p>Mail Setting</p>
                                    </a>
                                </li>                                
                            </ul>
                        </li>

                        <!-- Logout -->
                        <li class="nav-item btn-logout">
                            <a href="{{route('backend.users.logout')}}" class="nav-link">
                                <i class="fa fa-power-off"></i>
                                <p>&nbsp;Logout</p>
                            </a>
                        </li>
                        <!-- /. Logout -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->

        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            &copy; 2020 <strong><a href="{{route('backend.dashboard.index')}}">Xanh Tuoi</a></strong> Tropical Fish Co.,Ltd. All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- Bootstrap -->
    <script src="{{ asset('public/backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('public/backend') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('public/backend') }}/js/adminlte.js"></script>

    <!-- Select2 -->
    <script src="{{ asset('public/backend') }}/plugins/select2/js/select2.full.min.js"></script>
<?php /*
    <!-- DataTables -->
    <script src="{{ asset('public/backend') }}/plugins/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('public/backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script> -->
*/?>
    <!-- DataTables -->
    <script src="{{ asset('public/backend') }}/plugins/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('public/backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <!-- Summernote -->
<script src="{{ asset('public/backend') }}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

    <!-- OPTIONAL SCRIPTS -->
    <!-- <script src="{{ asset('public/backend') }}/js/demo.js"></script> -->

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
<!--     <script src="{{ asset('public/backend') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ asset('public/backend') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ asset('public/backend') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{ asset('public/backend') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script> -->

    <!-- ChartJS -->
<!--     <script src="{{ asset('public/backend') }}/plugins/chart.js/Chart.min.js"></script> -->

    <!-- SweetAlert2 -->
    <script src="{{ asset('public/backend') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="{{ asset('public/backend') }}/plugins/toastr/toastr.min.js"></script>

    <!-- PAGE SCRIPTS -->
    <!-- <script src="{{ asset('public/backend') }}/js/pages/dashboard2.js"></script> -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
</body>
</html>