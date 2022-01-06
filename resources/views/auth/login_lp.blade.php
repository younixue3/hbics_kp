@extends('layouts.layout-login')
@section('content')
    @php
        $event = \App\Event::where('status', 1)->latest()->first();
    @endphp
    <div class="container-fluid">
        <div class="row login">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 wow fadeInUp login-logo">
                        @if ($event)
                            <img src="{{asset('uploads/events/'.$event->logo)}}" alt="">
                        @else
                            <img src="{{asset('images/logo.png')}}" alt="">
                        @endif
                    </div>
                    <div class="col-md-5">
                        <div class="text">
                            <p class="text-bg wow fadeInUp" data-wow-delay="0.5s"><i class="icofont-light-bulb"></i> Kidspreneurship</p>
                            <p class="text-sm wow fadeInUp" data-wow-delay="1s">Festival EPIK 2K22 “Entrepreneur Pelajar Indonesia Kreatif” <b>"Indonesia Bisa , Berkarya Untuk Negeri"</b></p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group row wow fadeInUp">
                                    <label for="email" class="col-md-12 col-form-label"><i class="icofont-email"></i> {{ __('Email') }}</label>
                                    <br>
                                    <div class="col-md-12">
                                        <input id="email" placeholder="Masukkan email" type="email" class="form-control2 wow fadeInUp @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row wow fadeInUp">
                                    <label for="password" class="col-md-12 col-form-label"><i class="icofont-key-hole"></i> {{ __('Password') }}</label>
                                    <br>
                                    <div class="col-md-12 wow fadeInUp">
                                        <input id="password" placeholder="Masukkan password" type="password" class="form-control2 wow fadeInUp @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 text-center">
                                        <br>
                                        <button type="submit" class="btn btn-blue btn-block wow fadeInUp">
                                            {{ __('Login') }} <i class="icofont-hand-right"></i>
                                        </button>
                                        <br>
                                        <a style="color: #0f868a" class="wow fadeInUp" href="{{url('daftar')}}">Belum memiliki akun? <i class="icofont-rounded-right"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
