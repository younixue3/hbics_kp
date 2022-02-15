@extends('layouts.layout-expo')
@section('content')
    <div class="container-fluid">
        {{-- <a class="logo logo--stuck" href="{{url('/')}}">
            <img src="{{asset('images/logo.png')}}"/>
        </a> --}}
        <div class="row frame">
            <div class="container">
                <a href="{{url('')}}" class="btn btn-yellow wow fadeInUp"><i
                        class="icofont-long-arrow-left"></i> Kembali</a>
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('fail'))
                            <div class="alert alert-danger">
                                {{ session('fail') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <br><br>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="apaitu apaitu--profil">
                            <img src="{{asset('images/gif/3.gif')}}" class="apaitu-image wow fadeInUp"
                                 data-wow-delay="0.5s" alt="">
                            <div class="apaitu-mid">
                                <p class="namateam namateam--new wow fadeInUp" data-wow-delay="1s">
                                    <i class="icofont-people"></i> {{$user->name}}
                                </p>
                                <p class="apaitu-title wow fadeInUp" data-wow-delay="1.5s" style="margin-bottom:0px;">
                                    TENTANG KAMI
                                </p>
                                <p class="namateam wow fadeInUp" data-wow-delay="2s">
                                    <i class="icofont-check wow fadeInUp" data-wow-delay="2s"></i>
                                    Kategori: {{$kategori_lomba->find($user->kategori_lp)->kategori}}
                                </p>
                                <p class="apaitu-text wow fadeInUp" data-wow-delay="2.5s">
                                    {{$user->desc}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="1s">
                        {{--                        {{dd($this_user)}}--}}
                        @if ($user->foto_profile != '')
                            <img src="{{url('Upload/foto_profil/'.$user->foto_profile)}}" class="apaitu-profilpict"
                                 alt="" style="object-fit: cover">
                        @else
                            <img src="{{asset('images/juri.png')}}" class="apaitu-profilpict" alt="">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="m-auto" style="width: 700px; height:400px;">
            <iframe style="width: 100%; height: 400px;" src="{{str_replace('.com/watch?v=', '-nocookie.com/embed/', $user->karya->link_presentation)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="container-fluid">
            <div class="row frame frame2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            {{--                            @if($statuslike != null)--}}
                            @if ($statuslike)
                                <a href="{{url('expo/likes/'.$data->id)}}"
                                   class="likesbutton likesbutton--batal wow fadeInUp"><i class="icofont-close"></i>
                                    <i
                                        class="icofont-like"></i> Batal Sukai Karya Ini</a>
                                <div class="total wow fadeInUp">
                                    <p><i class="icofont-like"></i> Anda dan {{$data->likes->count()-1}} Lainnya
                                        menyukai karya ini</p>
                                </div>
                            @else
                                <a href="{{url('expo/likes/'.$data->id)}}" class="likesbutton wow fadeInUp"><i
                                        class="icofont-like"></i> Sukai Karya Ini</a>
                                <div class="total wow fadeInUp">
                                    <p><i class="icofont-like"></i> {{$data->likes->count()}} Menyukai karya ini</p>
                                </div>
                            @endif
                            {{--                            @endif--}}
                            {{-- <div class="write wow fadeInUp">
                                <form action="{{url('expo/komentar/'.$data->id.'/'.str_replace(' ', '-', $data->nama))}}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <textarea rows="5" class="write-input" name="komentar" placeholder="Tuliskan komentarmu"></textarea>
                                    <input type="submit" class="write-button" style="margin-left: 0px;" value="Kirim komentar">
                                </form>
                            </div>
                            @forelse ($data->komentars as $komen)
                                <div class="komen wow fadeInUp">
                                    <img src="{{asset('images/chat.png')}}" alt="" class="komen-icon">
                                    <div class="komen-content">
                                        <p class="komen-text">
                                            {{$komen->komentar}}
                                        </p>
                                        <p class="komen-info">
                                            <i class="icofont-user-alt-5"></i> {{$komen->user->name}}
                                            &nbsp;&nbsp;
                                            <i class="icofont-calendar"></i> {{$komen->updated_at->format('d, M Y - H:i')}}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                Belum ada komentar pada karya ini
                            @endforelse --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('script')
            <script>
                $("#c-video").on('hidden.bs.modal', function (e) {
                    $("#c-video iframe").attr("src", $("#c-video iframe").attr("src"));
                });
                $("#c-presentasi").on('hidden.bs.modal', function (e) {
                    $("#c-presentasi iframe").attr("src", $("#c-presentasi iframe").attr("src"));
                });
                $("#c-mockup").on('hidden.bs.modal', function (e) {
                    $("#c-mockup iframe").attr("src", $("#c-mockup iframe").attr("src"));
                });
            </script>
@endsection
