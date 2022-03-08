@extends('layouts.layout-landing')
@section('content')
    <a class="logo logo--stuck" href="{{url('/')}}">
        <img src="{{asset('images/LOGO KP -02.png')}}"/>
    </a>
    <div class="container-fluid">
        <div class="row frame frame2">
            <div class="container">
                <p class="kategori-title text-left wow fadeInUp">
                    JURI KIDSPRENEURSHIP
                </p>
            </div>
            <div class="col-md-12 wow fadeInUp" data-wow-delay="0.3s">
                <div class="row">
                    <hr class="hr-bold">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($juris as $juri)
                        <div class="col-md-4 wow fadeInUp" data-wow-delay="1s">
                            <a class="juri" href="" data-toggle="modal" data-target="#juri-video{{$juri->id}}">
                                <div class="juri-image-frame">
                                    <img src="{{asset('uploads/juris/'.$juri->foto)}}" alt="" class="juri-image">
                                </div>
                                <img src="{{asset('images/gif/7.gif')}}" class="juri-name-frame" alt="">
                                <p class="juri-name">{{$juri->nama}}</p>
                                <p class="juri-text text-center">
                                    {!! $juri->quote !!}
                                </p>
                            </a>
                        </div>
                        <div class="modal fade" id="juri-video{{$juri->id}}" style="margin-top: 150px;" tabindex="-1"
                             role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <iframe style="width: 100%;z-index:9999;" height="315"
                                                src="{{str_replace('.com/watch?v=', '-nocookie.com/embed/', $juri->url_profil)}}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
