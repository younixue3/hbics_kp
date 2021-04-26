@extends('layouts.layout-expo')
@section('content')
<div class="container-fluid">
    {{-- <a class="logo logo--stuck" href="{{url('beranda')}}">
        <img src="{{asset('images/logo.png')}}"/>
    </a> --}}
    <div class="row frame frame2" style="min-height:100vh;" id="trigdrop">
        <div class="container">
            <div class="row">
                @if ($event->expo)
                    @if ($now >= $event->expo->tanggal_mulai && $now <= $event->expo->tanggal_selesai)
                    <div class="col-md-12">
                        <span class="kategoritext wow fadeInUp" style="position: relative;">
                            <a href="#" id="drop-t">
                                <b>{{strToUpper($jenjang)}}</b>
                                <i class="icofont-rounded-down"></i>
                            </a>
                            <div id="drop-c" class="drop drop--hide">
                                <a href="{{url('expo/smp/'.$kategori)}}" class="drop-link">SMP/MTS</a>
                                <a href="{{url('expo/sma/'.$kategori)}}" class="drop-link">SMA/SMK/MAN</a>
                            </div>
                        </span>
                        <span class="kategoritext wow fadeInUp" style="position: relative;">
                            <a href="#" id="dropp-t">
                                <b>{{strToUpper(str_replace('-', ' ', $kategori))}}</b>
                                <i class="icofont-rounded-down"></i>
                            </a>
                            <div id="dropp-c" class="drop drop--hide">
                                <a href="{{url('expo/'.$jenjang.'/desain-grafis')}}" class="drop-link">Desain Grafis</a>
                                {{-- @if ($jenjang == 'smp') --}}
                                <a href="{{url('expo/'.$jenjang.'/aplikasi-dan-game')}}" class="drop-link">Aplikasi & Game</a>
                                {{-- @endif --}}
                                <a href="{{url('expo/'.$jenjang.'/food-and-beverage')}}" class="drop-link">Food & Beverage</a>
                                <a href="{{url('expo/'.$jenjang.'/fashion')}}" class="drop-link">Fashion</a>
                                <a href="{{url('expo/'.$jenjang.'/kriya')}}" class="drop-link">Kriya</a>
                            </div>
                        </span>
                        @forelse($event->timelines as $timeline)
                            @if ($now >= $timeline->tanggal_mulai && $now <= $timeline->tanggal_selesai)
                                <div class="status wow fadeInUp" data-wow-delay="0.5s">
                                    <p class="status-text"><span class="status-grey"><i class="icofont-ui-calendar"></i> Fase Lomba Saat Ini :</span> {{$timeline->nama}} <span class="status-blue">({{$timeline->tanggal_mulai->format('d M Y')}} - {{$timeline->tanggal_selesai->format('d M Y')}})</span></p>
                                </div>
                                <br>
                            @endif
                        @empty
                        <div class="status wow fadeInUp" data-wow-delay="0.5s">
                            <p class="status-text"><span class="status-grey">Tidak ada jadwal</span></p>
                        </div>
                        @endforelse
                    </div>
                    <div class="col-md-12">
                        <br><br>
                        <div class="row">
                            <div class="col-md-12">
                                @forelse ($karyas as $karya)
                                    <div class="list wow fadeInUp" data-wow-delay="0.5s">
                                        <div class="list-imageframe">
                                            @if ($karya->fotos->count() > 0)
                                                <img src="{{url('uploads/karyafotos/'.$karya->fotos->first()->foto)}}" alt="" class="list-image">
                                            @else
                                                <img src="{{asset('images/sample2.png')}}" alt="" class="list-image">
                                            @endif
                                        </div>
                                        <div class="list-content">
                                            <a style="margin-bottom: 0px;" href="{{url('expo/'.$jenjang.'/'.$kategori.'/'.$karya->id.'/'.str_replace(' ', '-', $karya->nama))}}" class="list-title">{{$karya->nama}}</a>
                                            <p class="list-keterangan">{{$karya->deskripsi}}</p>
                                            <span class="list-likers"><i class="icofont-like"></i> Disukai oleh {{$karya->likers->count()}} orang</span>
                                            <span class="list-likers"><i class="icofont-comment"></i> {{$karya->komentars->count()}} Komentar</span>
                                            <br>
                                            <a href="{{url('expo/'.$jenjang.'/'.$kategori.'/'.$karya->id.'/'.str_replace(' ', '-', $karya->nama))}}" class="list-button">Lihat selengkapnya</a>
                                        </div>
                                    </div>
                                @empty
                                    Belum ada karya
                                @endforelse
                            </div>
                        </div>
                    </div>  
                    @else
                    <div class="col-md-12 text-center">
                        <div class="news-info wow fadeInUp" style="padding: 20px 30px">
                            <p class="apaitu-title" style="margin-bottom:0px;font-size: 25px;">
                                VIRTUAL EXPO AKAN HADIR DI TANGGAL:<br> {{$event->expo->tanggal_mulai->format('d, M Y')}} - {{$event->expo->tanggal_selesai->format('d, M Y')}}
                            </p>
                        </div>
                        <img src="{{asset('images/gif/3.gif')}}" class="apaitu-image wow fadeInUp" data-wow-delay="0.2s" alt="">
                    </div>
                    @endif
                @else
                    <div class="col-md-12 text-center">
                        <div class="news-info wow fadeInUp" style="padding: 20px 30px">
                            <p class="apaitu-title" style="margin-bottom:0px;font-size: 25px;">
                                VIRTUAL EXPO AKAN HADIR SEGERA
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
    $('#drop-t').on('click', function(){
        $('#drop-c').toggleClass('drop--hide');
        $('#dropp-c').addClass('drop--hide');
    });
    $('#dropp-t').on('click', function(){
        $('#dropp-c').toggleClass('drop--hide');
        $('#drop-c').addClass('drop--hide');
    });
</script>
@endsection