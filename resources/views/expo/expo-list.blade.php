@extends('layouts.layout-expo')
@section('content')
    <div class="container-fluid">
        {{-- <a class="logo logo--stuck" href="{{url('beranda')}}">
            <img src="{{asset('images/logo.png')}}"/>
        </a> --}}
        <div class="row frame frame2" style="min-height:100vh;" id="trigdrop">
            <div class="container">
                <div class="row">
                    @if ($event)
                        {{--                    @if ($now >= $event->tanggal_mulai)--}}
                        <div class="col-md-12">
                            @if($jenjang == null)
                            @else
                                <span class="kategoritext wow fadeInUp" style="position: relative;">
                            <a href="#" id="drop-t">
                                @if($jenjang == null)
                                @else
                                    <b>{{strToUpper($jenjang)}}</b>
                                @endif
                                <i class="icofont-rounded-down"></i>
                            </a>
                            @if($jenjang == null)
                                    @else
                                        <div id="drop-c" class="drop drop--hide">
                                <a href="{{url('expo/smp/'.$kategori)}}" class="drop-link">SMP/MTS</a>
                                <a href="{{url('expo/sma/'.$kategori)}}" class="drop-link">SMA/SMK/MAN</a>
                            </div>
                                    @endif
                        </span>
                            @endif
                            <span class="kategoritext wow fadeInUp" style="position: relative;">
                            <a href="#" id="dropp-t">
                                    <b>{{$kategori_view}}</b>
                                <i class="icofont-rounded-down"></i>
                            </a>
                            <div id="dropp-c" class="drop drop--hide">
                                @if($jenjang == null)
                                    <a href="{{url('lomba_pendukung/steam_challenge')}}"
                                       class="drop-link">STEAM Challenge</a>
                                    <a href="{{url('lomba_pendukung/story_telling')}}"
                                       class="drop-link">Story Telling</a>
                                    <a href="{{url('lomba_pendukung/food_platting')}}"
                                       class="drop-link">Food Platting</a>
                                    <a href="{{url('lomba_pendukung/food_presentation')}}"
                                       class="drop-link">Food Presentation</a>
                                @else
                                    @foreach($kategorinya as $value)
                                        <a href="{{url('expo/'.$jenjang.'/'.$value->id)}}"
                                           class="drop-link">{{$value->kategori}}</a>
                                    @endforeach
                                @endif
                                {{-- @if ($jenjang == 'smp') --}}
                                {{--                                <a href="{{url('expo/'.$jenjang.'/aplikasi-dan-game')}}" class="drop-link">Aplikasi & Game</a>--}}
                                {{--                                --}}{{-- @endif --}}
                                {{--                                <a href="{{url('expo/'.$jenjang.'/food-and-beverage')}}" class="drop-link">Food & Beverage</a>--}}
                                {{--                                <a href="{{url('expo/'.$jenjang.'/fashion')}}" class="drop-link">Fashion</a>--}}
                                {{--                                <a href="{{url('expo/'.$jenjang.'/kriya')}}" class="drop-link">Kriya</a>--}}
                            </div>
                        </span>
                        </div>
                        <div class="col-md-12">
                            <br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    @if($event != null)
{{--                                        {{dd($event)}}--}}
                                        @foreach ($event as $karya)
{{--                                                                                {{dd($karya->karya)}}--}}
                                        @if($karya->karya == null)
                                            @else
                                                <div class="list wow fadeInUp" data-wow-delay="0.5s">
                                                    <div class="list-imageframe">
                                                        @if($jenjang == null)
                                                            <iframe style="width: 400px; height: 200px" src="{{str_replace('.com/watch?v=', '-nocookie.com/embed/', $karya->karya->link_presentation)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                        @else
                                                            @if($karya->karya->foto->first() == null)
                                                                @else
                                                                <img
                                                                    src="{{asset('uploads/karyafotos/' . $karya->karya->foto->first()->foto)}}"
                                                                    alt="" class="list-image">
                                                            @endif
                                                        @endif
                                                    </div>
                                                    <div class="list-content">
                                                        <a style="margin-bottom: 0px;"
                                                           @if($jenjang == null)
                                                               href="{{url('lomba_pendukung/detail/'.$karya->id)}}"
                                                           class="list-title">{{$karya->name}}
                                                        @else
                                                            href="{{url('expo/'.$jenjang.'/'.$kategori.'/'.$karya->karya->id.'/'.str_replace(' ', '-', $karya->karya->nama))}}"
                                                                class="list-title">{{$karya->karya->nama}}
                                                            @endif
                                                        </a>
                                                        @if($jenjang == null)
                                                            <p class="list-keterangan">{{$karya->desc}}</p>
                                                        @else
                                                            <p class="list-keterangan">{{$karya->karya->deskripsi}}</p>
                                                        @endif
                                                        <span class="list-likers"><i class="icofont-like"></i> Disukai oleh
                                                        {{$karya->karya->likes->count()}}
                                                        orang</span>
                                                        <span class="list-likers"><i class="icofont-comment"></i>
                                                        {{$karya->karya->komentars->count()}}
                                                        Komentar</span>
                                                        <br>
                                                        {{--                                                    <a href="{{url('expo/'.$jenjang.'/'.$kategori.'/'.$karya->karya->id.'/'.str_replace(' ', '-', $karya->karya->nama))}}"--}}
                                                        {{--                                                       class="list-button">Lihat selengkapnya</a>--}}
                                                    </div>
                                                </div>
                                            @endif
{{--                                        @empty--}}
{{--                                            Belum ada karya--}}
                                        @endforeach
                                    @else
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{--                    @else--}}
                        {{--                    <div class="col-md-12 text-center">--}}
                        {{--                        <div class="news-info wow fadeInUp" style="padding: 20px 30px">--}}
                        {{--                            <p class="apaitu-title" style="margin-bottom:0px;font-size: 25px;">--}}
                        {{--                                VIRTUAL EXPO AKAN HADIR DI TANGGAL:<br> {{$event->expo->tanggal_mulai->format('d, M Y')}} - {{$event->expo->tanggal_selesai->format('d, M Y')}}--}}
                        {{--                            </p>--}}
                        {{--                        </div>--}}
                        {{--                        <img src="{{asset('images/gif/3.gif')}}" class="apaitu-image wow fadeInUp" data-wow-delay="0.2s" alt="">--}}
                        {{--                    </div>--}}
                        {{--                    @endif--}}
                    @else
                        <div class="col-md-12 text-center">
                            <div class="news-info wow fadeInUp" style="padding: 20px 30px">
                                <p class="apaitu-title" style="margin-bottom:0px;font-size: 25px;">
                                    VIRTUAL ExPO AKAN HADIR SEGERA
                                </p>
                            </div>
                            <img src="{{asset('images/gif/3.gif')}}" class="apaitu-image wow fadeInUp" alt="">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#drop-t').on('click', function () {
            $('#drop-c').toggleClass('drop--hide');
            $('#dropp-c').addClass('drop--hide');
        });
        $('#dropp-t').on('click', function () {
            $('#dropp-c').toggleClass('drop--hide');
            $('#drop-c').addClass('drop--hide');
        });
    </script>
@endsection
