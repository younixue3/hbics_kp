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
                        {{--                        @if ($event)--}}
                        {{--                            <img src="{{asset('uploads/events/'.$event->logo)}}" alt="">--}}
                        {{--                        @else--}}
                        {{--                            <img src="{{asset('images/logo.png')}}" alt="">--}}
                        {{--                        @endif--}}
                    </div>
                    <div class="col-md-5">
                        <div class="text">
                            <p class="text-bg wow fadeInUp mb-3"><i class="icofont-light-bulb"></i>Lomba Pendukung</p>
                            <input id="storage-array" type="hidden" value="">
                            <div class="form-group row">
                                <label id="nama-kelompok" for="name"
                                       class="col-md-12 col-form-label wow fadeInUp"><i
                                        class="icofont-id-card"></i> {{ __('Nama') }}</label>
                                <br>
                                <div class="col-md-12 wow fadeInUp">
                                    <input placeholder="Masukkan Nama" id="name" type="text"
                                           class="form-control2 @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-12 col-form-label wow fadeInUp"><i
                                        class="icofont-email"></i> {{ __('Email') }}</label>
                                <br>
                                <div class="col-md-12">
                                    <input placeholder="Masukkan Email" id="email" type="email"
                                           class="form-control2 wow fadeInUp @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_hp" class="col-md-12 col-form-label wow fadeInUp"><i
                                        class="icofont-ui-cell-phone"></i> {{ __('No Handphone') }}</label>
                                <br>
                                <div class="col-md-12">
                                    <input placeholder="Masukkan No Handphone" id="no_hp"
                                           class="form-control2 wow fadeInUp @error('email') is-invalid @enderror"
                                           name="no_hp" value="" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenjang" class="col-md-12 col-form-label wow fadeInUp"><i
                                        class=""></i> {{ __('Jenjang') }}</label>
                                <br>
                                <div class="col-md-12">
                                    <select name="jenjang" class="form-control2 wow fadeInUp" id="jenjang">
                                        <option selected disabled>Pilih jenjang</option>
                                        <option value="tk">TK</option>
                                        <option value="sd">SD</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kategori_lp" class="col-md-12 col-form-label wow fadeInUp"><i
                                        class=""></i> {{ __('Kategori Lomba') }}</label>
                                <br>
                                <div class="col-md-12">
                                    <select name="kategori_lp" class="form-control2 wow fadeInUp" id="kategori_lp">
                                        <option selected disabled>Pilih kategori</option>
                                        @foreach($kategori_lp as $key => $value)
                                            <option id="kategori_lp_{{$value->id}}"
                                                    value="{{$value->id}}">{{$value->kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="provinsi" class="col-md-12 col-form-label wow fadeInUp"><i
                                        class=""></i> {{ __('Provinsi') }}</label>
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
                                <label for="kota" class="col-md-12 col-form-label wow fadeInUp"><i
                                        class=""></i> {{ __('Kota') }}</label>
                                <br>
                                <div class="col-md-12">
                                    <select name="kota" class="form-control2 wow fadeInUp" id="kota_kab">
                                        <option disabled>Pilih Kota/Kabupaten</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-12 col-form-label wow fadeInUp"><i
                                        class="icofont-key-hole"></i> {{ __('Password') }}</label>
                                <br>
                                <div class="col-md-12">
                                    <input placeholder="Masukkan Password" id="password" type="password"
                                           class="form-control2 wow fadeInUp @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-12 col-form-label wow fadeInUp"><i
                                        class="icofont-key-hole"></i> {{ __('Konfirmasi Password') }}</label>
                                <br>
                                <div class="col-md-12">
                                    <input placeholder="Masukkan Konfirmasi Password" id="password-confirm"
                                           type="password" class="form-control2 wow fadeInUp"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-center">
                                    <br>
                                    <a href="#" id="submit_storage"
                                       class="btn btn-blue btn-block wow fadeInUp">
                                        {{ __('Mendaftar') }} <i class="icofont-hand-right"></i>
                                    </a>
                                    <br>
                                    <a style="color: #0f868a" class="wow fadeInUp" href="{{url('/')}}">Sudah
                                        memiliki akun? <i class="icofont-rounded-right"></i></a>
                                </div>
                            </div>
                        </div>
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
        $('#provinsi').change(function () {
            var value = $(this).val();
            $.get(window.location.origin + '/get_kota?provinsi=' + value, function (data) {
                $('#kota_kab').html('<option disabled>Pilih Kota/Kabupaten</option>')
                $.each(data, function (index, obj) {
                    // console.log(obj.kota)
                    $('#kota_kab').append('<option value=' + obj.id + ' >' + obj.kota + '</option')
                })
            })
        })
        $('#jenjang').change(function () {
            if ($(this).val() == 'sd') {
                $('#kategori_lp_3').hide()
            }
        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var counter = 1;
        var arr = {data: {kelompok: null, anggota: []}};
        var status = 1;
        $('#submit_storage').click(function () {
            if (status == 1) {
                // console.log(counter);
                for (var i = 1; ; i++) {
                    arr.data.anggota.push({
                        name: $('#array-nama-anggota' + i).val(),
                        email: $('#array-email-anggota' + i).val()
                    })
                    if (i == counter) break;
                }
                status = 0;
                $.ajax({
                    type: "POST",
                    url: window.location.origin + '/daftar/insert',
                    data: {
                        name: $('#name').val(),
                        email: $('#email').val(),
                        no_hp: $('#no_hp').val(),
                        event_id: 2,
                        kategori_lp: $('#kategori_lp').val(),
                        provinsi_id: $('#provinsi').val(),
                        kota_kab_id: $('#kota_kab').val(),
                        password: $('#password').val(),
                        jenjang: $('#jenjang').val(),
                    },
                    error: function (e) {
                        // console.log(e)
                    },
                    success: function (data) {
                        window.location.replace(window.location.origin + '/login');
                    }
                });
            } else {
                alert("data anda telah di input")
            }
            // console.log(arr.data.kelompok)

        });
    </script>
@endsection
