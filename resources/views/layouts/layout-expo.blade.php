<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('images/logo.png')}}">
    <title>KIDSPRENEURSHIP - Virtual Expo</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('bootstrap4/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="{{asset('circle/css/style-default.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('wow/css/libs/animate.css')}}">
    <link rel="stylesheet" href="{{asset('lightbox/css/lightbox.min.css')}}">
    <link href="{{asset('circle/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('owl/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('owl/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('icofont/icofont.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" />
    <!-- font-family: 'Hind', sans-serif; -->
    <link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600,700|Hind+Guntur:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href="{{asset('circle/css/style.css')}}" rel="stylesheet">
    <style>
        .likesbutton
        {
            float: right;
            border: 1px solid #ffbb55;
            padding: 7px 15px 8px 19px;
            color: #ffbb55;
            background-color: #ffbb5523;
            border-top-right-radius: 8px;
            border-top-left-radius: 12px;
            border-bottom-right-radius: 15px;
            border-bottom-left-radius: 16px;
            transition: 0.5s;
        }
        .likesbutton:hover
        {
            transform: scale(1.2)rotate(2deg);
            float: right;
            color: #ffb23d;
            background-color: #ffbb555b;
        }
        .likesbutton--batal
        {
            border: 1px solid #ff7d55;
            color: #ff7d55;
            background-color: #ff7d5523;
        }
        .likesbutton--batal:hover
        {
            color: #ff6b3d;
            background-color: #ff7d555b;
        }
        .alert-xs
        {
            padding: 1px;
            line-height: 0.8rem;
            font-size: 10px;
            background-color: transparent;
            border: 0px solid transparent;
        }
    </style>
</head>
<body class="light">
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbarnya">
        <div class="container">
            <a class="navbar-brand" id="navbrand" href="{{url('beranda')}}">
                <img src="{{asset('images/logo.png')}}"/>
                <img class="navbar-sec navbar-sec--none" src="{{asset('images/sbhb.png')}}"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item {{Request::is('beranda') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('beranda')}}">Beranda</a>
                    </li>
                    <li class="nav-item {{Request::is('expo/*') || Request::is('virtualexpo/*') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('expo/smp/desain-grafis')}}">Virtual Expo</a>
                        {{-- <a class="nav-link" href="{{url('expo/'.$jenjang.'/'.$kategori)}}">Virtual Expo</a> --}}
                    </li>
                    @if (Auth::user()->role == 'pengunjung' || Auth::user()->role == 'juri')
                    <li class="nav-item {{Request::is('logout') ? 'active' : ''}}">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @else
                    <li class="nav-item dropdown {{Request::is('profil') ? 'active' : ''}}">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Profil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{url('profil')}}">Profil</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endif
                </ul>
                <ul class="navbar-nav navbar-sec2">
                    <li class="nav-item">
                        <img style="height: 80px;" src="{{asset('images/sbhb.png')}}"/>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
@php
    $active = App\Event::where('status', 1)->latest()->first();
@endphp
@if ($active)
<div class="sponsor wow fadeInUp" data-wow-delay="1s">
    <div class="container">
        <p class="sponsor-title">
            Support by:
        </p>
        <div class="sponsor-frame">
            @forelse ($active->sponsors as $sponsor)
                <div class="sponsor-image-frame wow fadeInUp" data-wow-delay="1.3s">
                    <img src="{{asset('uploads/sponsors/'.$sponsor->logo)}}" alt="" class="sponsor-image">
                </div>
            @empty                
            @endforelse
        </div>
    </div>
</div>
@endif
<div id="navbreaker"></div>
<!-- /logo -->
@yield('content')
<div class="container-fluid wow fadeIn">
    <div class="row frame footer text-left" style="padding-bottom: 150px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-left">
                    <p class="footer-title wow fadeInUp"><i class="icofont-building-alt"></i> Kidspreneur Festival Epik 2021.</p>
                    <p class="footer-text wow fadeInUp">
                        <i class="icofont-google-map"></i> Indrakila Street No. 99 G - Balikpapan 76125 East Borneo - Indonesia
                    </p>
                    <p class="footer-text wow fadeInUp">
                        <i class="icofont-phone"></i> Telephone : +62542 8510 111
                    </p>
                    <p class="footer-text wow fadeInUp">
                        <i class="icofont-ui-dial-phone"></i> Telephone : +62812 5051 5333
                    </p>
                    <br>
                    <a href="https://www.facebook.com/Harapan-Bangsa-Integrated-Christian-School-681743995288342/" target="_blank" class="footer-sosmed wow fadeInUp" data-wow-delay="1.5s"><i class="icofont-facebook"></i></a>
                    <a href="https://www.instagram.com/kidspreneurship.hbics/" target="_blank" class="footer-sosmed wow fadeInUp" data-wow-delay="1.5s"><i class="icofont-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/UCHJ9hdRwx7ZD-VZBL_GX8Kw" target="_blank" class="footer-sosmed wow fadeInUp" data-wow-delay="1.5s"><i class="icofont-youtube-play"></i></a>
                </div>
                <div class="col-md-3 text-left">
                    <p class="footer-title wow fadeInUp"><i class="icofont-link"></i> Link Terkait.</p>
                    <a href="" class="footer-text wow fadeInUp">Website, </a>
                    <a href="" class="footer-text wow fadeInUp">Academic System, </a>
                    <a href="" class="footer-text wow fadeInUp">Parents System, </a>
                    <a href="" class="footer-text wow fadeInUp">Alumni.</a>
                </div>
                <div class="col-md-3 text-left">
                    <p class="footer-title wow fadeInUp"><i class="icofont-location-arrow"></i> Navigasi.</p>
                    <a href="" class="footer-text wow fadeInUp">Beranda, </a>
                    <a href="" class="footer-text wow fadeInUp">Penyelenggara, </a>
                    <a href="" class="footer-text wow fadeInUp">Kompetisi, </a>
                    <a href="" class="footer-text wow fadeInUp">Galeri, </a>
                    <a href="" class="footer-text wow fadeInUp">Berita, </a>
                    <a href="" class="footer-text wow fadeInUp">Bantuan.</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('circle/js/jquery.min.js')}}"></script>
<script src="{{asset('bootstrap4/js/bootstrap.min.js')}}"></script>
<script src="{{asset('circle/js/custom.js')}}"></script>
<script src="{{asset('lightbox/js/lightbox.min.js')}}"></script>
<script src="{{asset('owl/owl.carousel.min.js')}}"></script>
<script src="{{asset('wow/dist/wow.min.js')}}"></script>
@yield('script')
<script>
    new WOW().init();
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        autoplay:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })
    $(window).scroll(function() {    
    var scroll = $(window).scrollTop();
        if (scroll >= 500) {
            $(".navbarnya").addClass("fixed-top");
            $(".navbarnya").addClass("navwhite");
            $("#navbreaker").addClass("navbreaker--show");
        }
        else {
            $(".navbarnya").removeClass("fixed-top");
            $(".navbarnya").removeClass("navwhite");
            $("#navbreaker").removeClass("navbreaker--show");
        }
    }); 
</script>
</body>
</html>