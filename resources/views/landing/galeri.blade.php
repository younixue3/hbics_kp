@extends('layouts.layout-landing')
@section('content')
<a class="logo logo--stuck" href="{{url('/')}}">
    <img src="{{asset('images/logo.png')}}"/>
</a>
<div class="container-fluid">
    <div class="row frame frame2">
        <img src="{{asset('images/gif/11.gif')}}" class="circle circle--bottom-left" alt="">
        <div class="container">
            <div class="row">
                @forelse ($galeris as $galeri)
                    @php
                        $images = json_decode($galeri->images);
                    @endphp
                    @if (count($images) > 0)
                        <div class="col-md-4 wow fadeInUp" data-wow-delay="1s">
                            <div class="galeri">
                                <div class="galeri-imageframe">
                                    <a href="{{url('galeri/'.$galeri->id.'/'.str_replace(' ', '', $galeri->year))}}">
                                        <img src="{{asset('image/'.$images[0]->image_id)}}" alt="" class="galeri-image">
                                    </a>
                                    <p class="galeri-text">{{$galeri->year}}</p>
                                </div>
                            </div>
                        </div>                  
                    @endif
                @empty
                <div class="col-md-12">
                    Data Kosong
                </div>
                @endforelse
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    {{$galeris->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection