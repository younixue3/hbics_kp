@extends('layouts.layout-expo')
@section('content')
<div class="container-fluid">
    {{-- <a class="logo logo--stuck" href="{{url('/')}}">
        <img src="{{asset('images/logo.png')}}"/>
    </a> --}}
    <div class="row frame">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="apaitu apaitu--profil">
                        <img src="{{asset('images/gif/3.gif')}}" class="apaitu-image wow fadeInUp" data-wow-delay="0.5s" alt="">
                        <div class="apaitu-mid">
                            <p class="namateam namateam--new wow fadeInUp" data-wow-delay="1s">
                                <i class="icofont-people"></i> {{$creation->participant_names}}
                            </p>   
                            <p class="apaitu-title wow fadeInUp" data-wow-delay="1.5s" style="margin-bottom:0px;">
                                TENTANG KAMI
                            </p>
                            <p class="namateam wow fadeInUp" data-wow-delay="2s">
                                @php
                                    $jenjang = null;
                                    $kategori = null;
                                    switch ($creation->level) {
                                        case 2:
                                            $jenjang = 'SMP/MTS';
                                            break;
    
                                        case 3:
                                            $jenjang = 'SMA/SMK/MAN';
                                            break;
                                    }
    
                                    switch ($creation->category) {
                                        case 1:
                                            $kategori = 'Desain Grafis';
                                            break;
    
                                        case 2:
                                            $kategori = 'Aplikasi dan Game';
                                            break;
    
                                        case 3:
                                            $kategori = 'Food and Baverage';
                                            break;
    
                                        case 4:
                                            $kategori = 'Fashion';
                                            break;
    
                                        case 5:
                                            $kategori = 'Kriya';
                                            break;
                                    }
                                @endphp
                                <i class="icofont-check wow fadeInUp" data-wow-delay="2s"></i> Jenjang : {{strToUpper($jenjang) ?? 'Belum diatur'}}, Kategori: {{$kategori ?? 'Belum diatur'}}
                            </p>
                            <p class="apaitu-text wow fadeInUp" data-wow-delay="2.5s">
                                {{$creation->about_team}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="1s">
                    @if ($creation->image_team_id)
                      <img src="{{url('image/'.$creation->image_team_id)}}" class="apaitu-profilpict" alt="">
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
        @if (count($creation->product_images()))
            <div class="col-md-6 produk wow fadeInUp" data-wow-delay="0.5s" style="background-image: url('{{url('image/'.$creation->product_images()[0])}}');background-size:cover;">
        @else
            <div class="col-md-6 produk wow fadeInUp" data-wow-delay="0.5s" style="background-image: url('{{asset('images/sample2.png')}}');background-size:cover;">
        @endif
        </div>
        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s" style="background-color: #FFDE5A">
            <div class="deskripsi text-center">
                <p class="deskripsi-title wow fadeInUp" data-wow-delay="1s" style="color: rgb(255, 255, 255); text-shadow: 1px #000000; margin-top:0px;">{{$creation->product_name ?? 'Nama produk belum diatur'}}</p>
                {{-- <p class="deskripsi-title wow fadeInUp" data-wow-delay="1.5s" style="font-size: 25px"></p> --}}
                <p class="deskripsi-text wow fadeInUp" data-wow-delay="1.5s">
                    {{$creation->product_description}}
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid wow fadeInUp" data-wow-delay="1s">
    <div class="row frame4 text-center" style="position: relative">
        <div class="row owl-carousel owl-theme" style="margin: 0px;">
            @forelse ($creation->product_images() as $imageId)
            <div class="item">
              <div class="slide">
                <img src="{{url('image/'.$imageId)}}" class="slide-image" alt="">
                <form id="form-image-product-delete-{{$imageId}}" action="{{url('creation')}}" method="POST">
                </form>
              </div>
            </div>
            @empty
            <div class="sliding">
              <img src="{{asset('images/sample2.png')}}" class="slide-image" alt="">
            </div>
            @endforelse
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
                            <a href="" data-toggle="modal" data-target="#c-video"><img src="{{asset('images/kenali/1.png')}}" alt="" class="kenali-logo"></a>
                            <a href="" data-toggle="modal" data-target="#c-video" class="kenali-title">VIDEO PROFIL</a>
                            <div class="modal fade" style="margin-top: 150px;" id="c-video" tabindex="-1" role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    <iframe style="width: 100%;z-index:9999;" height="315" src="{{str_replace('.com/watch?v=', '-nocookie.com/embed/', $creation->link_profile)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="1.5s">
                            <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
                            <a href="" data-toggle="modal" data-target="#c-presentasi"><img data-toggle="modal" data-target="#c-presentasi" src="{{asset('images/kenali/2.png')}}" alt="" class="kenali-logo"></a>
                            <a href="" data-toggle="modal" data-target="#c-presentasi" class="kenali-title">VIDEO PRESENTASI</a>
                            <div class="modal fade" style="margin-top: 150px;" id="c-presentasi" tabindex="-1" role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    <iframe style="width: 100%;z-index:9999;" height="315" src="{{str_replace('.com/watch?v=', '-nocookie.com/embed/', $creation->link_presentation)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="2s">
                            <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
                            <a href="" data-toggle="modal" data-target="#c-mockup" class="kenali-title"><img src="{{asset('images/kenali/3.png')}}" alt="" class="kenali-logo"></a>
                            <a href="" data-toggle="modal" data-target="#c-mockup" class="kenali-title">VIDEO MOCK-UP</a>
                            <div class="modal fade" style="margin-top: 150px;" id="c-mockup" tabindex="-1" role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    <iframe style="width: 100%;z-index:9999;" height="315" src="{{str_replace('.com/watch?v=', '-nocookie.com/embed/', $creation->link_mockup)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="2.5s">
                            <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
                            {{-- BAIKIN PROPOSAL FILE --}}
                            <a href="{{url('document/'.$creation->proposal_id)}}" target="_blank"><img src="{{asset('images/kenali/4.png')}}" alt="" class="kenali-logo"></a>
                            <a href="{{url('document/'.$creation->proposal_id)}}" target="_blank" class="kenali-title">PROPOSAL</a>
                        </div>
                        <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="3s">
                            <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
                            <a href="" data-toggle="modal" data-target="#c-poster"><img src="{{asset('images/kenali/5.png')}}" alt="" class="kenali-logo"></a>
                            <a href="" data-toggle="modal" data-target="#c-poster" class="kenali-title">POSTER</a>
                            <div class="modal fade" style="margin-top: 150px;" id="c-poster" tabindex="-1" role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    <img style="width: 100%; height:auto;" src="{{url('image/'.$creation->image_poster_id)}}" alt="">
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
                <div class="col-md-8">
                    <div class="write">
                        <form action="{{url('creation/comment')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <textarea rows="5" class="write-input" name="comment" placeholder="Tuliskan komentarmu"></textarea>
                            {{-- <input type="checkbox" class="write-like" name="liked"> Sukai karya ini <i class="icofont-like"></i> --}}
                            <input type="hidden" name="creation_id" value="{{$creation->id}}">
                            <input type="submit" class="write-button" value="Kirim komentar">
                        </form>
                    </div>
                    @forelse ($creation->comments as $komen)
                        <div class="komen">
                            <img src="{{asset('images/chat.png')}}" alt="" class="komen-icon">
                            <div class="komen-content">
                                <p class="komen-text">
                                    {{$komen->comment}}
                                </p>
                                <p class="komen-info">
                                    <i class="icofont-user-alt-5"></i> {{$komen->visitor->name}}
                                    &nbsp;&nbsp;
                                    <i class="icofont-calendar"></i> {{$komen->created_at->format('d, M Y - h:m')}}
                                </p>
                            </div>
                        </div>
                    @empty
                        Belum ada komentar pada karya ini
                    @endforelse
                </div>
                <div class="col-md-4">
                    @php
                        $jenjang = null;
                        $kategori = null;
                        switch ($creation->level) {
                            case 2:
                                $jenjang = 'smp';
                                break;

                            case 3:
                                $jenjang = 'sma';
                                break;
                        }

                        switch ($creation->category) {
                            case 1:
                                $kategori = 'desain-grafis';
                                break;

                            case 2:
                                $kategori = 'aplikasi-dan-game';
                                break;

                            case 3:
                                $kategori = 'food-and-baverage';
                                break;

                            case 4:
                                $kategori = 'fashion';
                                break;

                            case 5:
                                $kategori = 'kriya';
                                break;
                        }
                    @endphp
                    <p class="headingtitle">
                        <i>LIHAT KARYA LAINNYA</i>
                    </p>
                    @forelse ($karyas as $karya)
                    <a href="{{url('expo/'.$jenjang.'/'.$kategori.'/'.$karya->id.'/'.str_replace(' ', '-', $karya->product_name))}}" class="lainnya">
                        @if (count($karya->product_images()) > 0)
                            <img src="{{url('image/'.$karya->product_images()[0])}}">
                        @else
                            <img src="{{asset('images/sample2.png')}}">
                        @endif
                    </a>
                    @empty
                    Tidak ada karya lainnya
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection