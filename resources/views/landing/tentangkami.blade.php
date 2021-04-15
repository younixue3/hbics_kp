@extends('layouts.layout-landing')
@section('content')
@php
    $event_active_id = \Modules\Core\Entities\Param::getValue('event_active_id');
    $event = \Modules\Event\Entities\Event::findOrFail($event_active_id);
@endphp
<a class="logo logo--stuck" href="{{url('/')}}">
    <img src="{{asset('images/logo.png')}}"/>
</a>
<div class="container-fluid">
    <div class="row frame">
        <div class="container">
            <div class="apaitu">
                <img src="{{asset('images/gif/3.gif')}}" class="apaitu-image wow fadeInUp" alt="">
                <div class="apaitu-mid">
                    <p class="apaitu-title wow fadeInUp" data-wow-delay="1s">
                        MARI MENGENAL KIDSPRENEURSHIP.
                    </p>
                    <div class="apaitu-text apaitu-text--important wow fadeInUp" data-wow-delay="1s">
                        {{-- {{strip_tags($event->note)}} --}}
                        {{-- {!!str_replace('style', 'chan', $event->note)!!} --}}
                        {!!str_replace(['style', 'font-size', 'color', 'face'], 'w', $event->note)!!}
                        {{-- {!!$event->note!!} --}}
                        {{-- {{$event->note}} --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-left wow fadeInUp">
                    <img src="{{asset('images/thinking.png')}}" class="icon-150" alt="">
                </div>
                <div class="col-md-4 text-center arrow-top-150">
                </div>
                <div class="col-md-4 text-right wow fadeInUp">
                    <img src="{{asset('images/computer.png')}}" class="icon-150" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection