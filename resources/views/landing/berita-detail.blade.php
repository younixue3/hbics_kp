@extends('layouts.layout-landing')
@section('content')
    <a class="logo logo--stuck" href="{{url('/')}}">
        <img src="{{asset('images/LOGO KP -02.png')}}"/>
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
                                <img src="{{asset('uploads/posts/'.$data->foto)}}" alt="" class="post-image"
                                     style="border-radius: 20px">
                            </div>
                            <div class="post-content">
                                <a class="post-title">{{$data->judul}} </a>
                                <br>
                                <div class="post-info">
                                    <span class="post-ket"><i class="icofont-calendar"></i> {{$data->created_at->format('d, M Y')}}</span>
                                    &nbsp;&nbsp;
                                    <span class="post-ket"><i
                                            class="icofont-sand-clock"></i> {{$data->waktu}} menit</span>
                                </div>
                                <div class="post-text">
                                    {!!$data->isi!!}
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            @forelse ($beritas as $item)
                                <div class="col-md-12">
                                    <div class="post post--sm">
                                        <div class="post-content">
                                            <a href="{{url('post/'.$item->id.'/'.str_replace(' ', '-', $item->judul))}}"
                                               class="post-title">{{$item->judul}} </a>
                                            <div>
                                                <span class="post-ket"><i class="icofont-calendar"></i> {{$item->created_at->format('d, M Y')}}</span>
                                                &nbsp;&nbsp;
                                                <span class="post-ket"><i class="icofont-sand-clock"></i> {{$item->durasi}} menit</span>
                                            </div>
                                            <a href="{{url('post/'.$item->id.'/'.str_replace(' ', '-', $item->judul))}}"
                                               class="post-link"><i>Baca Selengkapnya</i></a>
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
