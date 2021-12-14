@extends('layouts.layout-landing')
@section('content')
    <div class="container-fluid">
        <a class="logo logo--stuck" href="{{url('/')}}">
            <img src="{{asset('images/LOGO KP -02.png')}}"/>
        </a>
        <div class="row frame frame2">
            <img src="{{asset('images/gif/2.gif')}}" class="arrow2 arrow2--top-right wow fadeInUp" data-wow-delay="2s"
                 alt="">
            <img src="{{asset('images/gif/2.gif')}}" class="arrow2 arrow2--bottom-left wow fadeInUp" data-wow-delay="1s"
                 alt="">
            <div class="container">
                <div class="kategori">
                    {{-- <p class="kategori-title text-center">
                        CEK KATEGORINYA YA ^.^
                    </p> --}}
                    <div class="kategori-frame">
                        <img src="{{asset('images/gif/6.gif')}}" alt="" class="petik petik--left-top wow fadeInUp">
                        <img src="{{asset('images/gif/6.gif')}}" alt="" class="petik petik--left-bottom wow fadeInUp"
                             data-wow-delay="1s">
                        <img src="{{asset('images/gif/6.gif')}}" alt="" class="petik petik--right-top wow fadeInUp">
                        <img src="{{asset('images/gif/6.gif')}}" alt="" class="petik petik--right-bottom wow fadeInUp"
                             data-wow-delay="1s">
                        @foreach($kategori as $key => $value)
                            <a href="{{url('expo/'.$jenjang.'/'.$value->id)}}" class="kategori-icon-frame wow fadeInUp"
                               data-wow-delay="1s">
                                <img src="{{asset($value->photo)}}" alt=""
                                     class="kategori-icon wow fadeInUp">
                                <p class="kategori-text wow fadeInUp">{{$value->kategori}}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
