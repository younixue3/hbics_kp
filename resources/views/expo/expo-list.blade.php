@extends('layouts.layout-expo')
@section('content')
<div class="container-fluid">
    {{-- <a class="logo logo--stuck" href="{{url('beranda')}}">
        <img src="{{asset('images/logo.png')}}"/>
    </a> --}}
    <div class="row frame frame2" style="min-height:100vh;">
        <div class="container">
            <div class="row">
                @if ($today >= $event->expo->start && $today >= $event->expo->end)
                <div class="col-md-12">
                    <p class="kategoritext" style="position: relative">
                        <a href="#" id="drop-t">
                            <i class="icofont-rounded-down"></i>
                            <b>Jenjang "{{$jenjang}}" - Kategori "{{$kategori}}"</b>
                        </a>
                        <div id="drop-c" class="drop drop--hide">
                            <a href="{{url('expo/smp/'.$kategori)}}" class="drop-link">SMP</a>
                            <a href="{{url('expo/sma/'.$kategori)}}" class="drop-link">SMA</a>
                            <hr>
                            <a href="{{url('expo/'.$jenjang.'/desain-grafis')}}" class="drop-link">Desain Grafis</a>
                            {{-- @if ($jenjang == 'smp') --}}
                            <a href="{{url('expo/'.$jenjang.'/aplikasi-dan-game')}}" class="drop-link">Aplikasi & Game</a>
                            {{-- @endif --}}
                            <a href="{{url('expo/'.$jenjang.'/food-and-baverage')}}" class="drop-link">Food & Baverage</a>
                            <a href="{{url('expo/'.$jenjang.'/fashion')}}" class="drop-link">Fashion</a>
                            <a href="{{url('expo/'.$jenjang.'/kriya')}}" class="drop-link">Kriya</a>
                        </div>
                    </p>
                    @forelse ($event->schedules as $jadwal)
                        @if ($today >= $jadwal->start && $today <= $jadwal->end)
                            <div class="status">
                                <p class="status-text"><span class="status-grey"><i class="icofont-ui-calendar"></i> Fase Lomba Saat Ini :</span> {{$jadwal->title}} <span class="status-blue">({{$jadwal->start->format('d M Y')}} - {{$jadwal->end->format('d M Y')}})</span></p>
                            </div>
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
                                        @if (count($karya->product_images()) > 0)
                                            <img src="{{url('image/'.$karya->product_images()[0])}}" alt="" class="list-image">
                                        @else
                                            <img src="{{asset('images/sample2.png')}}" alt="" class="list-image">
                                        @endif
                                    </div>
                                    <div class="list-content">
                                        <a style="margin-bottom: 0px;" href="{{url('expo/'.$jenjang.'/'.$kategori.'/'.$karya->id.'/'.str_replace(' ', '-', $karya->product_name))}}" class="list-title">{{$karya->product_name}}</a>
                                        <p class="list-keterangan">{{$karya->product_description}}</p>
                                        <span class="list-likers"><i class="icofont-like"></i> Disukai oleh {{count($karya->product_likers())}} orang</span>
                                        <span class="list-likers"><i class="icofont-comment"></i> {{count($karya->comments)}} Komentar</span>
                                        <br>
                                        <a href="{{url('expo/'.$jenjang.'/'.$kategori.'/'.$karya->id.'/'.str_replace(' ', '-', $karya->product_name))}}" class="list-button">Lihat selengkapnya</a>
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
                    <div class="news-info" style="padding: 20px 30px">
                        <p class="apaitu-title" style="margin-bottom:0px;font-size: 25px;">
                            VIRTUAL EXPO AKAN HADIR DI TANGGAL:<br> {{$event->expo->start->format('d, M Y')}} - {{$event->expo->end->format('d, M Y')}}
                        </p>
                    </div>
                    <img src="{{asset('images/gif/3.gif')}}" class="apaitu-image" alt="">
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