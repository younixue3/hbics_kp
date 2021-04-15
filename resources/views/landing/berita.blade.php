@extends('layouts.layout-landing')
@section('content')
<a class="logo logo--stuck" href="{{url('/')}}">
    <img src="{{asset('images/logo.png')}}"/>
</a>
<div class="container-fluid">
    <div class="row frame frame2">
        <img src="{{asset('images/gif/11.gif')}}" class="circle circle--bottom-left" alt="">
        <div class="container">
            <div class="kategori">
                @forelse ($datas as $berita)
                <div class="col-md-12">
                    <div class="row">
                        <div class="row news--page">
                            <div class="col-md-3 wow fadeInUp">
                                <img src="{{asset('uploads/posts/'.$berita->foto)}}" class="news-logo" alt="">
                            </div>
                            <div class="col-md-9 news-title-frame wow fadeInUp" data-wow-delay="1s">
                                <div>
                                    <a href="{{url('post/'.$berita->id.'/'.str_replace(' ', '-', $berita->judul))}}" class="news-title">
                                        {{$berita->judul}}
                                    </a>
                                    <div class="news-info">
                                        <span class="news-ket"><i class="icofont-calendar"></i> {{$berita->created_at->format('d, M Y')}}</span>
                                        &nbsp;&nbsp;
                                        <span class="news-ket"><i class="icofont-sand-clock"></i> {{$berita->waktu}} menit</span>    
                                    </div>
                                    <a href="{{url('post/'.$berita->id.'/'.str_replace(' ', '-', $berita->judul))}}" class="news-link">Baca Selengkapnya</a>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    Data kosong
                </div>
                @endforelse
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    {{$datas->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection