<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin Area</title>

    <script src="{{ asset('vendor') }}/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name='generator' content='CRUDBooster 5.5.0' />
    <meta name='robots' content='noindex,nofollow' />

    <link rel="dns-prefetch" href="https://oss.maxcdn.com/">
    <link rel="preconnect" href="https://oss.maxcdn.com/" crossorigin>

    <link rel="dns-prefetch" href="https://cdn.rawgit.com/">
    <link rel="preconnect" href="https://cdn.rawgit.com/" crossorigin>

    <link rel="shortcut icon" href="{{ asset('vendor') }}/crudbooster/assets/logo_crudbooster.png">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{ asset('vendor') }}/crudbooster/assets/adminlte/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('vendor') }}/crudbooster/assets/adminlte/font-awesome/css/font-awesome.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor') }}/crudbooster/ionic/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor') }}/crudbooster/assets/adminlte/dist/css/AdminLTE.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('vendor') }}/crudbooster/assets/adminlte/dist/css/skins/_all-skins.min.css" rel="stylesheet"
        type="text/css" />


    <link rel='stylesheet' href='{{ asset('vendor') }}/crudbooster/assets/css/main.css?v=1.0.4' />

    <link rel='stylesheet' href='{{ asset('vendor') }}/crudbooster/assets/select2/dist/css/select2.min.css' />

    <link rel='stylesheet' href='{{ asset('assets') }}/font-awesome/all.min.css' />

    <link rel="stylesheet" type="text/css" href="{{ url('/widgets/selectize/selectize.bootstrap3.css') }}">

    @yield('style')

    @include('layouts.style')
</head>

<body class="skin-blue">

    <div id='app' class="wrapper">

        <header class="main-header">

            {{-- <a href="{{ url('/') }}" title='Elimspro' class="logo">WIM-Project</a> --}}

            <!-- Logo -->
            <a href="{{ url('/') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                    <img src="{{ asset('asset') }}/logo.png" height="40px">
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                    <img src="{{ asset('vendor') }}/logo_elimspro.png" height="50px">
                </span>
            </a>

            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="nav-item dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="{{ isset(Auth::user()->foto) ? Auth::user()->pathFileFoto() : asset('vendor/profil.jpeg') }}"
                                        class="img-circle" alt="User Image" />
                                    <p>
                                        {{ Auth::user()->name }}
                                        <small>{{ Auth::user()->name }}</small>
                                        <small><em>{{ Carbon\Carbon::parse(Auth::user()->created_at)->format('d M Y') }}</em></small>
                                    </p>
                                </li>


                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ url('profile') }}" class="btn btn-default btn-flat"><i
                                                class='fa fa-user'></i> Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="javascript:void(0)"
                                            onclick="swal({
                                        title: 'Apakah anda ingin keluar ?',
                                        type:'info',
                                        showCancelButton:true,
                                        allowOutsideClick:true,
                                        confirmButtonColor: '#DD6B55',
                                        confirmButtonText: 'Keluar',
                                        cancelButtonText: 'Batal',
                                        closeOnConfirm: false
                                        }, function(){

                                            $('#logout-form').submit();

                                        });"
                                            title="Keluar" class="btn btn-danger btn-flat"
                                            style="background-color: #dd4b39 !important;"><i
                                                class='fa fa-power-off'></i></a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ isset(Auth::user()->foto) ? asset('assets/img/' . Auth::user()->foto) : asset('vendor/profil.jpeg') }}"
                            class="rounded-image" alt="Gambar Pengguna" />
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->name }}</p>
                        Role : <a href="#">{{ Auth::user()->role ? Auth::user()->role : null }}</a>
                    </div>
                </div>

                <div class='main-menu'>
                    @include('layouts.sidebar')
                </div>
            </section>
        </aside>

        <div class="content-wrapper">

            @yield('content')

        </div>

        <footer class="main-footer no-print">
            <div class="pull-right hidden-xs">
                Developed by <b>AdminLTE</b>
            </div>
            <strong>Copyright &copy; 2024. All Rights Reserved .</strong>
        </footer>

        <div id="app-loading" style="display: none;">
            <div class="inner">
                <i class="fa fa-spin fa-spinner"></i> <span>Mohon menunggu sebentar...</span>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor') }}/crudbooster/assets/adminlte/bootstrap/js/bootstrap.min.js" type="text/javascript">
    </script>
    <script src="{{ asset('vendor') }}/crudbooster/assets/adminlte/dist/js/app.js" type="text/javascript"></script>

    <script src="{{ asset('vendor') }}/crudbooster/assets/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="{{ asset('vendor') }}/crudbooster/assets/adminlte/plugins/datepicker/locales/bootstrap-datepicker.id.js">
    </script>
    <link rel="stylesheet"
        href="{{ asset('vendor') }}/crudbooster/assets/adminlte/plugins/datepicker/bootstrap-datepicker.min.css">

    <script src="{{ asset('vendor') }}/crudbooster/assets/adminlte/plugins/daterangepicker/moment.min.js"></script>
    <script src="{{ asset('vendor') }}/crudbooster/assets/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
    <link rel="stylesheet"
        href="{{ asset('vendor') }}/crudbooster/assets/adminlte/plugins/daterangepicker/daterangepicker-bs3.css">

    <link rel="stylesheet"
        href="{{ asset('vendor') }}/crudbooster/assets/adminlte/plugins/timepicker/bootstrap-timepicker.min.css">
    <script src="{{ asset('vendor') }}/crudbooster/assets/adminlte/plugins/timepicker/bootstrap-timepicker.min.js">
    </script>

    <link rel='stylesheet' href='{{ asset('vendor') }}/crudbooster/assets/lightbox/dist/css/lightbox.min.css' />
    <script src="{{ asset('vendor') }}/crudbooster/assets/lightbox/dist/js/lightbox.min.js"></script>

    <script src="{{ asset('vendor') }}/crudbooster/assets/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vendor') }}/crudbooster/assets/sweetalert/dist/sweetalert.css">

    <script src="{{ asset('vendor') }}/crudbooster/jquery.price_format.2.0.min.js"></script>

    <link rel="stylesheet"
        href="{{ asset('vendor') }}/crudbooster/assets/adminlte/plugins/datatables/dataTables.bootstrap.css">
    <script src="{{ asset('vendor') }}/crudbooster/assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('vendor') }}/crudbooster/assets/adminlte/plugins/datatables/dataTables.bootstrap.min.js">
    </script>

    <link rel="stylesheet"
        href="{{ asset('vendor') }}/crudbooster/assets/adminlte/plugins/datatables/extensions/FixedHeader/css/dataTables.fixedHeader.min.css">
    <script
        src="{{ asset('vendor') }}/crudbooster/assets/adminlte/plugins/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.min.js">
    </script>

    <script src='{{ asset('vendor') }}/crudbooster/assets/select2/dist/js/select2.full.min.js'></script>

    <script src="{{ asset('vendor') }}/crudbooster/assets/js/main.js?v=1.0.2"></script>
    <script src="{{ asset('vendor') }}/webcam/webcam.js"></script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    @include('layouts.script_custom')

    @yield('js')

</body>

</html>
