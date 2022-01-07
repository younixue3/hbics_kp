<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('images/LOGO KP -02.png')}}">
    <title>KIDSPRENEURSHIP - Login</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('bootstrap4/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Theme CSS -->
    {{-- <link href="{{asset('circle/css/style-default.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('wow/css/libs/animate.css')}}">
    <link rel="stylesheet" href="{{asset('lightbox/css/lightbox.min.css')}}">
    <link href="{{asset('circle/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('circle/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('icofont/icofont.min.css')}}">
    <!-- font-family: 'Hind', sans-serif; -->
    <link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600,700|Hind+Guntur:300,400,500,700'
          rel='stylesheet' type='text/css'>

    <meta name="csrf-token" content="{{ csrf_token() }}"/>
</head>
<body class="light">
<!-- /logo -->
@yield('content')
<script src="{{asset('circle/js/jquery.min.js')}}"></script>
<script src="{{asset('bootstrap4/js/bootstrap.min.js')}}"></script>
<script src="{{asset('circle/js/custom.js')}}"></script>
<script src="{{asset('lightbox/js/lightbox.min.js')}}"></script>
<script src="{{asset('wow/dist/wow.min.js')}}"></script>
@yield('script')
<script>
    new WOW().init();
</script>
</body>
</html>
