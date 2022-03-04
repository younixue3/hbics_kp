@extends('layouts.layout-expo')
@section('content')
    <div class="container-fluid">
        {{-- <a class="logo logo--stuck" href="{{url('/')}}">
            <img src="{{asset('images/logo.png')}}"/>
        </a> --}}
        <div class="row frame">
            <div class="container">
                <a href="{{url('expo/'.$jenjang.'/'.$kategori)}}" class="btn btn-yellow wow fadeInUp"><i
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
                                    <i class="icofont-people"></i> {{$this_user->name}}
                                </p>
                                <p class="apaitu-title wow fadeInUp" data-wow-delay="1.5s" style="margin-bottom:0px;">
                                    TENTANG KAMI
                                </p>
                                <p class="namateam wow fadeInUp" data-wow-delay="2s">
                                    <i class="icofont-check wow fadeInUp" data-wow-delay="2s"></i> Jenjang
                                    : {{strtoupper($this_user->jenjang)}},
                                    Kategori: {{$kategori_lomba->where('id', $kategori)->first()->kategori}}
                                </p>
                                <p class="apaitu-text wow fadeInUp" data-wow-delay="2.5s">
                                    {{$this_user->desc}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="1s">
                        {{--                        {{dd($this_user)}}--}}
                        @if ($this_user->foto_profile != '')
                            <img src="{{url('Upload/foto_profil/'.$this_user->foto_profile)}}" class="apaitu-profilpict"
                                 alt="" style="object-fit: cover">
                        @else
                            <img src="{{asset('images/juri.png')}}" class="apaitu-profilpict" alt="">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row frame">
            {{--        {{dd($data)}}--}}
            @if ($data->foto->count() != 0)
                <div class="col-md-6 produk wow fadeInUp" data-wow-delay="0.5s"
                     style="background-image: url('{{url('upload/karyafotos/'.$data->foto->first()->foto)}}');background-size:cover;">
                    @else
                        <div class="col-md-6 produk wow fadeInUp" data-wow-delay="0.5s"
                             style="background-image: url('{{asset('images/sample2.png')}}');background-size:cover;">
                            @endif
                        </div>
                        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s" style="background-color: #FFDE5A">
                            <div class="deskripsi text-center">
                                <p class="deskripsi-title wow fadeInUp" data-wow-delay="1s"
                                   style="color: rgb(255, 255, 255); text-shadow: 1px #000000; margin-top:0px;">{{$data->nama}}</p>
                                {{-- <p class="deskripsi-title wow fadeInUp" data-wow-delay="1.5s" style="font-size: 25px"></p> --}}
                                <p class="deskripsi-text wow fadeInUp" data-wow-delay="1.5s">
                                    {{$data->deskripsi}}
                                </p>
                            </div>
                        </div>
                </div>
        </div>
        <div class="container-fluid wow fadeInUp" data-wow-delay="1s" style="height: 600px;">
            <div class="row frame4 text-center" style="position: relative">
                <div class="row owl-carousel owl-theme" style="margin: 0px;">
                    {{--                    {{dd($karyas->first()->karya->foto)}}--}}
                    @foreach($data->foto as $key => $value)
                        <div class="item">
                            <div class="slide">
                                <img src="{{asset('upload/karyafotos/'.$value->foto)}}" class="slide-image" alt=""
                                     style="height: 600px; object-fit: cover">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row frame frame2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p class="apaitu-title wow fadeInUp" data-wow-delay="1s">
                                KENALI KAMI LEBIH JAUH
                            </p>
                        </div>
                        <div class="col-md-12">
                            <div class="kenali">
                                <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="1s">
                                    <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
                                    <a href="" data-toggle="modal" data-target="#c-video"><img
                                            src="{{asset('images/kenali/1.png')}}" alt="" class="kenali-logo"></a>
                                    <a href="" data-toggle="modal" data-target="#c-video" class="kenali-title">VIDEO
                                        PROFIL</a>
                                    <div class="modal fade" style="margin-top: 150px;" id="c-video" tabindex="-1"
                                         role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <iframe style="width: 100%;z-index:9999;" height="315"
                                                            src="{{str_replace('.com/watch?v=', '-nocookie.com/embed/', $data->link_profil)}}"
                                                            title="YouTube video player" frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                            allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="1.5s">
                                    <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
                                    <a href="" data-toggle="modal" data-target="#c-presentasi"><img data-toggle="modal"
                                                                                                    data-target="#c-presentasi"
                                                                                                    src="{{asset('images/kenali/2.png')}}"
                                                                                                    alt=""
                                                                                                    class="kenali-logo"></a>
                                    <a href="" data-toggle="modal" data-target="#c-presentasi" class="kenali-title">VIDEO
                                        PRESENTASI</a>
                                    <div class="modal fade" style="margin-top: 150px;" id="c-presentasi" tabindex="-1"
                                         role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <iframe style="width: 100%;z-index:9999;" height="315"
                                                            src="{{str_replace('.com/watch?v=', '-nocookie.com/embed/', $data->link_presentation)}}"
                                                            title="YouTube video player" frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                            allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="2s">
                                    <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
                                    <a href="" data-toggle="modal" data-target="#c-mockup" class="kenali-title"><img
                                            src="{{asset('images/kenali/3.png')}}" alt="" class="kenali-logo"></a>
                                    <a href="" data-toggle="modal" data-target="#c-mockup" class="kenali-title">VIDEO
                                        MOCK-UP</a>
                                    <div class="modal fade" style="margin-top: 150px;" id="c-mockup" tabindex="-1"
                                         role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <iframe style="width: 100%;z-index:9999;" height="315"
                                                                src="{{str_replace('.com/watch?v=', '-nocookie.com/embed/', $data->link_mockup)}}"
                                                            title="YouTube video player" frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                            allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="2.5s">
                                    <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
                                    {{-- BAIKIN PROPOSAL FILE --}}
                                    <a href="{{asset('Upload/proposal/'.$data->proposal)}}" target="_blank"><img
                                            src="{{asset('images/kenali/4.png')}}" alt="" class="kenali-logo"></a>
                                    <a href="{{asset('Upload/proposal/'.$data->proposal)}}" target="_blank"
                                       class="kenali-title">PROPOSAL</a>
                                </div>
                                <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="3s">
                                    <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
                                    <a href="" data-toggle="modal" data-target="#c-poster"><img
                                            src="{{asset('images/kenali/5.png')}}" alt="" class="kenali-logo"></a>
                                    <a href="" data-toggle="modal" data-target="#c-poster"
                                       class="kenali-title">POSTER</a>
                                    <div class="modal fade" style="margin-top: 150px;" id="c-poster" tabindex="-1"
                                         role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <img style="width: 100%; height:auto;"
                                                         src="{{asset('Upload/foto_poster/'.$data->foto_poster)}}"
                                                         alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row frame frame2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @if (Auth::user())
                                @if (Auth::user()->role == 'peserta' || Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                                @else
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
                                @endif
                            @else
                            @endif
                                {{--                            @if($statuslike != null)--}}
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
                        <div class="col-md-12">
                            <p class="headingtitle wow fadeInUp">
                                <i>LIHAT KARYA LAINNYA</i>
                            </p>
                            @forelse ($karyas as $karya)
                                <div class="list">
                                    {{--                            {{dd($karya->karya->foto)}}--}}
                                    <div class="list-imageframe">
                                        @if ($karya->karya->foto->count() > 0)
                                            <img src="{{asset('uploads/karyafotos/' . $karya->karya->foto->first()->foto)}}"
                                                 alt="" class="list-image">
                                        @else
                                            <img src="{{asset('images/sample2.png')}}" alt="" class="list-image">
                                        @endif
                                    </div>
                                    <div class="list-content">
                                        <a style="margin-bottom: 0px;"
                                           href="{{url('expo/'.$jenjang.'/'.$kategori.'/'.$karya->karya->id.'/'.str_replace(' ', '-', $karya->karya->nama))}}"
                                           class="list-title">{{$karya->nama}}</a>
                                        <p class="list-keterangan">{{$karya->karya->deskripsi}}</p>
                                        <span class="list-likers"><i class="icofont-like"></i> Disukai oleh {{$karya->karya->likes->count()}} orang</span>
                                        <span class="list-likers"><i class="icofont-comment"></i> {{$karya->karya->komentars->count()}} Komentar</span>
                                        <br>
                                        <a href="{{url('expo/'.$jenjang.'/'.$kategori.'/'.$karya->karya->id.'/'.str_replace(' ', '-', $karya->karya->nama))}}"
                                           class="list-button">Lihat selengkapnya</a>
                                    </div>
                                </div>
                            @empty
                                <div class="wow fadeInUp">
                                    Tidak ada karya lainnya
                                </div>
                            @endforelse
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
