<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/light-bootstrap-dashboard.css?v=2.0.1') }} " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('css/demo.css') }} " rel="stylesheet" />

    @yield('style')

</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-color="blue" data-image="{{ asset('img/sidebar.jpg') }}">
            <div class="sidebar-wrapper">
                <!-- Logo -->
                <div class="logo">
                    <a href="#" class="simple-text logo-mini">
                        <img src="{{ asset('img/favicon.png')}} " style="width: 100%">
                    </a>
                    <a href="#" class="simple-text logo-normal" style="text-transform:none;">
                        e-Library
                    </a>
                </div>
                <!-- End Logo -->
                
                <!-- Profile -->
                <div class="user">
                    <div class="photo">
                        <img src="{{ asset('img/avatar.png') }}">
                    </div>
                    <div class="info ">
                        <a><span>{{ Auth::user()->name }}</span></a>
                    </div>
                </div>
                <!-- End Profile -->
                
                <!-- Sidebar Nav -->
                <ul class="nav">
                    {{-- <li class="nav-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#navbuku">
                            <i class="nc-icon nc-bullet-list-67"></i>
                            <p>BUKU<b class="caret"></b></p>
                        </a>

                        @if ( strpos( Route::currentRouteName(), 'book') !== false )
                            <div class="collapse show" id="navbuku">
                        @else
                            <div class="collapse" id="navbuku">
                        @endif
                        
                            <ul class="nav">
                                <li class="nav-item {{ Route::currentRouteName() == 'book.index' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('book.index') }}">
                                        <span class="sidebar-mini">SB</span>
                                        <span class="sidebar-normal">Senarai Buku</span>
                                    </a>
                                </li>
                                {{-- role and permission --}}
                                @role('pentadbir')
                                    <li class="nav-item {{ Route::currentRouteName() == 'book.create' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('book.create') }}">
                                            <span class="sidebar-mini">TB</span>
                                            <span class="sidebar-normal">Tambah Buku</span>
                                        </a>
                                    </li>
                                @endrole
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#navpinjam">
                            <i class="nc-icon nc-notes"></i>
                            <p>
                                Pinjaman
                                <b class="caret"></b>
                            </p>
                        </a>
                        @if ( strpos( Route::currentRouteName(), 'borrow') !== false )
                            <div class="collapse show" id="navpinjam">
                        @else
                            <div class="collapse" id="navpinjam">
                        @endif
                            <ul class="nav">
                                <li class="nav-item {{ Route::currentRouteName() == 'borrow.index' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('borrow.index') }}">
                                        <span class="sidebar-mini">SP</span>
                                        <span class="sidebar-normal">Senarai Pinjaman</span>
                                    </a>
                                </li>
                                {{-- role and permission --}}
                                @role('pemohon')
                                    <li class="nav-item {{ Route::currentRouteName() == 'borrow.create' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('borrow.create') }}">
                                            <span class="sidebar-mini">BP</span>
                                            <span class="sidebar-normal">Borang Pinjaman</span>
                                        </a>
                                    </li>
                                @endrole
                                {{-- <li class="nav-item ">
                                    <a class="nav-link" href="#">
                                        <span class="sidebar-mini"></span>
                                        <span class="sidebar-normal">Sub 3</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nc-icon nc-delivery-fast"></i>
                            <p>Other Nav Here</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nc-icon nc-explore-2"></i>
                            <p>Other Nav Here</p>
                        </a>
                    </li> --}}
                </ul>
                <!-- End Sidebar Nav -->
            </div>
        </div>
        <!-- End Sidebar -->
        
        <!-- Content -->
        <div class="main-panel">
            <!-- Navbar Header-->
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-primary btn-fill btn-round btn-icon d-none d-lg-block">
                                <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                                <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#"> Dashboard</a>
                    </div>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{-- Adam Danish --}}
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">
                                        <i class="nc-icon nc-circle-09"></i> Profil
                                    </a>
                                    <div class="divider"></div>
                                    <a href="{{ route('logout') }}" class="dropdown-item text-danger"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="nc-icon nc-button-power"></i> Log Keluar
                                    </a>
                                    {{-- edit logout --}}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar Header-->
            
            <!-- Main Content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!-- End Main Content -->
            
            <!-- Footer -->
            <footer class="footer">
                <div class="container">
                    <nav>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            Hakcipta Terpelihara
                        </p>
                    </nav>
                </div>
            </footer>
            <!-- End Footer -->
        </div>
        <!-- End Content -->
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{ asset('js/plugins/bootstrap-switch.js') }}"></script>
    <!--  Chartist Plugin  -->
    <script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
    <!--  jVector Map  -->
    <script src="{{ asset('js/plugins/jquery-jvectormap.js') }}" type="text/javascript"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
    <!--  DatetimePicker   -->
    <script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}"></script>
    <!--  Sweet Alert  -->
    <script src="{{ asset('js/plugins/sweetalert2.min.js') }}" type="text/javascript"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> --}}
    <!--  Tags Input  -->
    <script src="{{ asset('js/plugins/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
    <!--  Sliders  -->
    <script src="{{ asset('js/plugins/nouislider.js') }}" type="text/javascript"></script>
    <!--  Bootstrap Select  -->
    <script src="{{ asset('js/plugins/bootstrap-selectpicker.js') }}" type="text/javascript"></script>
    <!--  jQueryValidate  -->
    <script src="{{ asset('js/plugins/jquery.validate.min.js') }}" type="text/javascript"></script>
    <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="{{ asset('js/plugins/jquery.bootstrap-wizard.js') }}"></script>
    <!--  Bootstrap Table Plugin -->
    <script src="{{ asset('js/plugins/bootstrap-table.js') }}"></script>
    <!--  DataTable Plugin -->
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <!--  Full Calendar   -->
    <script src="{{ asset('js/plugins/fullcalendar.min.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/light-bootstrap-dashboard.js?v=2.0.1') }}" type="text/javascript"></script>
    <!-- Light Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('js/demo.js') }}"></script>
    
    @yield('script')

</body>
</html>