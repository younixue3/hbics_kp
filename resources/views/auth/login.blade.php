@extends('layouts.layout-login')
@section('content')
    @php
        $event = \App\Event::where('status', 1)->latest()->first();
    @endphp
    <div class="container-fluid">
        <div class="row login">
            <div class="container px-5">
                <div class="row">
                    <div class="col">
                        <div class="text">
                            <p class="text-bg wow fadeInUp" data-wow-delay="0.5s"><i class="icofont-light-bulb"></i>Selamat
                                datang</p>
                            <p class="text-sm wow fadeInUp" data-wow-delay="1s">Silahkan masukkan Akun Lomba anda</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group row wow fadeInUp">
                                    <label for="email" class="col-md-12 col-form-label"><i
                                            class="icofont-email"></i> {{ __('Email') }}</label>
                                    <br>
                                    <div class="col-md-12">
                                        <input id="email" placeholder="Masukkan email" type="text"
                                               class="form-control2 wow fadeInUp @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" required autocomplete="email"
                                               autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row wow fadeInUp">
                                    <label for="password" class="col-md-12 col-form-label"><i
                                            class="icofont-key-hole"></i> {{ __('Password') }}</label>
                                    <br>
                                    <div class="col-md-12 wow fadeInUp">
                                        <input id="password" placeholder="Masukkan password" type="password"
                                               class="form-control2 wow fadeInUp @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password">
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
                                        <div class="row container">
                                            <button type="submit" class="btn btn-blue btn-block wow fadeInUp">
                                                {{ __('Login') }} <i class="icofont-hand-right"></i>
                                            </button>
                                            <a href="{{url('/')}}" class="btn btn-danger btn-block wow fadeInUp">
                                                {{ __('Back to Home') }}
                                            </a>
                                            <div class="py-2" style="text-align: center !important;">
                                                <a href="{{route('daftar/pengunjung')}}" class="" style="text-align: center !important;">
                                                    {{ __('Daftar sebagai Pengunjung') }}
                                                </a>
                                            </div>
                                        </div>
                                        <br>
                                        {{--                                    <a style="color: #0f868a" class="wow fadeInUp" href="{{url('daftar')}}">Belum memiliki akun? <i class="icofont-rounded-right"></i></a>--}}
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

{{-- @extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
