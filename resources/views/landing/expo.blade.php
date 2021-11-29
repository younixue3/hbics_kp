@extends('layouts.layout-landing')
@section('content')
<div class="container-fluid">
    <a class="logo logo--stuck" href="{{url('/')}}">
        <img src="{{asset('images/LOGO KP -02.png')}}"/>
    </a>
    <div class="row frame frame2">
        <img src="{{asset('images/gif/2.gif')}}" class="arrow2 arrow2--top-right wow fadeInUp" data-wow-delay="2s" alt="">
        <img src="{{asset('images/gif/2.gif')}}" class="arrow2 arrow2--bottom-left wow fadeInUp" data-wow-delay="1s" alt="">
        <div class="container">
            <div class="kategori">
                {{-- <p class="kategori-title text-center">
                    CEK KATEGORINYA YA ^.^
                </p> --}}
                <div class="kategori-frame">
                    <img src="{{asset('images/gif/6.gif')}}" alt="" class="petik petik--left-top wow fadeInUp">
                    <img src="{{asset('images/gif/6.gif')}}" alt="" class="petik petik--left-bottom wow fadeInUp" data-wow-delay="1s">
                    <img src="{{asset('images/gif/6.gif')}}" alt="" class="petik petik--right-top wow fadeInUp">
                    <img src="{{asset('images/gif/6.gif')}}" alt="" class="petik petik--right-bottom wow fadeInUp" data-wow-delay="1s">
                    <a href="{{url('expo/'.$jenjang.'/desain-grafis')}}" class="kategori-icon-frame wow fadeInUp" data-wow-delay="1s">
                        <img src="{{asset('images/kategori/h-desain.png')}}" alt="" class="kategori-icon wow fadeInUp">
                        <p class="kategori-text wow fadeInUp">Desain Grafis</p>
                    </a>
                    {{-- @if ($jenjang == 'smp') --}}
                    <a href="{{url('expo/'.$jenjang.'/aplikasi-dan-game')}}" class="kategori-icon-frame wow fadeInUp" data-wow-delay="1.3s">
                        <img src="{{asset('images/kategori/h-aplikasi.png')}}" alt="" class="kategori-icon wow fadeInUp">
                        <p class="kategori-text wow fadeInUp">Aplikasi & Game</p>
                    </a>
                    {{-- @endif --}}
                    <a href="{{url('expo/'.$jenjang.'/food-and-beverage')}}" class="kategori-icon-frame wow fadeInUp" data-wow-delay="1.5s">
                        <img src="{{asset('images/kategori/h-fnb.png')}}" alt="" class="kategori-icon wow fadeInUp">
                        <p class="kategori-text wow fadeInUp">Food & Beverage</p>
                    </a>
                    <a href="{{url('expo/'.$jenjang.'/fashion')}}" class="kategori-icon-frame wow fadeInUp" data-wow-delay="1.8s">
                        <img src="{{asset('images/kategori/h-fashion.png')}}" alt="" class="kategori-icon wow fadeInUp" data-wow-delay="1s">
                        <p class="kategori-text wow fadeInUp" data-wow-delay="1s">Fashion</p>
                    </a>
                    <a href="{{url('expo/'.$jenjang.'/kriya')}}" class="kategori-icon-frame wow fadeInUp" data-wow-delay="2s">
                        <img src="{{asset('images/kategori/h-kriya.png')}}" alt="" class="kategori-icon wow fadeInUp" data-wow-delay="1s">
                        <p class="kategori-text wow fadeInUp" data-wow-delay="1s">Kriya</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
