@extends('layouts.layout-expo')
@section('content')
@php
  $pengisian = $karya->event->pengisian;
  $today = \Carbon\Carbon::now();
@endphp
@if ($pengisian)
<div class="container-fluid">
  <div class="row frame frame2">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="status">
                <p class="status-text"><span class="status-grey"><i class="icofont-ui-calendar"></i> Waktu pengisian profil :</span> <span class="status-blue">{{$pengisian->tanggal_mulai->format('d M Y')}} - {{$pengisian->tanggal_selesai->format('d M Y')}}</span></p>
            </div>
          </div>
      </div>
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
                  <img src="{{asset('images/gif/3.gif')}}" class="apaitu-image wow fadeInUp" data-wow-delay="0.5s" alt="">
                  <div class="apaitu-mid">
                    <p class="namateam namateam--new wow fadeInUp" data-wow-delay="1s">
                      <i class="icofont-people"></i> {{$karya->nama_tim}}
                    </p>
                    @if ($today >= $pengisian->tanggal_mulai && $today <= $pengisian->tanggal_selesai)
                      <a href="#" data-toggle="modal" data-target="#anggotatim" class="button-text wow fadeInUp" data-wow-delay="1s">Edit Nama tim <i class="icofont-pencil-alt-1"></i></a>
                      <div class="modal fade" id="anggotatim" tabindex="-1" role="dialog" aria-labelledby="anggotatimLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="anggotatimLabel">Nama tim</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form id="f-karya-namaTim" action="{{url('karya')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                </form>
                                <textarea form="f-karya-namaTim" name="nama_tim" rows="10" maxlength="100" placeholder="Masukkan nama tim">{{$karya->nama_tim}}</textarea>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button form="f-karya-namaTim" type="submit" class="btn btn-primary">Simpan Perubahan</button>
                              </div>
                            </div>
                          </div>
                      </div> 
                    @endif 
                    <br><br>
                    <p class="apaitu-title wow fadeInUp" data-wow-delay="1.5s" style="margin-bottom:0px;">
                        TENTANG KAMI
                    </p>
                    <p class="namateam wow fadeInUp" data-wow-delay="2s">
                      <i class="icofont-check wow fadeInUp" data-wow-delay="2s"></i> Jenjang : {{strToUpper($karya->jenjang)}}, Kategori: {{$karya->kategori}}
                    </p>   
                    @if ($today >= $pengisian->tanggal_mulai && $today <= $pengisian->tanggal_selesai)
                      <a href="#" data-toggle="modal" data-target="#jenjang" class="button-text wow fadeInUp" data-wow-delay="2s">Edit jenjang dan kategori <i class="icofont-pencil-alt-1"></i></a>
                      <div class="modal fade" id="jenjang" tabindex="-1" role="dialog" aria-labelledby="jenjangLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="jenjangLabel">Jenjang dan kategori</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form id="f-karya-jenjangKategori" action="{{url('karya')}}" method="POST">
                                  @csrf
                                  <input type="hidden" name="_method" value="PATCH">
                                </form>
                                <label for="">Jenjang</label>
                                <select form="f-karya-jenjangKategori" name="jenjang" class="form-control" style="padding-top: 5px !important; height:50px; padding-bottom:3px;">
                                  {{-- <option value="" selected disabled>- Jenjang -</option> --}}
                                  <option @if($karya->jenjang == 'SMP/MTS') selected @endif value="SMP/MTS">SMP/MTS</option>
                                  <option @if($karya->jenjang == 'SMA/SMK/MAN') selected @endif value="SMA/SMK/MAN">SMA/SMK/MAN</option>
                                </select>
                                <br>
                                <label for="">Kategori</label>
                                <select form="f-karya-jenjangKategori" name="kategori" class="form-control" style="padding-top: 5px !important; height:50px; padding-bottom:3px;">
                                  {{-- <option value="" selected disabled>- Jenjang -</option> --}}
                                  <option @if($karya->kategori == 'Desain Grafis') selected @endif value="Desain Grafis">Desain Grafis</option>
                                  <option @if($karya->kategori == 'Aplikasi dan Game') selected @endif value="Aplikasi dan Game">Aplikasi dan Game</option>
                                  <option @if($karya->kategori == 'Food and Baverage') selected @endif value="Food and Baverage">Food and Baverage</option>
                                  <option @if($karya->kategori == 'Fashion') selected @endif value="Fashion">Fashion</option>
                                  <option @if($karya->kategori == 'Kriya') selected @endif value="Kriya">Kriya</option>
                                </select>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button form="f-karya-jenjangKategori" type="submit" class="btn btn-primary">Simpan Perubahan</button>
                              </div>
                            </div>
                          </div>
                      </div>
                    @endif
                    <br><br>  
                    <p class="apaitu-text wow fadeInUp" data-wow-delay="2.5s">
                        {{$karya->tentang_tim}}
                    </p>
                    @if ($today >= $pengisian->tanggal_mulai && $today <= $pengisian->tanggal_selesai)
                      <a href="#" data-toggle="modal" data-target="#tentangkami" class="button-text wow fadeInUp" data-wow-delay="2.5s">Edit Tentang Kami <i class="icofont-pencil-alt-1"></i></a>
                      <div class="modal fade" id="tentangkami" tabindex="-1" role="dialog" aria-labelledby="tentangkamiLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                {{-- INI --}}
                                <h5 class="modal-title" id="tentangkamiLabel">Tentang Kami (sisa <span id="word_count_tentangkami"></span> karakter)</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form id="f-karya-tentangTim" action="{{url('karya')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                  </form>
                                <textarea form="f-karya-tentangTim" id="textarea_tentangkami" name="tentang_tim" maxlength="360" rows="10" placeholder="Masukkan deskripsi 'tentang kami'">{{$karya->tentang_tim}}</textarea>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button form="f-karya-tentangTim" type="submit" class="btn btn-primary">Simpan Perubahan</button>
                              </div>
                            </div>
                          </div>
                      </div>
                    @endif
                  </div>
              </div>
          </div>
          <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="1s">
              @if ($karya->foto_tim != '')
                <img src="{{asset('uploads/karyas/'.$karya->foto_tim)}}" class="apaitu-profilpict" alt="">
              @else
                <img src="{{asset('images/juri.png')}}" class="apaitu-profilpict" alt="">
              @endif
              @if ($today >= $pengisian->tanggal_mulai && $today <= $pengisian->tanggal_selesai)
                <a href="#" class="button-text" data-toggle="modal" data-target="#foto" style="margin-top: -10px">Ganti foto tim <i class="icofont-image"></i></a>
                <div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-labelledby="fotoLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="fotoLabel">Ganti Foto</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-left">
                          <form id="f-karya-fotoTim" action="{{url('karya')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                          </form>
                          <label for="">Upload foto <span style="font-size: 10px">(Format: jpeg,bmp,png,jpg | Ukuran maksimal: 2MB)</span></label><br>
                          <input form="f-karya-fotoTim" type="file" name="foto_tim">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button form="f-karya-fotoTim" type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                      </div>
                    </div>
                </div>
              @endif
          </div>
        </div>
      </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row frame">
    @if ($karya->fotos->count() != 0)
      <div class="col-md-6 produk wow fadeInUp" data-wow-delay="0.5s" style="background-image: url('{{url('uploads/karyafotos/'.$karya->fotos->first()->foto)}}');background-size:cover;">
    @else
      <div class="col-md-6 produk wow fadeInUp" data-wow-delay="0.5s" style="background-image: url('{{asset('images/sample2.png')}}');background-size:cover;">
    @endif
    </div>
    <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s" style="background-color: #FFDE5A">
      <div class="deskripsi text-center">
        <p class="deskripsi-title wow fadeInUp" data-wow-delay="1s" style="color: rgb(255, 255, 255); text-shadow: 1px #000000; margin-top:0px;">{{$karya->nama}}</p>
        <p class="deskripsi-text wow fadeInUp" data-wow-delay="2s">
            {{$karya->deskripsi}}
        </p>
        @if ($today >= $pengisian->tanggal_mulai && $today <= $pengisian->tanggal_selesai)
          <a href="#" data-toggle="modal" data-target="#deskripsiproduk" class="button-text wow fadeInUp" data-wow-delay="1.5s">Edit produk <i class="icofont-pencil-alt-1"></i></a>
          <div class="modal fade" id="deskripsiproduk" tabindex="-1" role="dialog" aria-labelledby="deskripsiprodukLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deskripsiprodukLabel">Deskripsi Produk</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body text-left">
                  <form id="form-product" action="{{url('karya')}}" method="POST">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="_method" value="PATCH">
                  </form>
                  <label for="">Nama Produk</label>
                  <input form="form-product" name="nama" style="padding-top: 15px;" value="{{$karya->nama}}" type="text" class="form-control" placeholder="Masukkan nama produk">
                  <br>
                  <label for="">Deskripsi (sisa <span id="word_count_deskripsi"></span> karakter)</label>
                  <textarea form="form-product" id="textarea_deskripsi" name="deskripsi" maxlength="350" rows="10" placeholder="Masukkan deskripsi">{{$user->karya->deskripsi}}</textarea>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button form="form-product" type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
<div class="container-fluid wow fadeInUp" data-wow-delay="1s">
<div class="row frame4 text-center" style="position: relative">
  @if ($today >= $pengisian->tanggal_mulai && $today <= $pengisian->tanggal_selesai)
    @if ($karya->fotos->count() >= 10)
      <a class="button-text button-foto">Sudah mencapai maksimal 10 foto <i class="icofont-image"></i></a>        
    @else
      <a href="#" data-toggle="modal" data-target="#fotoMass" class="button-text button-foto">Tambah foto produk <i class="icofont-image"></i></a>
      <div class="modal fade" id="fotoMass" tabindex="-1" role="dialog" aria-labelledby="fotoMassLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="fotoLabel">Upload Foto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body text-left">
            <form id="f-karya-foto" action="{{url('karya/foto')}}" method="POST" enctype="multipart/form-data">
              @csrf
            </form>
            <label for="">Upload foto <span style="font-size: 10px">(Format: jpeg,bmp,png,jpg | Ukuran maksimal: 2MB)</span></label><br>
            <input form="f-karya-foto" type="file" name="foto">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button form="f-karya-foto" type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
          </div>
        </div>
      </div>      
    @endif
  @endif
  <div class="row owl-carousel owl-theme" style="margin: 0px;">
    @forelse ($karya->fotos as $foto)
    <div class="item">
      <div class="slide">
        <img src="{{asset('uploads/karyafotos/'.$foto->foto)}}" class="slide-image" alt="">
        @if ($today >= $pengisian->tanggal_mulai && $today <= $pengisian->tanggal_selesai)
          <a href="{{url('karya/foto/'.$foto->id)}}" class="btn btn-danger btn-hapus">Hapus</a>
        @endif
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
                          <a href="" data-toggle="modal" data-target="#c-video"><img src="{{asset('images/kenali/1.png')}}" alt="" class="kenali-logo"></a>
                          <a href="" data-toggle="modal" data-target="#c-video" class="kenali-title">VIDEO PROFIL @if($karya->link_profil != '') <i class="icofont-check" style="color: rgb(15, 177, 15); position:absolute;"></i> @endif</a>
                          @if ($today >= $pengisian->tanggal_mulai && $today <= $pengisian->tanggal_selesai)
                            <a href="#" data-toggle="modal" data-target="#video" class="button-text button-sm">Tambahkan Link <i class="icofont-link-alt"></i></a>
                            <div class="modal fade" style="margin-top: 150px;" id="c-video" tabindex="-1" role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    <iframe style="width: 100%;z-index:9999;" height="315" src="{{str_replace('.com/watch?v=', '-nocookie.com/embed/', $karya->link_profil)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                  </div>
                                </div>
                              </div>
                            </div>
                          @endif
                          <div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="fotoLabel">Video Profil</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body text-left">
                                  <form id="f-karya-linkProfil" action="{{url('karya')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                  </form>
                                  <label for="">Link video profil</label>
                                  <input form="f-karya-linkProfil" name="link_profil" type="text" class="form-control" placeholder="Masukkan link youtube">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button form="f-karya-linkProfil" type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="1.5s">
                          <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
                          <a href="" data-toggle="modal" data-target="#c-presentasi"><img data-toggle="modal" data-target="#c-presentasi" src="{{asset('images/kenali/2.png')}}" alt="" class="kenali-logo"></a>
                          <a href="" data-toggle="modal" data-target="#c-presentasi" class="kenali-title">VIDEO PRESENTASI @if($karya->link_presentation != '') <i class="icofont-check" style="color: rgb(15, 177, 15); position:absolute;"></i> @endif</a>
                          @if ($today >= $pengisian->tanggal_mulai && $today <= $pengisian->tanggal_selesai)
                            <a href="#" data-toggle="modal" data-target="#presentasi" class="button-text button-sm">Tambahkan Link <i class="icofont-link-alt"></i></a>
                            <div class="modal fade" style="margin-top: 150px;" id="c-presentasi" tabindex="-1" role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    <iframe style="width: 100%;z-index:9999;" height="315" src="{{str_replace('.com/watch?v=', '-nocookie.com/embed/', $karya->link_presentation)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                  </div>
                                </div>
                              </div>
                            </div>
                          @endif
                          <div class="modal fade" id="presentasi" tabindex="-1" role="dialog" aria-labelledby="presentasiLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="fotoLabel">Video Presentasi</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body text-left">
                                  <form id="f-karya-linkPresentasi" action="{{url('karya')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                  </form>
                                  <label for="">Link video presentasi</label>
                                  <input form="f-karya-linkPresentasi" name="link_presentation" type="text" class="form-control" placeholder="Masukkan link youtube">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button form="f-karya-linkPresentasi" type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="2s">
                        <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
                        <a href="" data-toggle="modal" data-target="#c-mockup" class="kenali-title"><img src="{{asset('images/kenali/3.png')}}" alt="" class="kenali-logo"></a>
                        <a href="" data-toggle="modal" data-target="#c-mockup" class="kenali-title">VIDEO MOCK-UP @if($karya->link_mockup != '') <i class="icofont-check" style="color: rgb(15, 177, 15); position:absolute;"></i> @endif</a>
                        @if ($today >= $pengisian->tanggal_mulai && $today <= $pengisian->tanggal_selesai)
                          <a href="#" data-toggle="modal" data-target="#mockup" class="button-text button-sm">Tambahkan Link <i class="icofont-link-alt"></i></a>
                          <div class="modal fade" style="margin-top: 150px;" id="c-mockup" tabindex="-1" role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <iframe style="width: 100%;z-index:9999;" height="315" src="{{str_replace('.com/watch?v=', '-nocookie.com/embed/', $karya->link_mockup)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                        <div class="modal fade" id="mockup" tabindex="-1" role="dialog" aria-labelledby="mockupLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="fotoLabel">Video Mockup</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body text-left">
                                <form id="f-karya-linkMockup" action="{{url('karya')}}" method="POST">
                                  @csrf
                                  <input type="hidden" name="_method" value="PATCH">
                                </form>
                                <label for="">Link video mockup</label>
                                <input form="f-karya-linkMockup" name="link_mockup" type="text" class="form-control" placeholder="Masukkan link youtube">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button form="f-karya-linkMockup" type="submit" class="btn btn-primary">Simpan Perubahan</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="2.5s">
                        <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
                        @if ($karya->proposal != '')
                          <a href="{{asset('uploads/karyas/'.$karya->proposal)}}" target="_blank"><img src="{{asset('images/kenali/4.png')}}" alt="" class="kenali-logo"></a>
                          <a href="{{asset('uploads/karyas/'.$karya->proposal)}}" target="_blank" class="kenali-title">PROPOSAL @if($karya->proposal != '') <i class="icofont-check" style="color: rgb(15, 177, 15); position:absolute;"></i> @endif</a>
                        @else
                          <a href="" target="_blank"><img src="{{asset('images/kenali/4.png')}}" alt="" class="kenali-logo"></a>
                          <a href="" target="_blank" class="kenali-title">PROPOSAL @if($karya->proposal != '') <i class="icofont-check" style="color: rgb(15, 177, 15); position:absolute;"></i> @endif</a>                            
                        @endif
                        @if ($today >= $pengisian->tanggal_mulai && $today <= $pengisian->tanggal_selesai)
                          <a href="#" data-toggle="modal" data-target="#dokumen" class="button-text button-sm">Upload Dokumen <i class="icofont-link-alt"></i></a>
                          <div class="modal fade" id="dokumen" tabindex="-1" role="dialog" aria-labelledby="dokumenLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="fotoLabel">Dokumen Proposal</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body text-left">
                                  <form id="f-karya-proposal" action="{{url('karya')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="_method" value="PATCH">
                                  </form>
                                  <label for="">Dokumen proposal</label>
                                  <input form="f-karya-proposal" name="proposal" type="file">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button form="f-karya-proposal" type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                      </div>
                      <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="3s">
                        <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
                        <a href="" data-toggle="modal" data-target="#c-poster"><img src="{{asset('images/kenali/5.png')}}" alt="" class="kenali-logo"></a>
                        <a href="" data-toggle="modal" data-target="#c-poster" class="kenali-title">POSTER @if($karya->foto_poster != '') <i class="icofont-check" style="color: rgb(15, 177, 15); position:absolute;"></i> @endif</a>
                        @if ($today >= $pengisian->tanggal_mulai && $today <= $pengisian->tanggal_selesai)
                          <a href="#" data-toggle="modal" data-target="#poster" class="button-text button-sm">Upload Poster <i class="icofont-link-alt"></i></a>
                          <div class="modal fade" style="margin-top: 150px;" id="c-poster" tabindex="-1" role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <img style="width: 100%; height:auto;" src="{{asset('uploads/karyas/'.$karya->foto_poster)}}" alt="">
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                        <div class="modal fade" id="poster" tabindex="-1" role="dialog" aria-labelledby="posterLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="fotoLabel">Foto Poster</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body text-left">
                                <form id="f-karya-fotoPoster" action="{{url('karya')}}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  @method('PUT')
                                  <input type="hidden" name="_method" value="PATCH">
                                </form>
                                <label for="">Foto poster</label>
                                <input form="f-karya-fotoPoster" name="foto_poster" type="file">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button form="f-karya-fotoPoster" type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
                <div class="total wow fadeInUp" data-wow-delay="1s">
                    <p><i class="icofont-like"></i> total likes : {{$karya->likers->count()}}, <i class="icofont-comment"></i> total komentar : {{$karya->komentars->count()}}</p>
                </div>
                @forelse ($karya->komentars as $komentar)
                <div class="komen wow fadeInUp" data-wow-delay="1.5s">
                  <img src="{{asset('images/chat.png')}}" alt="" class="komen-icon">
                  <div class="komen-content">
                      <p class="komen-text">
                          {{$komentar->komentar}}
                      </p>
                      <p class="komen-info">
                          <i class="icofont-user-alt-5"></i> {{$komentar->user->name}}
                          &nbsp;&nbsp;
                          <i class="icofont-calendar"></i> {{$komentar->created_at->format('d, M Y - h:m')}}
                      </p>
                      <br>
                      <a href="" class="button-text button-sm button-red">Sembunyikan komentar ini <i class="icofont-close"></i></a>
                  </div>
                </div>
                @empty
                    Data komentar Kosong
                @endforelse
              </div>
              <div class="col-md-4 wow fadeInUp" data-wow-delay="1.5s">
                  <p class="headingtitle">
                      <i>UBAH DATA LOGIN</i>
                  </p>
                  <div class="panel panel-default" style="border: 1px solid #e4e4e4; background-color:white; padding: 20px;">
                    <div class="panel-body">
                      <form action="{{url('profil')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <label for="">Username</label>
                        <input style="padding-top: 15px;" type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Username baru">
                        <br>
                        <label for="">Email</label>
                        <input style="padding-top: 15px;" type="text" class="form-control" name="email" value="{{$user->email}}" placeholder="Email baru">
                        <br>
                        <label for="">Password</label>
                        <input style="padding-top: 15px;" type="password" class="form-control" name="password" placeholder="Password baru">
                        <br>
                        <div class="alert alert-warning">
                          <i class="icofont-warning"></i> Isi kolom password hanya jika ingin mengganti password
                        </div>
                        <input type="submit" name="submit" class="btn btn-yellow" value="Simpan perubahan">
                      </form>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@else
<div class="container-fluid">
  <div class="row frame frame2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="status">
              <p class="status-text"><span class="status-grey"><i class="icofont-ui-calendar"></i> Waktu pengisian karya belum tersedia</p>
          </div>
        </div>
    </div>
  </div>
</div>
@endif
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
  $('#textarea_tentangkami').on('change keydown paste input', function() {
    const textarea_tentangkami = document.getElementById('textarea_tentangkami').value;
    word_count_tentangkami.innerHTML = 360 - textarea_tentangkami.length;
    console.log(textarea_tentangkami.length);
  })
  const textarea_deskripsi = document.getElementById('textarea_deskripsi').value;
  const word_count_deskripsi = document.getElementById('word_count_deskripsi');
  word_count_deskripsi.innerHTML = 350 - textarea_deskripsi.length;
  $('#textarea_deskripsi').on('change keydown paste input', function() {
    const textarea_deskripsi = document.getElementById('textarea_deskripsi').value;
    word_count_deskripsi.innerHTML = 350 - textarea_deskripsi.length;
    console.log(textarea_deskripsi.length);
  })
</script>
@endsection