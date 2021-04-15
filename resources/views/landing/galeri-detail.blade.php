@extends('layouts.layout-landing')
@section('content')
<a class="logo logo--stuck" href="{{url('/')}}">
    <img src="{{asset('images/logo.png')}}"/>
</a>
<div class="container-fluid">
    <div class="row frame frame2">
        <img src="{{asset('images/gif/11.gif')}}" class="circle circle--bottom-left" alt="">
        <div class="container">
            <a href="{{url('galeri')}}" class="btn btn-yellow"><i class="icofont-long-arrow-left"></i> Kembali</a>
            <br><br>
        </div>
        <div class="container">
            <p class="kategori-title text-left wow fadeInUp">
                Dokumentasi : {{$galeri->folder}}
            </p>
        </div>
        <div class="col-md-12 wow fadeInUp" data-wow-delay="0.3s">
            <div class="row">
                <hr class="hr-bold">
                <br><br>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @forelse ($galeri->fotos as $foto)
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1s">
                    <div class="galeri">
                        <div class="galeri-imageframe">
                            <a href="{{asset('uploads/galeris/'.$foto->foto)}}" data-lightbox="galeri">
                                <img src="{{asset('uploads/galeris/'.$foto->foto)}}" alt="" class="galeri-image">
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                    Data kosong
                @endforelse       
            </div>
        </div>
    </div>
</div>
@endsection