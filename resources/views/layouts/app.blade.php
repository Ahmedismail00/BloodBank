<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BloodBank</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
    </ul>


    <!-- Right navbar links -->
              <!-- User Account: style can be found in dropdown.less -->
      <ul class="navbar-nav ml-auto">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @if(Illuminate\Support\Facades\Auth::check())
              {{auth()->user()->name}}
              @endif</span>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{url(route('users.edit',auth()->user()->id))}}">Profile</a>
              <a class="dropdown-item" href="{{url(route('logout'))}}">Sign out</a>
          </div>
      </div>
      </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}"
           alt="BloodBank Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">BloodBank</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{url(route('home'))}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('categories.index'))}}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>Categories</p>
          </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('cities.index'))}}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>Cities</p>
          </a>
          </li>
          <li class="nav-item">
              <a href="{{url(route('clients.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Clients</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('donationRequests.index'))}}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>Donation Requests</p>
          </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('governorates.index'))}}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>Governorates</p>
          </a>
          </li>
          <li class="nav-item">
              <a href="{{url(route('posts.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Posts</p>
            </a>
          </li>
          <li class="nav-item">
              <a href="{{url(route('contacts.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Contacts</p>
            </a>
          </li>
            <li class="nav-item">
              <a href="{{url(route('users.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Users</p>
            </a>
          </li>
            <li class="nav-item">
              <a href="{{url(route('roles.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Roles</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('settings.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>Settings</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>@yield('page_title') <small>@yield('small_title')</small></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                <li class="breadcrumb-item active">@yield('small_title')</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlte/dist/js/demo.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });

</script>
    @stack('scripts')
</body>
</html>
