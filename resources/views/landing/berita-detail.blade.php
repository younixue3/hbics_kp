@extends('layouts.layout-landing')
@section('content')
<a class="logo logo--stuck" href="{{url('/')}}">
    <img src="{{asset('images/logo.png')}}"/>
</a>
<div class="container-fluid">
    <div class="row frame frame2">
        <img src="{{asset('images/gif/11.gif')}}" class="circle circle--bottom-left" alt="">
        <div class="container">
            <a href="{{url('berita')}}" class="btn btn-yellow"><i class="icofont-long-arrow-left"></i> Kembali</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post">
                        <div class="post-imageframe">
                            <img src="{{asset('image/'.$berita->image_id)}}" alt="" class="post-image" style="border-radius: 20px">
                        </div>
                        <div class="post-content">
                            <a class="post-title">{{$berita->judul}} </a>
                            <br>
                            <div class="post-info">
                                <span class="post-ket"><i class="icofont-calendar"></i> {{$berita->created_at->format('d, M Y')}}</span>
                                &nbsp;&nbsp;
                                <span class="post-ket"><i class="icofont-sand-clock"></i> {{$berita->durasi}} menit</span>
                            </div>
                            <div class="post-text">
                                {!!$berita->konten!!}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="share-buttons">
                        Bagikan berita ini : <br>
                        <!-- Email -->
                        <a href="mailto:?Subject={{$berita->judul}}&amp;Body={{$berita->judul}} https://simplesharebuttons.com">
                            <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
                        </a>
                     
                        <!-- Facebook -->
                        <a href="http://www.facebook.com/sharer.php?u=https://simplesharebuttons.com" target="_blank">
                            <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
                        </a>
                        
                        <!-- Google+ -->
                        <a href="https://plus.google.com/share?url=https://simplesharebuttons.com" target="_blank">
                            <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
                        </a>
                        
                        <!-- LinkedIn -->
                        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://simplesharebuttons.com" target="_blank">
                            <img src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" />
                        </a>
                        
                        <!-- Twitter -->
                        <a href="https://twitter.com/share?url=https://simplesharebuttons.com&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
                            <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
                        </a>

                        <!-- Print -->
                        <a href="javascript:;" onclick="window.print()">
                            <img src="https://simplesharebuttons.com/images/somacro/print.png" alt="Print" />
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        @forelse ($beritas as $item)
                        <div class="col-md-12">
                            <div class="post post--sm">
                                <div class="post-content">
                                    <a href="{{url('berita/'.$item->id.'/'.str_replace(' ', '-', $item->judul))}}" class="post-title">{{$item->judul}} </a>
                                    <div>
                                        <span class="post-ket"><i class="icofont-calendar"></i> {{$item->created_at->format('d, M Y')}}</span>
                                        &nbsp;&nbsp;
                                        <span class="post-ket"><i class="icofont-sand-clock"></i> {{$item->durasi}} menit</span>
                                    </div>
                                    <a href="{{url('berita/'.$item->id.'/'.str_replace(' ', '-', $item->judul))}}" class="post-link"><i>Baca Selengkapnya</i></a>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-md-12">
                            Data Kosong
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection