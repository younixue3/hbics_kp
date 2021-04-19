@extends('layouts.layout-expo')
@section('content')
<div class="container-fluid">
    {{-- <a class="logo logo--stuck" href="{{url('beranda')}}">
        <img src="{{asset('images/logo.png')}}"/>
    </a> --}}
    <div class="row frame frame2" style="min-height:100vh;">
        <div class="container">
            <div class="row">
                @if ($event->expo)
                    <div class="col-md-12">
                        <p class="kategoritext" style="position: relative">
                            <a href="#" id="drop-t">
                                <i class="icofont-rounded-down"></i>
                                <b>Jenjang "{{$jenjang}}" - Kategori "{{$kategori}}"</b>
                            </a>
                            <div id="drop-c" class="drop drop--hide">
                                <a href="{{url('virtualexpo/smp/'.$kategori)}}" class="drop-link">SMP</a>
                                <a href="{{url('virtualexpo/sma/'.$kategori)}}" class="drop-link">SMA</a>
                                <hr>
                                <a href="{{url('virtualexpo/'.$jenjang.'/desain-grafis')}}" class="drop-link">Desain Grafis</a>
                                {{-- @if ($jenjang == 'smp') --}}
                                <a href="{{url('virtualexpo/'.$jenjang.'/aplikasi-dan-game')}}" class="drop-link">Aplikasi & Game</a>
                                {{-- @endif --}}
                                <a href="{{url('virtualexpo/'.$jenjang.'/food-and-baverage')}}" class="drop-link">Food & Baverage</a>
                                <a href="{{url('virtualexpo/'.$jenjang.'/fashion')}}" class="drop-link">Fashion</a>
                                <a href="{{url('virtualexpo/'.$jenjang.'/kriya')}}" class="drop-link">Kriya</a>
                            </div>
                        </p>
                        @forelse($event->timelines as $timeline)
                            @if ($now >= $timeline->tanggal_mulai && $now <= $timeline->tanggal_selesai)
                                <div class="status">
                                    <p class="status-text"><span class="status-grey"><i class="icofont-ui-calendar"></i> Fase Lomba Saat Ini :</span> {{$timeline->nama}} <span class="status-blue">({{$timeline->tanggal_mulai->format('d M Y')}} - {{$timeline->tanggal_selesai->format('d M Y')}})</span></p>
                                </div>
                                <br>
                            @endif
                        @empty
                        <div class="status">
                            <p class="status-text"><span class="status-grey">Tidak ada jadwal</span></p>
                        </div>
                        @endforelse
                    </div>
                    <div class="col-md-12">
                        <br><br>
                        <div class="row">
                            <div class="col-md-12">
                                @forelse ($karyas as $karya)
                                    <div class="list">
                                        <div class="list-imageframe">
                                            @if ($karya->fotos->count() > 0)
                                                <img src="{{url('uploads/karyafotos/'.$karya->fotos->first()->foto)}}" alt="" class="list-image">
                                            @else
                                                <img src="{{asset('images/sample2.png')}}" alt="" class="list-image">
                                            @endif
                                        </div>
                                        <div class="list-content">
                                            <a style="margin-bottom: 0px;" href="{{url('virtualexpo/'.$jenjang.'/'.$kategori.'/'.$karya->id.'/'.str_replace(' ', '-', $karya->nama))}}" class="list-title">{{$karya->nama}}</a>
                                            <p class="list-keterangan">{{$karya->deskripsi}}</p>
                                            <span class="list-likers"><i class="icofont-like"></i> Disukai oleh {{$karya->likers->count()}} orang</span>
                                            <span class="list-likers"><i class="icofont-comment"></i> {{$karya->komentars->count()}} Komentar</span>
                                            <br>
                                            <a href="{{url('virtualexpo/'.$jenjang.'/'.$kategori.'/'.$karya->id.'/'.str_replace(' ', '-', $karya->nama))}}" class="list-button">Lihat selengkapnya</a>
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
    });
</script>
@endsection