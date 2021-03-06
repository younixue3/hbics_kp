@extends('layouts.layout-simulasi')
@section('content')
    {{--    {{dd($karyas)}}--}}
    <div class="container-fluid">
        {{-- <a class="logo logo--stuck" href="{{url('beranda')}}">
            <img src="{{asset('images/logo.png')}}"/>
        </a> --}}
        <div class="row frame frame2" style="min-height:100vh;">
            <div class="container">
                <div class="row">
                    {{--                {{dd($event->expo)}}--}}
                    @if ($event)
                        <div class="col-md-12">
                        <span class="kategoritext wow fadeInUp" style="position: relative;">
                            <a href="#" id="drop-t">
{{--                                <b>{{strToUpper($jenjang)}}</b>--}}
                                <i class="icofont-rounded-down"></i>
                            </a>
                            <div id="drop-c" class="drop drop--hide">
{{--                                <a href="{{url('virtualexpo/smp/'.$kategori)}}" class="drop-link">SMP/MADRASAH</a>--}}
                                {{--                                <a href="{{url('virtualexpo/sma/'.$kategori)}}" class="drop-link">SMA/SMK/MAN</a>--}}
                            </div>
                        </span>
                            <span class="kategoritext wow fadeInUp" style="position: relative;">
                            <a href="#" id="dropp-t">
{{--                                <b>{{strToUpper(str_replace('-', ' ', $kategori))}}</b>--}}
                                <i class="icofont-rounded-down"></i>
                            </a>
                            <div id="dropp-c" class="drop drop--hide">
{{--                                <a href="{{url('virtualexpo/'.$jenjang.'/desain-grafis')}}" class="drop-link">Desain Grafis</a>--}}
                                {{--                                --}}{{-- @if ($jenjang == 'smp') --}}
                                {{--                                <a href="{{url('virtualexpo/'.$jenjang.'/aplikasi-dan-game')}}" class="drop-link">Aplikasi & Game</a>--}}
                                {{--                                --}}{{-- @endif --}}
                                {{--                                <a href="{{url('virtualexpo/'.$jenjang.'/food-and-beverage')}}" class="drop-link">Food & beverage</a>--}}
                                {{--                                <a href="{{url('virtualexpo/'.$jenjang.'/fashion')}}" class="drop-link">Fashion</a>--}}
                                {{--                                <a href="{{url('virtualexpo/'.$jenjang.'/kriya')}}" class="drop-link">Kriya</a>--}}
                            </div>
                        </span>
                            <br/>
                            @forelse($event->timelines as $timeline)
                                @if ($now >= $timeline->tanggal_mulai && $now <= $timeline->tanggal_selesai)
                                    <div class="status">
                                        <p class="status-text"><span class="status-grey"><i
                                                    class="icofont-ui-calendar"></i> Fase Lomba Saat Ini :</span> {{$timeline->nama}}
                                            <span class="status-blue">({{$timeline->tanggal_mulai->format('d M Y')}} - {{$timeline->tanggal_selesai->format('d M Y')}})</span>
                                        </p>
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
                                    {{--                                {{dd($karyas->first())}}--}}
                                    @forelse ($karya as $key => $value)
                                        <div class="list">
                                            <div class="list-imageframe">
                                                {{--                                            {{dd($value)}}--}}
                                                @if ($value->foto->count() > 0)
                                                    <img src="{{url('Upload/karyafotos/'.$value->foto->first()->foto)}}"
                                                         alt="" class="list-image">
                                                @else
                                                    <img src="{{asset('images/sample2.png')}}" alt=""
                                                         class="list-image">
                                                @endif
                                            </div>
                                            <div class="list-content">
                                                <a style="margin-bottom: 0px;"
                                                   href="{{route('detail-karya', $value->id)}}"
                                                   class="list-title">{{$value->nama}}</a>
                                                <p class="list-keterangan">{{$value->deskripsi}}</p>
                                                <br>
                                                <a href="{{url('virtualexpo/'.$value->id.'/'.str_replace(' ', '-', $value->nama))}}"
                                                   class="list-button">Lihat selengkapnya</a>
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
