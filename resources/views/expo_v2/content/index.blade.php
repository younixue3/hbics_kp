@extends('expo_v2/layout/master')
@section('title', 'Home')
@section('content')
<div class="h-full flex">
    <img class="h-screen w-full object-cover fixed z-0" src="{{asset('images/airport-hall-with-seats-sides.jpg')}}">
    <div class="overflow-x-auto overflow-y-hidden absolute bottom-0 flex mb-10 gap-10">
        <div class="h-64 w-96 flex">
            <img class="m-auto mb-0 h-40 z-50" src="{{asset('images/footer_chara.png')}}">
            <div class="absolute flex w-full">
                <div class="bg-gray-700 absolute w-full">
                    <img class="h-20 w-full object-contain" src="{{asset('images/logo-white.png')}}">
                </div>
                <div class="m-auto bg-gradient-to-b from-gray-700 to-gray-300 h-64 w-72">
                    <div class="bg-gradient-to-b from-gray-300 to-gray-500 w-full h-3/4"></div>
                    <div class="bg-gradient-to-t from-gray-300 to-gray-600 w-full h-1/4"></div>
                </div>
                <div class="absolute bottom-0 left-10 h-40 w-32 flex flex-col gap-y-2 p-1">
                    <img class="m-auto mb-7 h-20 w-full object-contain" src="{{asset('images/22673-5-sofa-transparent-background.png')}}">
                </div>
                <div class="absolute transform bottom-0 right-10 h-40 w-32 flex flex-col gap-y-2 p-1">
                    <img class="m-auto mb-10 h-20 w-full object-contain" src="{{asset('images/64-646173_indoor-plants-png-plant-in-pot-png.png')}}">
                </div>
                <div class="bg-white transform skew-y-6 absolute bottom-0 right-0 h-32 w-16 flex flex-col gap-y-2 p-1">
                    <img class="bg-gray-700 h-20 w-full object-contain" src="{{asset('images/logo-white.png')}}">
                    <img class="bg-gray-700 h-20 w-full object-contain" src="{{asset('images/logo-white.png')}}">
                </div>
                <div class="bg-white transform -skew-y-6 absolute bottom-0 left-0 h-32 w-16 flex flex-col gap-y-2 p-1">
                    <img class="bg-gray-700 h-20 w-full object-contain" src="{{asset('images/logo-white.png')}}">
                    <img class="bg-gray-700 h-20 w-full object-contain" src="{{asset('images/logo-white.png')}}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
