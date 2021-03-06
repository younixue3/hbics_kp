<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Admin - Kidspreneur Festival</title>
    <meta content="Admin Dashboard" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" href="{{asset('images/logo.png')}}" type="image/png">
    <!-- App Icons -->
    <link rel="shortcut icon" href="{{asset('tadmin/images/favicon.ico')}}">
    <link href="{{asset('tadmin/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('tadmin/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <!--calendar css-->
    <link href="../plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet"/>
    <!--Summernote-->
    <link href="{{asset('summernote/dist/summernote.css')}}" rel="stylesheet" type="text/css">
    <!-- Basic Css files -->
    <link href="{{asset('tadmin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('icofont/icofont.min.css')}}">
    <link href="{{asset('tadmin/css/style.css')}}" rel="stylesheet" type="text/css">
    <style>
        .act {
            background-color: #f2f2f2 !important;
            border-left: 3px solid black !important;
        }

        .lama {
            background-color: #f2f2f2;
            padding: 20px;
            font-size: 13px;
            color: #929292
        }

        .lama img {
            max-width: 100px;
            max-height: 100px;
            display: block;
        }

        .tabledetail th {
            width: 20%;
        }

        .alert-sm {
            padding: 5px 15px;
        }

        .alert-xs {
            padding: 0px 3px 0px 0px;
            font-size: 12px;
            background-color: transparent;
        }

        .imagegaleri {
            width: 100%;
            height: 200px;
            object-fit: cover;
            margin-bottom: 30px;
        }

        .imagegaleri-delete {
            font-size: 10px;
            background-color: rgb(240, 72, 72);
            padding: 5px 10px;
            border-radius: 5px;
            display: inline;
            position: absolute;
            margin-top: 20px;
            margin-left: 30px;
            color: white;
            left: 0;
            transition: 0.5s;
        }

        .imagegaleri-delete:hover {
            color: white;
            background-color: rgb(207, 24, 24);
        }

        .hidee {
            display: none !important;
            visibility: hidden;
        }

        .btn-default {
            background-color: #e4e4e4;
            color: #929292;
        }

        .btn-default:hover {
            color: #929292;
            cursor: not-allowed;
        }
    </style>
</head>
<body class="fixed-left">
<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>

<!-- Begin page -->
<div id="wrapper">

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="">
                <!--<a href="index.html" class="logo text-center">Admiria</a>-->
                <a href="index.html" class="logo"><img src="{{asset('images/logo-white.png')}}" height="36" alt="logo"></a>
            </div>
        </div>

        <div class="sidebar-inner slimscrollleft">
            <div id="sidebar-menu">
                <ul>
                    <li class="menu-title">Profil Akun</li>
                    <li>
                        <a href="{{url('profils')}}" class="waves-effect {{Request::is('profils') ? 'act' : ''}}"><i
                                class="icofont-user"></i><span> Profil </span></a>
                    </li>
                    <li>
                        <a href="{{asset('panduan.pdf')}}" target="_blank" class="waves-effect"><i
                                class="icofont-book"></i><span> Panduan </span></a>
                    </li>
                    <li class="menu-title">Halaman Publik</li>
                    <li>
                        <a href="{{url('posts')}}"
                           class="waves-effect {{Request::is('posts') || Request::is('posts/*') ? 'act' : ''}}"><i
                                class="icofont-newspaper"></i><span> Postingan </span></a>
                    </li>
                    <li>
                        <a href="{{url('galeris')}}"
                           class="waves-effect {{Request::is('galeris') || Request::is('galeris/*') ? 'act' : ''}}"><i
                                class="icofont-image"></i><span> Galeri </span></a>
                    </li>
                    <li class="menu-title">Event Menu</li>
                    <li>
                        <a href="{{url('events')}}"
                           class="waves-effect {{Request::is('events') || Request::is('events/*') || Request::is('timelines/*') || Request::is('juris/*') || Request::is('pesertas/*') ? 'act' : ''}}"><i
                                class="icofont-mega-phone"></i><span> Event </span></a>
                    </li>
                    <li class="menu-title">Extras</li>
                    <li>
                        <a href="{{url('visitors')}}"
                           class="waves-effect {{Request::is('visitors') || Request::is('visitors/*') ? 'act' : ''}}"><i
                                class="icofont-people"></i><span> Data Peserta </span></a>
                    </li>
                    <li>
                        <a href="{{url('panitia')}}"
                           class="waves-effect {{Request::is('panitia') || Request::is('panitia/*') ? 'act' : ''}}"><i
                                class="icofont-user-suited"></i><span> Data Panitia </span></a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- end sidebarinner -->
    </div>
    <!-- Left Sidebar End -->


    <!-- Start right Content here -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            <!-- Top Bar Start -->
            <div class="topbar">

                <nav class="navbar-custom">
                    <ul class="list-inline float-right mb-0">
                        <!-- Fullscreen -->
                        <li class="list-inline-item dropdown notification-list hidden-xs-down">
                            <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                                <i class="mdi mdi-fullscreen noti-icon"></i>
                            </a>
                        </li>
                        <!-- User-->
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown"
                               href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <img src="{{asset('images/juri.png')}}" style="object-fit:cover;" alt="user"
                                     class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="dripicons-exit text-muted"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>

                    <!-- Page title -->
                    <ul class="list-inline menu-left mb-0">
                        <li class="list-inline-item">
                            <button type="button" class="button-menu-mobile open-left waves-effect">
                                <i class="ion-navicon"></i>
                            </button>
                        </li>
                        <li class="hide-phone list-inline-item app-search">
                            <h3 class="page-title">{{Auth::user()->name}}</h3>
                        </li>
                    </ul>

                    <div class="clearfix"></div>
                </nav>

            </div>
            <!-- Top Bar End -->
            @yield('content')
        </div>

        <footer class="footer">
            ??2020 all rights reserved
        </footer>
    </div>
    <!-- End Right content here -->
</div>
<!-- END wrapper -->
<!-- jQuery  -->
<script src="{{asset('tadmin/js/jquery.min.js')}}"></script>
<script src="{{asset('tadmin/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('tadmin/js/modernizr.min.js')}}"></script>
<script src="{{asset('tadmin/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('tadmin/js/waves.js')}}"></script>
<script src="{{asset('tadmin/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('tadmin/js/jquery.scrollTo.min.js')}}"></script>
<!-- Jquery-Ui -->
<script src="{{asset('summernote/dist/summernote.min.js')}}"></script>
<!-- App js -->
<script src="{{asset('tadmin/js/app.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 300,
            placeholder: 'Masukkan teks di sini',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
            ]
        });
        $('.popover-content').hide();
    });
</script>
</body>
</html>
<!-- end document-->
