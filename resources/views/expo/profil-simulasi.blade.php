@extends('layouts.layout-expo')
@section('content')
    <div class="container-fluid">
        <div class="row frame frame2">
            <div class="container">
                <div class="row">
                     <div class="col-md-8">
                      <div class="apaitu apaitu--profil">
                        <img src="{{asset('images/gif/3.gif')}}" class="apaitu-image wow fadeInUp" data-wow-delay="0.5s" alt="">
                        <div class="apaitu-mid">
                          <p class="namateam namateam--new wow fadeInUp" data-wow-delay="1s">
                            <i class="icofont-people"></i> {{$user->name}}
                          </p>
                          <br>
                          <p class="apaitu-title wow fadeInUp" data-wow-delay="1.5s" style="margin-bottom:0px;">
                              TENTANG KAMI
                          </p>
                          <p class="namateam wow fadeInUp" data-wow-delay="2s">
                            <i class="icofont-check wow fadeInUp" data-wow-delay="2s"></i> Jenjang : {{strToUpper($karya->jenjang)}}, Kategori: {{$kategori_lomba->where('id', $karya->kategori)->first()->kategori}}
                          </p>
                          <br>
                          <p class="apaitu-text wow fadeInUp" data-wow-delay="2.5s">
                            {{$user->desc}}
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="1s">
                        @if ($karya->foto_tim != '')
                          <img src="{{asset('uploads/karyas/'.$karya->foto_tim)}}" class="apaitu-profilpict" alt="">
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
            {{--{{dd($foto_produk->first())}}--}}
            @if($foto_produk->first() != null)
                <div class="col-md-6 produk wow fadeInUp" data-wow-delay="0.5s"
                     style="background-image: url('{{asset('Upload/karyafotos'). '/'.$foto_produk->first()->foto}}');background-size:cover;">
                    @else

                        <div class="col-md-6 produk wow fadeInUp" data-wow-delay="0.5s"
                             style="background-image: url('{{asset('images/sample2.png')}}');background-size:cover;">
                            @endif
                        </div>
                        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s" style="background-color: #FFDE5A">
                            <div class="deskripsi text-center">
                                <p class="deskripsi-title wow fadeInUp" data-wow-delay="1s"
                                   style="color: rgb(255, 255, 255); text-shadow: 1px #000000; margin-top:0px;">{{$karya->nama}}</p>
                                <p class="deskripsi-text wow fadeInUp" data-wow-delay="2s">
                                    {{$karya->deskripsi}}
                                </p>
                            </div>
                        </div>
                </div>
        </div>
        <div class="container-fluid wow fadeInUp" data-wow-delay="1s">
            <div class="row frame4 text-center" style="position: relative">
                <div class="row owl-carousel owl-theme" style="margin: 0px;">

                            @foreach($foto_produk as $key => $value)
{{--                                {{$value->foto}}--}}
                                <div class="item">
                                    <div class="slide">
                                        <img src="{{asset('Upload/karyafotos/'.$value->foto)}}" class="slide-image" alt="">
                                    </div>
                                </div>
{{--                                <div class="item">--}}
{{--                                    <div class="slide">--}}
{{--                                <img src="{{asset('Upload/karyafotos/'.$value->foto)}}" class="slide-image" alt="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            @endforeach
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row frame">
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
                                        PROFIL @if($karya->link_profil != '') @endif</a>
                                    <div class="modal fade" id="c-video" style="margin-top: 150px;" tabindex="-1"
                                         role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <iframe style="width: 100%;z-index:9999;" height="315"
                                                            src="{{str_replace('.com/watch?v=', '-nocookie.com/embed/', $karya->link_profil)}}"
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
                                        PRESENTASI @if($karya->link_presentation != '') @endif</a>
                                    <div class="modal fade" id="c-presentasi" style="margin-top: 150px;" tabindex="-1"
                                         role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <iframe style="width: 100%;z-index:9999;" height="315"
                                                            src="{{str_replace('.com/watch?v=', '-nocookie.com/embed/', $karya->link_presentation)}}"
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
                                        MOCK-UP @if($karya->link_mockup != '') @endif</a>
                                    <div class="modal fade" id="c-mockup" style="margin-top: 150px;" tabindex="-1"
                                         role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <iframe style="width: 100%;z-index:9999;" height="315"
                                                            src="{{str_replace('.com/watch?v=', '-nocookie.com/embed/', $karya->link_mockup)}}"
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
                                    @if ($karya->proposal != null)
                                        <a href="{{asset('Upload/proposal/'.$karya->proposal)}}" target="_blank"><img
                                                src="{{asset('images/kenali/4.png')}}" alt="" class="kenali-logo"></a>
                                        <a href="{{asset('uploads/karyas/'.$karya->proposal)}}" target="_blank"
                                           class="kenali-title">PROPOSAL @if($karya->proposal != '') @endif</a>
                                    @else
                                        <a href="" target="_blank"><img src="{{asset('images/kenali/4.png')}}" alt=""
                                                                        class="kenali-logo"></a>
                                        <a href="" target="_blank"
                                           class="kenali-title">PROPOSAL @if($karya->proposal != '') @endif</a>
                                    @endif
                                </div>
                                <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="3s">
                                    <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
                                    <a href="{{asset('Upload/foto_poster/'.$karya->foto_poster)}}"
                                       data-lightbox="foto_poster1" data-title="{{$karya->foto_poster}}"><img
                                            src="{{asset('images/kenali/5.pngvid')}}" alt="" class="kenali-logo"></a>
                                    <a href="{{asset('Upload/foto_poster/'.$karya->foto_poster)}}"
                                       data-lightbox="foto_poster2" data-title="{{$karya->foto_poster}}"
                                       class="kenali-title">POSTER @if($karya->foto_poster != null) @endif</a>
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
                $("#c-video").on('hidden.bs.modal', function (e) {
                    $("#c-video iframe").attr("src", $("#c-video iframe").attr("src"));
                });
                $("#c-presentasi").on('hidden.bs.modal', function (e) {
                    $("#c-presentasi iframe").attr("src", $("#c-presentasi iframe").attr("src"));
                });
                $("#c-mockup").on('hidden.bs.modal', function (e) {
                    $("#c-mockup iframe").attr("src", $("#c-mockup iframe").attr("src"));
                });
                const textarea_tentangkami = document.getElementById('textarea_tentangkami').value;
                const word_count_tentangkami = document.getElementById('word_count_tentangkami');
                word_count_tentangkami.innerHTML = 360 - textarea_tentangkami.length;
                $('#textarea_tentangkami').on('change keydown paste input', function () {
                    const textarea_tentangkami = document.getElementById('textarea_tentangkami').value;
                    word_count_tentangkami.innerHTML = 360 - textarea_tentangkami.length;
                    console.log(textarea_tentangkami.length);
                })
                const textarea_deskripsi = document.getElementById('textarea_deskripsi').value;
                const word_count_deskripsi = document.getElementById('word_count_deskripsi');
                word_count_deskripsi.innerHTML = 350 - textarea_deskripsi.length;
                $('#textarea_deskripsi').on('change keydown paste input', function () {
                    const textarea_deskripsi = document.getElementById('textarea_deskripsi').value;
                    word_count_deskripsi.innerHTML = 350 - textarea_deskripsi.length;
                    console.log(textarea_deskripsi.length);
                })
                $('#status').modal('show');
            </script>
@endsection
