<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <title>@yield('title',config('app.name'))</title>

  <!-- principal -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/propio.css') }}">

  <!-- fav-icon -->
  <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

  <!-- material dashboard -->
  <link rel="stylesheet" href="{{ asset('css/material/material-dashboard.css?v=2.1.1') }}">

  <!-- font awesome 5.7.1 -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.css') }}">

  <!-- Datepicker -->
  <link rel="stylesheet" href="{{ asset('plugins/datepicker/jquery-ui.css') }}">

  <!-- Datatables -->
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/DataTables-1.10.18/css/dataTables.jqueryui.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/Responsive-2.2.2/css/responsive.jqueryui.css')}}">


</head>

<body class="">
  <div class="wrapper">

    <!--
      data-color="purple | azure | green | orange | danger"
      data-background-color = "black | white"
    -->
    <!-- sidebar -->
    <div class="sidebar" data-color="danger" data-background-color="black" data-image="{{ asset('img/sidebar-3.jpg') }}">

      <!-- logo -->
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          {{ config('app.name', 'Laravel') }}
        </a>
      </div>

      <!-- Menu -->
      <div class="sidebar-wrapper">
        <ul class="nav">

          <li class="nav-item {{ Request::segment(1) === 'dashboard' ? 'active' : null }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Inicio</p>
            </a>
          </li>

          <li class="nav-item {{ Request::segment(1) === 'users' ? 'active' : null }}">
            <a class="nav-link" href="{{ route('users.index') }}">
              <i class="material-icons">people</i>
              <p>Usuarios</p>
            </a>
          </li>

          <li class="nav-item {{ Request::segment(1) === 'sectores' ? 'active' : null }}">
            <a class="nav-link" href="{{ route('sectores.index') }}">
              <i class="material-icons">maps</i>
              <p>Municipios</p>
            </a>
          </li>

        </ul>
      </div>
    </div>

    <!-- right derecho -->
    <div class="main-panel">

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top">
        <div class="container-fluid">

          <!-- header -->
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#">@yield('header')</a>
          </div>

          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>

          <!-- navbar collapse -->
          <div class="collapse navbar-collapse justify-content-end">

            @yield('navbar')

            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <a class="nav-link" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="material-icons">person</i>
                      {{ Auth::user()->name }} <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('perfil') }}">Perfil</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('salir') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          Salir
                      </a>

                      <form id="logout-form" action="{{ route('salir') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </div>
                @endguest

              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- contenido -->
      <div class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
    </div>
  </div>


  <!-- footer -->
  <footer class="footer">
    <div class="container-fluid">
      <nav class="float-left">
        @yield('footer')
      </nav>
      <div class="copyright float-right">
        <strong>Copyright &copy; {{ date('Y') }}</strong> All rights reserved.
      </div>
    </div>
  </footer>

  <!-- SCRIPTS -->

  <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

  <!-- Jquery -->
  <script src="{{ asset('js/material/core/jquery.min.js') }}"></script>

  <!-- popper -->
  <script src="{{ asset('js/material/core/popper.min.js') }}"></script>

  <!-- bootstrap material dashboard -->
  <script src="{{ asset('js/material/core/bootstrap-material-design.min.js') }}"></script>

  <!-- scrollbar -->
  <script src="{{ asset('js/material/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

  <!-- Plugin for the momentJs  -->
  <script src="{{ asset('js/material/plugins/moment.min.js') }}"></script>

  <!--  Plugin for Sweet Alert -->
  <script src="{{ asset('js/material/plugins/sweetalert2.js') }}"></script>

  <!-- Forms Validations Plugin -->
  <script src="{{ asset('js/material/plugins/jquery.validate.min.js') }}"></script>

  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{ asset('js/material/plugins/jquery.bootstrap-wizard.js') }}"></script>

  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{ asset('js/material/plugins/bootstrap-selectpicker.js') }}"></script>

  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="{{ asset('plugins/datatables/datatables.js') }}"></script>
  <script src="{{ asset('plugins/datatables/Responsive-2.2.2/js/responsive.jqueryui.js')}}"></script>

  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{ asset('js/material/plugins/bootstrap-tagsinput.js') }}"></script>

  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{ asset('js/material/plugins/jasny-bootstrap.min.js') }}"></script>

  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{{ asset('js/material/plugins/fullcalendar.min.js') }}"></script>

  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="{{ asset('js/material/plugins/jquery-jvectormap.js') }}"></script>

  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('js/material/plugins/nouislider.min.js') }}"></script>

  <!-- Library for adding dinamically elements -->
  <script src="{{ asset('js/material/plugins/arrive.min.js') }}"></script>

  <!-- Chartist JS -->
  <script src="{{ asset('js/material/plugins/chartist.min.js') }}"></script>

  <!--  Notifications Plugin    -->
  <script src="{{ asset('js/material/plugins/bootstrap-notify.js') }}"></script>

  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/material/material-dashboard.js?v=2.1.1') }}"></script>

  <!-- datapicker -->
  <script src="{{ asset('plugins/datepicker/jquery-ui.js') }}"></script>

  <!-- number format -->
  <script src="{{ asset('plugins/numberformat/input-number-format.jquery.js') }}"></script>

  <!-- js propio -->
  <script src="{{ asset('js/propio.js') }}"></script>

  @yield('script')

</body>
</html>
