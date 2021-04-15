@extends('layouts.layout-landing')
@section('content')
<a class="logo logo--stuck" id="logo" href="{{url('/')}}">
    <img src="{{asset('images/logo.png')}}"/>
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
                    @forelse ($event->schedules as $jadwal)
                    <div class="timeline wow fadeInUp" data-wow-delay="1s">
                        <div class="timeline-number">
                            <span>0{{$no++}}.</span>
                        </div>
                        <div class="timeline-content">
                            <p class="timeline-title">{{$jadwal->title}}</p>
                            <p class="timeline-deadline">Tanggal Buka : {{$jadwal->start->format('d, M Y')}} - Tanggal Tutup : {{$jadwal->end->format('d, M Y')}}</p>
                            <p class="timeline-text">{{$jadwal->description}}</p>
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