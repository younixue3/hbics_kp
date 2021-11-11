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
                        <p class="text-bg wow fadeInUp"><i class="icofont-light-bulb"></i> Kidspreneurship</p>
                        <p class="text-sm wow fadeInUp">Festival EPIK 2K21 “Enterpreneur Pelajar Indonesia Kreatif” <b>"Indonesia Bisa , Berkarya Untuk Negeri"</b></p>
                        <form method="POST" action="{{ route('daftar') }}">
                            @csrf
                            <div class="radiobtn wow fadeInUp">
                                <input id="radio_kelompok" type="radio" name="kategori_peserta" value="kelompok">
                                <label>Kelompok</label>
                                <input id="radio_individu" type="radio" name="kategori_peserta" value="individu">
                                <label>Individu</label>
                            </div>
                            <div id="nama_anggota">

                            </div>
                            <div class="form-group row">
                                <label id="nama-kelompok" for="name" class="col-md-12 col-form-label wow fadeInUp"><i class="icofont-id-card"></i> {{ __('Nama') }}</label>
                                <br>
                                <div class="col-md-12 wow fadeInUp">
                                    <input placeholder="Masukkan Nama" id="name" type="text" class="form-control2 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-12 col-form-label wow fadeInUp"><i class="icofont-email"></i> {{ __('Email') }}</label>
                                <br>
                                <div class="col-md-12">
                                    <input placeholder="Masukkan Email" id="email" type="email" class="form-control2 wow fadeInUp @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="provinsi" class="col-md-12 col-form-label wow fadeInUp"><i class=""></i> {{ __('Provinsi') }}</label>
                                <br>
                                <div class="col-md-12">
                                    <select name="provinsi" class="form-control2 wow fadeInUp" id="provinsi">
                                        @foreach($provinsi as $value)
                                            <option value="{{$value->id}}">{{$value->provinsi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kota" class="col-md-12 col-form-label wow fadeInUp"><i class=""></i> {{ __('Kota') }}</label>
                                <br>
                                <div class="col-md-12">
                                    <select name="kota" class="form-control2 wow fadeInUp" id="kota">
                                        <option disabled>Pilih Kota/Kabupaten</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-12 col-form-label wow fadeInUp"><i class="icofont-key-hole"></i> {{ __('Password') }}</label>
                                <br>
                                <div class="col-md-12">
                                    <input placeholder="Masukkan Password" id="password" type="password" class="form-control2 wow fadeInUp @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-12 col-form-label wow fadeInUp"><i class="icofont-key-hole"></i> {{ __('Konfirmasi Password') }}</label>
                                <br>
                                <div class="col-md-12">
                                    <input placeholder="Masukkan Konfirmasi Password" id="password-confirm" type="password" class="form-control2 wow fadeInUp" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-center">
                                    <br>
                                    <button type="submit" class="btn btn-blue btn-block wow fadeInUp">
                                        {{ __('Mendaftar') }} <i class="icofont-hand-right"></i>
                                    </button>
                                    <br>
                                    <a style="color: #0f868a" class="wow fadeInUp" href="{{url('/')}}">Sudah memiliki akun? <i class="icofont-rounded-right"></i></a>
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
@section('script')
    <script>
        new WOW().init();
        var array = {'data': [{}]}
        $('#array-nama-anggota').change(function () {

        });
        $('#radio_individu').click(function() {
            if ($('#radio_individu').is(':checked')) {
                console.log('individu')
                $('#nama_anggota').html('')
                $('#nama-kelompok').html('<i class="icofont-id-card"></i> {{ __('Nama') }}')
            }
        });
        $('#radio_kelompok').click(function() {
            i = 1;
            if ($('#radio_kelompok').is(':checked')) {
                console.log('kelompok')
                $('#nama-kelompok').html('<i class="icofont-id-card"></i> {{ __('Nama Kelompok') }}')
                $('#nama_anggota').html('<input id="button-anggota" type="button" class="wow fadeInUp btn-danger" value="Add"><div class="form-group row"> <label for="name" class="col-md-12 col-form-label wow fadeInUp"><i class="icofont-id-card"></i> {{ __('Nama Anggota ') }}' + i + '</label><br> <div class="col-md-12 wow fadeInUp"> <input placeholder="Masukkan Nama" id="array-nama-anggota" type="text" class="form-control2 @error('name') is-invalid @enderror" name="name_anggota' + i + '" value="{{ old('name') }}" required autocomplete="name" autofocus>@error('name')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>@enderror</div> </div><div class="form-group row"> <label for="name" class="col-md-12 col-form-label wow fadeInUp"><i class="icofont-email"></i> {{ __('Email Anggota ') }}' + i + '</label><br> <div class="col-md-12 wow fadeInUp"> <input placeholder="Masukkan Email" id="email" type="email" class="form-control2 @error('name') is-invalid @enderror" name="name_email' + i + '" value="{{ old('email') }}" required autocomplete="name" autofocus></div> </div>')
                $('#button-anggota').click(function () {
                    if (i > 4) {
                        alert("Anggota sudah memenuhi batas ketentuan");
                    } else {
                        console.log(i++);
                        $('#nama_anggota').append('<div class="form-group row"> <label for="name" class="col-md-12 col-form-label wow fadeInUp"><i class="icofont-id-card"></i> {{ __('Nama Anggota ') }}' + i + '</label><br> <div class="col-md-12 wow fadeInUp"> <input placeholder="Masukkan Nama" id="array-nama-anggota" type="text" class="form-control2 @error('name') is-invalid @enderror" name="name_anggota' + i + '" value="{{ old('name') }}" required autocomplete="name" autofocus>@error('name')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>@enderror</div> </div><div class="form-group row"> <label for="name" class="col-md-12 col-form-label wow fadeInUp"><i class="icofont-email"></i> {{ __('Email Anggota ') }}' + i + '</label><br> <div class="col-md-12 wow fadeInUp"> <input placeholder="Masukkan Email" id="email" type="email" class="form-control2 @error('name') is-invalid @enderror" name="name_email' + i + '" value="{{ old('email') }}" required autocomplete="name" autofocus></div> </div>')
                    }
                });
            }
        });
        $('#provinsi').change(function () {
            var value = $(this).val();
            $.get( {!! '"' . env('API_URL') . '"' !!} + '/get_kota?provinsi=' + value, function (data) {
                // console.log(obj.kota)
                $('#kota').html('<option disabled>Pilih Kota/Kabupaten</option>')
                $.each(data, function (index, obj) {
                    $('#kota').append('<option value=' + obj.id + ' >'+ obj.kota +'</option')
                })
            })
        })
    </script>
@endsection
{{-- @extends('layouts.app')
@section('content')
@php
    $event = \App\Event::where('status', 1)->latest()->first();
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label">{{ __('Name') }}</label>
                            <br>
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control2 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-md-12 col-form-label">{{ __('Role') }}</label>
                            <br>
                            <div class="col-md-12">
                                <input id="role" type="text" class="form-control2 @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role" autofocus>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label">{{ __('E-Mail Address') }}</label>
                            <br>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label">{{ __('Password') }}</label>
                            <br>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-12 col-form-label">{{ __('Confirm Password') }}</label>
                            <br>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control2" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

