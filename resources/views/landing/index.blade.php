@extends('layouts.layout-landing')
@section('content')
<div class="container-fluid" id="element">
    <img src="{{asset('images/gif/9.gif')}}" class="greenarrow wow fadeInUp" data-wow-duration="2s" alt="">
    <img src="{{asset('images/gif/1.gif')}}" class="gif1 wow fadeInUp" data-wow-duration="2s" alt="">
    <div class="row frame">
        <div class="container">
            <div class="banner">
                <div class="banner-image-frame wow fadeInUp">
                    <img src="{{asset('uploads/events/'.$event->logo)}}" alt="" class="banner-image">
                </div>
                <div class="banner-image-frame wow fadeInUp" data-wow-delay="0.5s">
                    <img src="{{asset('images/logo-sec.png')}}" alt="" class="banner-image banner-image--2nd">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="0.5s">
                    <a href="#">
                        <img src="{{asset('images/gif/row-bottom.gif')}}" class="arrow" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row frame">
        <div class="container">
            <div class="apaitu">
                <img src="{{asset('images/gif/3.gif')}}" class="apaitu-image" alt="">
                <div class="apaitu-mid">
                    <p class="apaitu-title wow fadeInUp" >
                        APA ITU KIDSPRENEURSHIP ?
                    </p>
                    <p class="apaitu-text wow fadeInUp" data-wow-delay="1s">
                        <b>Kidspreneurship</b> kembali hadir di tahun yang ke-8 dengan konsep dan
                        semangat yang baru. Berbeda dengan tahun-tahun sebelumnya, di
                        tahun 2021 ini seluruh rangakain event Kidspreneurship akan
                        diselenggarakan secara daring. Dengan mengusung tema <b>“FESTIVAL
                        EPIK 2K21 (Entrepreneur Pelajar Indonesia Kreatif)”</b>, Kidspreneurship
                        menggaet para Sobat Preneur Muda khususnya di tingkat SMP/MTS,
                        SMA/SMK/MAN se-Indonesia untuk berkompetisi dan menunjukkan
                        kreativitas mereka dalam menyusun konsep bisnis terbaik.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-left wow fadeInUp" data-wow-delay="2s">
                    <img src="{{asset('images/thinking.png')}}" class="icon-150" alt="">
                </div>
                <div class="col-md-4 text-center arrow-top-150 wow fadeInUp" data-wow-delay="1.5s">
                    <a href="">
                        <img src="{{asset('images/gif/row-bottom.gif')}}" class="arrow" alt="">
                    </a>
                </div>
                <div class="col-md-4 text-right wow fadeInUp" data-wow-delay="2s">
                    <img src="{{asset('images/computer.png')}}" class="icon-150" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row frame">
        <div class="container">
            <div class="expo" data-toggle="modal" data-target="#jenjang" >
                <div class="expo-image-frame">
                    <p class="expo-title wow fadeInUp" data-wow-delay="0.5s">
                        VIRTUAL EXPO
                    </p>    
                    <img src="{{asset('images/expo.png')}}" alt="" class="expo-image wow fadeInUp" data-wow-delay="1s">
                </div>
                <img src="{{asset('images/gif/4.gif')}}" class="expoarrow wow fadeInUp" data-wow-delay="1s" alt="">
                <p class="expo-text wow fadeInUp" data-wow-delay="1.5s">
                    DUKUNG KARYA FAVORITMU DISINI
                </p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade expo-c" id="jenjang" tabindex="-1" role="dialog" aria-labelledby="jenjangLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="expoc text-center">
                    <a href="{{url('expo/smp')}}" class="expoc-link expoc-link--smp">SMP/MTS</a>
                    <br><br><br>
                    <a href="{{url('expo/sma')}}" class="expoc-link expoc-link--sma">SMA/SMK/MAN</a>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="container-fluid">
    <div class="row frame">
        <img src="{{asset('images/gif/2.gif')}}" class="arrow2 arrow2--top-right wow fadeInUp" data-wow-delay="1s" alt="">
        <img src="{{asset('images/gif/2.gif')}}" class="arrow2 arrow2--bottom-left wow fadeInUp" data-wow-delay="1s" alt="">
        <div class="container">
            <div class="kategori">
                <p class="kategori-title text-center wow fadeInUp" data-wow-delay="1s">
                    CEK KATEGORINYA YA ^.^
                </p>
                <div class="kategori-frame">
                    <img src="{{asset('images/gif/6.gif')}}" alt="" class="petik petik--left-top wow fadeIn" data-wow-delay="4s">
                    <img src="{{asset('images/gif/6.gif')}}" alt="" class="petik petik--left-bottom wow fadeIn" data-wow-delay="4s">
                    <img src="{{asset('images/gif/6.gif')}}" alt="" class="petik petik--right-top wow fadeIn" data-wow-delay="4s">
                    <img src="{{asset('images/gif/6.gif')}}" alt="" class="petik petik--right-bottom wow fadeIn" data-wow-delay="4s">
                    <a href="{{url('kategori')}}" class="kategori-icon-frame wow fadeInUp" data-wow-delay="1s">
                        <img src="{{asset('images/kategori/h-desain.png')}}" alt="" class="kategori-icon">
                        <p class="kategori-text">Desain Grafis</p>
                    </a>
                    <a href="{{url('kategori')}}" class="kategori-icon-frame wow fadeInUp" data-wow-delay="1.5s">
                        <img src="{{asset('images/kategori/h-aplikasi.png')}}" alt="" class="kategori-icon">
                        <p class="kategori-text">Aplikasi & Game</p>
                    </a>
                    <a href="{{url('kategori')}}" class="kategori-icon-frame wow fadeInUp" data-wow-delay="2s">
                        <img src="{{asset('images/kategori/h-fnb.png')}}" alt="" class="kategori-icon">
                        <p class="kategori-text">Food & Baverage</p>
                    </a>
                    <a href="{{url('kategori')}}" class="kategori-icon-frame wow fadeInUp" data-wow-delay="2.5s">
                        <img src="{{asset('images/kategori/h-fashion.png')}}" alt="" class="kategori-icon">
                        <p class="kategori-text">Fashion</p>
                    </a>
                    <a href="{{url('kategori')}}" class="kategori-icon-frame wow fadeInUp" data-wow-delay="3s">
                        <img src="{{asset('images/kategori/h-kriya.png')}}" alt="" class="kategori-icon">
                        <p class="kategori-text">Kriya</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row frame">
        <div class="container">
            <p class="kategori-title text-left wow fadeInUp" data-wow-delay="1s">
                PROFILE JURI KIDSPRENEURSHIP
            </p>
        </div>
        <div class="col-md-12">
            <div class="row">
                <hr class="hr-bold wow fadeInUp" data-wow-delay="1.5s">
            </div>
        </div>
        <div class="container">
            <div class="row">
                @forelse ($event->juris as $juri)
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1s">
                    <a class="juri" href="" data-toggle="modal" data-target="#juri-video{{$juri->id}}">
                        <div class="juri-image-frame">
                            <img src="{{asset('uploads/juris/'.$juri->foto)}}" alt="" class="juri-image">
                        </div>
                        <img src="{{asset('images/gif/7.gif')}}" class="juri-name-frame" alt="">
                        <p class="juri-name">{{$juri->nama}}</p>
                        <p class="juri-text text-center">
                            {{$juri->quote}}
                        </p>
                    </a>
                </div>
                <div class="modal fade" id="juri-video{{$juri->id}}" style="margin-top: 150px;" tabindex="-1" role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <iframe style="width: 100%;z-index:9999;" height="315" src="{{str_replace('.com/watch?v=', '-nocookie.com/embed/', $juri->url_profil)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    Data Kosong
                </div>
                @endforelse
            </div>
        </div>
        {{-- @forelse ($juris as $juri)
        <div class="col-md-12 item wow fadeInUp" data-wow-delay="2s">
            <a href="{{url('juri')}}">
                <div class="juri-image-frame">
                    <img src="{{asset('image/'.$juri->image_id)}}" alt="" class="juri-image">
                </div>
                <img src="{{asset('images/gif/7.gif')}}" class="juri-name-frame" alt="">
                <p class="juri-name">{{$juri->name}}</p>
                <p class="juri-text">
                    {{$juri->quote}}
                </p>
            </a>
        </div>
        @empty
            <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="1s">
                Data kosong
            </div>
        @endforelse --}}
    </div>
</div>
<div class="container-fluid">
    <div class="row frame frame2">
        <img src="{{asset('images/gif/11.gif')}}" class="circle circle--top-right wow fadeIn" data-wow-duration="2s" data-wow-delay="1s" alt="">
        <img src="{{asset('images/gif/11.gif')}}" class="circle circle--bottom-left wow fadeIn" data-wow-duration="2s" data-wow-delay="1.5s" alt="">
        <div class="container">
            <div class="kategori">
                <p class="kategori-title text-center wow fadeInUp" data-wow-delay="1s">
                    WHAT'S NEW?
                </p>
                <div class="row">
                    @forelse ($beritas as $berita)
                    <div class="col-md-12">
                        <div class="row">
                            <div class="row news--page">
                                <div class="col-md-3 wow fadeInUp">
                                    <img src="{{asset('uploads/posts/'.$berita->foto)}}" class="news-logo" alt="">
                                </div>
                                <div class="col-md-9 news-title-frame wow fadeInUp" data-wow-delay="1s">
                                    <div>
                                        <a href="{{url('post/'.$berita->id.'/'.str_replace(' ', '-', $berita->judul))}}" class="news-title">
                                            {{$berita->judul}}
                                        </a>
                                        <div class="news-info">
                                            <span class="news-ket"><i class="icofont-calendar"></i> {{$berita->created_at->format('d, M Y')}}</span>
                                            &nbsp;&nbsp;
                                            <span class="news-ket"><i class="icofont-sand-clock"></i> {{$berita->waktu}} menit</span>    
                                        </div>
                                        <a href="{{url('post/'.$berita->id.'/'.str_replace(' ', '-', $berita->judul))}}" class="news-link">Baca Selengkapnya</a>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12 text-center">
                        Data kosong
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
        $(window).scroll(function() {    
            var scroll = $(window).scrollTop();
            if (scroll >= 500) {
                $("#logo").removeClass("logo--hide");
            }
            else
            {
                $("#logo").addClass("logo--hide");
            }
        });
        $(".modal").on('hidden.bs.modal', function (e) {
      $(".modal iframe").attr("src", $(".modal iframe").attr("src"));
  });
    </script>
@endsection