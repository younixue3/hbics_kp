@extends('layouts.layout-landing')
@section('content')
<a class="logo logo--stuck" href="{{url('/')}}">
    <img src="{{asset('images/LOGO KP -02.png')}}"/>
</a>
<div class="container-fluid">
    <div class="row frame frame2">
        <div class="container">
            <p class="kategori-title text-left wow fadeInUp">
                TIMELINE KIDSPRENEURSHIP
            </p>
        </div>
        <div class="col-md-12 wow fadeInUp" data-wow-delay="0.3s">
            <div class="row">
                <hr class="hr-bold">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($event->timelines as $timeline)
                    <div class="timeline wow fadeInUp" data-wow-delay="1s">
                        <div class="timeline-number">
                            <span>0{{$no++}}.</span>
                        </div>
                        <div class="timeline-content">
                            <p class="timeline-title">{{$timeline->nama}}</p>
                            <p class="timeline-deadline">Tanggal Buka : {{$timeline->tanggal_mulai->format('d M Y')}} - Tanggal Tutup : {{$timeline->tanggal_selesai->format('d M Y')}}</p>
                            <p class="timeline-text">{{$timeline->keterangan}}</p>
                        </div>
                    </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
