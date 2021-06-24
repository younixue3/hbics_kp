@extends('layouts.layout-expo')
@section('content')
@php
  $pengisian = $karya->event->pengisian;
  $today = \Carbon\Carbon::now();
@endphp
@if ($pengisian)
  @if ($today >= $pengisian->tanggal_mulai && $today <= $pengisian->tanggal_selesai)
    <div class="container-fluid">
      <div class="row frame frame2">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="status">
                  <p class="status-text"><span class="status-grey"><i class="icofont-ui-calendar"></i> Waktu pengisian profil :</span> <span class="status-blue">{{$pengisian->tanggal_mulai->format('d M Y')}} - {{$pengisian->tanggal_selesai->format('d M Y')}}</span></p>
                </div>
              </div>
              <div class="col-md-12">
                @if(session('success'))
                  <div class="alert alert-success form-control2" style="border:0px solid transparent !important;">
                    {{ session('success') }}
                  </div>
                @endif
                @if(session('fail'))
                  <div class="alert alert-danger form-control2" style="border:0px solid transparent !important;">
                    {{ session('fail') }}
                  </div>
                @endif
                @if ($errors->any())
                  <div class="alert alert-danger form-control2" style="border:0px solid transparent !important;">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  <br><br>
                @endif
              </div>
              <div class="col-md-12">
                <div class="panel">
                  <div class="row">
                    <div class="col-md-10">
                      <p style="font-size: 12px; color: grey;">
                        <b>Kelengkapan data profil: </b> <br>
                        Jenjang
                        <span class="alert alert-xs @if($karya->jenjang == '') alert-danger @else alert-success @endif">
                          @if($karya->jenjang == '') 
                            <i class="icofont-close-circled"></i>
                          @else 
                            <i class="icofont-checked"></i>
                          @endif
                        </span>,  
                        Kategori
                        <span class="alert alert-xs @if($karya->kategori == '') alert-danger @else alert-success @endif">
                          @if($karya->kategori == '') 
                            <i class="icofont-close-circled"></i>
                          @else 
                            <i class="icofont-checked"></i>
                          @endif
                        </span>,
                        Foto Tim
                        <span class="alert alert-xs @if($karya->foto_tim == '') alert-danger @else alert-success @endif">
                          @if($karya->foto_tim == '') 
                            <i class="icofont-close-circled"></i>
                          @else 
                            <i class="icofont-checked"></i>
                          @endif
                        </span>,
                        Foto Poster
                        <span class="alert alert-xs @if($karya->foto_poster == '') alert-danger @else alert-success @endif">
                          @if($karya->foto_poster == '') 
                            <i class="icofont-close-circled"></i>
                          @else 
                            <i class="icofont-checked"></i>
                          @endif
                        </span>,
                        Tentang Tim
                        <span class="alert alert-xs @if($karya->tentang_tim == '') alert-danger @else alert-success @endif">
                          @if($karya->tentang_tim == '') 
                            <i class="icofont-close-circled"></i>
                          @else 
                            <i class="icofont-checked"></i>
                          @endif
                        </span>,
                        Nama
                        <span class="alert alert-xs @if($karya->nama == '') alert-danger @else alert-success @endif">
                          @if($karya->nama == '') 
                            <i class="icofont-close-circled"></i>
                          @else 
                            <i class="icofont-checked"></i>
                          @endif
                        </span>,
                        Deskripsi
                        <span class="alert alert-xs @if($karya->deskripsi == '') alert-danger @else alert-success @endif">
                          @if($karya->deskripsi == '') 
                            <i class="icofont-close-circled"></i>
                          @else 
                            <i class="icofont-checked"></i>
                          @endif
                        </span>,
                        Link Profil
                        <span class="alert alert-xs @if($karya->link_profil == '') alert-danger @else alert-success @endif">
                          @if($karya->link_profil == '') 
                            <i class="icofont-close-circled"></i>
                          @else 
                            <i class="icofont-checked"></i>
                          @endif
                        </span>,
                        Link Presentasi
                        <span class="alert alert-xs @if($karya->link_presentation == '') alert-danger @else alert-success @endif">
                          @if($karya->link_presentation == '') 
                            <i class="icofont-close-circled"></i>
                          @else 
                            <i class="icofont-checked"></i>
                          @endif
                        </span>,
                        Link Mockup
                        <span class="alert alert-xs @if($karya->link_mockup == '') alert-danger @else alert-success @endif">
                          @if($karya->link_mockup == '') 
                            <i class="icofont-close-circled"></i>
                          @else 
                            <i class="icofont-checked"></i>
                          @endif
                        </span>,
                        Proposal
                        <span class="alert alert-xs @if($karya->proposal == '') alert-danger @else alert-success @endif">
                          @if($karya->proposal == '') 
                            <i class="icofont-close-circled"></i>
                          @else 
                            <i class="icofont-checked"></i>
                          @endif
                        </span>,
                        Foto karya : {{$fotos->count()}}.
                      </p>
                    </div>
                    <div class="col-md-2">
                      <a href="{{url('profil/simulasi')}}" target="_blank" class="btn btn-yellow">Lihat Simulasi Profil <i class="icofont-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="panel">
                  <div class="row">
                    <div class="col-md-12">
                      <h4><i class="icofont-user-alt-5"></i> Data Umum</h4>
                      <form action="{{url('karya')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <label class="mt10">
                          @if ($karya->nama_tim != null)
                              <i style="color: green" class="icofont-check-circled"></i>
                          @endif
                          Nama Tim</label>
                        <input type="text" name="nama_tim" class="form-control2" placeholder="Masukkan nama tim" value="{{$karya->nama_tim}}">
                        <label class="mt10">
                          @if ($karya->foto_tim != null)
                              <i style="color: green" class="icofont-check-circled"></i>
                          @endif
                          Foto Tim 
                          @if ($karya->foto_tim != null)
                            <a style="color: rgb(41, 91, 228)" href="{{asset('uploads/karyas/'.$karya->foto_tim)}}" data-lightbox="foto_poster" data-title="{{$karya->foto_poster}}">Lihat foto saat ini <i class="icofont-image"></i></a>
                          @endif
                        </label>
                        <input type="file" name="foto_tim" class="form-control2" placeholder="Masukkan foto tim">
                        <label class="mt10" id="tentangkamiLabel">
                          @if ($karya->tentang_tim != null)
                              <i style="color: green" class="icofont-check-circled"></i>
                          @endif
                          Tentang Tim (sisa <span id="word_count_tentangkami"></span> karakter)</label>
                        <textarea id="textarea_tentangkami" name="tentang_tim" maxlength="360" rows="10" placeholder="Masukkan deskripsi 'tentang tim'" class="form-control2">{{$karya->tentang_tim}}</textarea>
                        <div class="row">
                          <div class="col-md-6">
                            <label class="mt10">
                              @if ($karya->jenjang != null)
                                  <i style="color: green" class="icofont-check-circled"></i>
                              @endif
                              Jenjang</label>
                            <select name="jenjang" class="form-control2" style="padding-top: 5px !important; height:50px; padding-bottom:3px;">
                              {{-- <option value="" selected disabled>- Jenjang -</option> --}}
                              <option @if($karya->jenjang == null) selected @endif value="">- Pilih Salahsatu -</option>
                              <option @if($karya->jenjang == 'SMP/MTS') selected @endif value="SMP/MTS">SMP/MTS</option>
                              <option @if($karya->jenjang == 'SMA/SMK/MAN') selected @endif value="SMA/SMK/MAN">SMA/SMK/MAN</option>
                            </select>
                          </div>
                          <div class="col-md-6">
                            <label class="mt10">
                              @if ($karya->kategori != null)
                                  <i style="color: green" class="icofont-check-circled"></i>
                              @endif
                              Kategori</label>
                            <select name="kategori" class="form-control2" style="padding-top: 5px !important; height:50px; padding-bottom:3px;">
                              {{-- <option value="" selected disabled>- Jenjang -</option> --}}
                              <option @if($karya->kategori == null) selected @endif value="">- Pilih Salahsatu -</option>
                              <option @if($karya->kategori == 'Desain Grafis') selected @endif value="Desain Grafis">Desain Grafis</option>
                              <option @if($karya->kategori == 'Aplikasi dan Game') selected @endif value="Aplikasi dan Game">Aplikasi dan Game</option>
                              <option @if($karya->kategori == 'Food and beverage') selected @endif value="Food and beverage">Food and Beverage</option>
                              <option @if($karya->kategori == 'Fashion') selected @endif value="Fashion">Fashion</option>
                              <option @if($karya->kategori == 'Kriya') selected @endif value="Kriya">Kriya</option>
                            </select>
                          </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="panel">
                  <div class="row">
                    <div class="col-md-12">
                      <h4><i class="icofont-paint"></i> Data Produk</h4>
                      <form action="{{url('karya')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <label class="mt10">
                          @if ($karya->nama != null)
                            <i style="color: green" class="icofont-check-circled"></i>
                          @endif
                          Nama Produk</label>
                        <input type="text" name="nama" class="form-control2" placeholder="Masukkan nama produk" value="{{$karya->nama}}">
                        <label class="mt10">
                          @if ($karya->deskripsi != null)
                            <i style="color: green" class="icofont-check-circled"></i>
                          @endif
                          Deskripsi Produk (sisa <span id="word_count_deskripsi"></span> karakter)</label>
                        <textarea id="textarea_deskripsi" name="deskripsi" maxlength="350" rows="10" placeholder="Masukkan deskripsi 'produk'" class="form-control2">{{$karya->deskripsi}}</textarea>
                        <div class="row">
                          <div class="col-md-6">
                            <label class="mt10">
                              @if ($karya->proposal != null)
                                <i style="color: green" class="icofont-check-circled"></i>
                              @endif
                              Proposal
                              @if ($karya->proposal != null)
                                <a style="color: rgb(41, 91, 228)" href="{{asset('uploads/karyas/'.$karya->proposal)}}" target="_blank">Lihat proposal saat ini <i class="icofont-file"></i></a>
                              @endif
                            </label>
                            <input type="file" name="proposal" class="form-control2">
                          </div>
                          <div class="col-md-6">
                            <label class="mt10">
                              @if ($karya->foto_poster != null)
                                <i style="color: green" class="icofont-check-circled"></i>
                              @endif
                              Foto Poster
                              @if ($karya->foto_poster != null)
                                <a style="color: rgb(41, 91, 228)" href="{{asset('uploads/karyas/'.$karya->foto_poster)}}" data-lightbox="foto_poster" data-title="{{$karya->foto_poster}}">Lihat foto saat ini <i class="icofont-image"></i></a>
                              @endif
                            </label>
                            <input type="file" name="foto_poster" class="form-control2">
                          </div>
                        </div>
                        <label class="mt10">
                          @if ($karya->link_profil != null)
                            <i style="color: green" class="icofont-check-circled"></i>
                          @endif
                          Link Profil</label>
                        <input type="text" name="link_profil" placeholder="Masukkan Link Profil" class="form-control2" value="{{$karya->link_profil}}">
                        <label class="mt10">
                          @if ($karya->link_presentation != null)
                            <i style="color: green" class="icofont-check-circled"></i>
                          @endif
                          Link Presentasi</label>
                        <input type="text" name="link_presentation" placeholder="Masukkan Link presentation" class="form-control2" value="{{$karya->link_presentation}}">
                        <label class="mt10">
                          @if ($karya->link_mockup != null)
                            <i style="color: green" class="icofont-check-circled"></i>
                          @endif
                          Link Mockup</label>
                        <input type="text" name="link_mockup" placeholder="Masukkan Link mockup" class="form-control2" value="{{$karya->link_mockup}}">
                        <br><br>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="panel">
                  <div class="row">
                    <div class="col-md-12">
                      @if ($fotos->count() >= 10)
                        <a class="button-text button-foto">Sudah mencapai maksimal 10 foto <i class="icofont-image"></i></a>        
                      @else
                        <h4><i class="icofont-image"></i> Data Foto Produk</h4>
                        <form action="{{url('karya/foto')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <label class="mt10">Foto Produk <span ></span></label>
                          <input type="file" required name="foto" class="form-control2">
                          <br><br>
                          <button type="submit" class="btn btn-primary">Upload Foto</button>
                        </form>
                      @endif
                    </div>
                  </div>
                  <div class="row">
                    <div class="gal">
                      @forelse ($karya->fotos as $foto)
                        <div class="gal-frame">
                          <img src="{{asset('uploads/karyafotos/'.$foto->foto)}}" alt="">
                          @if ($today >= $pengisian->tanggal_mulai && $today <= $pengisian->tanggal_selesai)
                            <a href="{{url('karya/foto/'.$foto->id)}}" class="btn btn-danger btn-del">Hapus</a>
                          @endif
                        </div>
                      @empty
                      @endforelse
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="panel">
                  <div class="row">
                    <div class="col-md-12">
                      <h4><i class="icofont-user"></i> Data Login Akun</h4>
                      <form action="{{url('profil')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <label class="mt10">Username</label>
                        <input type="text" class="form-control2" name="name" value="{{$user->name}}" placeholder="Username baru">
                        <br>
                        <label class="mt10">Email</label>
                        <input type="text" class="form-control2" name="email" value="{{$user->email}}" placeholder="Email baru">
                        <br>
                        <label class="mt10">Password</label>
                        <input type="password" class="form-control2" name="password" placeholder="Password baru">
                        <br><br>
                        <div class="alert alert-warning form-control2" style="border:0px solid transparent !important;">
                          <i class="icofont-warning"></i> Isi kolom password hanya jika ingin mengganti password
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan perubahan">
                      </form>
                    </div>
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
                <p class="status-text"><span class="status-grey"><i class="icofont-ui-calendar"></i> Waktu pengisian profil :</span> <span class="status-blue">{{$pengisian->tanggal_mulai->format('d M Y')}} - {{$pengisian->tanggal_selesai->format('d M Y')}}</span></p>
              </div>
            </div>
            <div class="col-md-12">
              <div class="panel">
                <div class="row">
                  <div class="col-md-10">
                    <p style="font-size: 12px; color: grey;">
                      <b>Kelengkapan data profil: </b> <br>
                      Jenjang
                      <span class="alert alert-xs @if($karya->jenjang == '') alert-danger @else alert-success @endif">
                        @if($karya->jenjang == '') 
                          <i class="icofont-close-circled"></i>
                        @else 
                          <i class="icofont-checked"></i>
                        @endif
                      </span>,  
                      Kategori
                      <span class="alert alert-xs @if($karya->kategori == '') alert-danger @else alert-success @endif">
                        @if($karya->kategori == '') 
                          <i class="icofont-close-circled"></i>
                        @else 
                          <i class="icofont-checked"></i>
                        @endif
                      </span>,
                      Foto Tim
                      <span class="alert alert-xs @if($karya->foto_tim == '') alert-danger @else alert-success @endif">
                        @if($karya->foto_tim == '') 
                          <i class="icofont-close-circled"></i>
                        @else 
                          <i class="icofont-checked"></i>
                        @endif
                      </span>,
                      Foto Poster
                      <span class="alert alert-xs @if($karya->foto_poster == '') alert-danger @else alert-success @endif">
                        @if($karya->foto_poster == '') 
                          <i class="icofont-close-circled"></i>
                        @else 
                          <i class="icofont-checked"></i>
                        @endif
                      </span>,
                      Tentang Tim
                      <span class="alert alert-xs @if($karya->tentang_tim == '') alert-danger @else alert-success @endif">
                        @if($karya->tentang_tim == '') 
                          <i class="icofont-close-circled"></i>
                        @else 
                          <i class="icofont-checked"></i>
                        @endif
                      </span>,
                      Nama
                      <span class="alert alert-xs @if($karya->nama == '') alert-danger @else alert-success @endif">
                        @if($karya->nama == '') 
                          <i class="icofont-close-circled"></i>
                        @else 
                          <i class="icofont-checked"></i>
                        @endif
                      </span>,
                      Deskripsi
                      <span class="alert alert-xs @if($karya->deskripsi == '') alert-danger @else alert-success @endif">
                        @if($karya->deskripsi == '') 
                          <i class="icofont-close-circled"></i>
                        @else 
                          <i class="icofont-checked"></i>
                        @endif
                      </span>,
                      Link Profil
                      <span class="alert alert-xs @if($karya->link_profil == '') alert-danger @else alert-success @endif">
                        @if($karya->link_profil == '') 
                          <i class="icofont-close-circled"></i>
                        @else 
                          <i class="icofont-checked"></i>
                        @endif
                      </span>,
                      Link Presentasi
                      <span class="alert alert-xs @if($karya->link_presentation == '') alert-danger @else alert-success @endif">
                        @if($karya->link_presentation == '') 
                          <i class="icofont-close-circled"></i>
                        @else 
                          <i class="icofont-checked"></i>
                        @endif
                      </span>,
                      Link Mockup
                      <span class="alert alert-xs @if($karya->link_mockup == '') alert-danger @else alert-success @endif">
                        @if($karya->link_mockup == '') 
                          <i class="icofont-close-circled"></i>
                        @else 
                          <i class="icofont-checked"></i>
                        @endif
                      </span>,
                      Proposal
                      <span class="alert alert-xs @if($karya->proposal == '') alert-danger @else alert-success @endif">
                        @if($karya->proposal == '') 
                          <i class="icofont-close-circled"></i>
                        @else 
                          <i class="icofont-checked"></i>
                        @endif
                      </span>.
                    </p>
                  </div>
                  <div class="col-md-2">
                    <a href="{{url('profil/simulasi')}}" target="_blank" class="btn btn-yellow">Lihat Simulasi Profil <i class="icofont-long-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="panel">
                <div class="row">
                  <div class="col-md-12">
                    <h4><i class="icofont-user-alt-5"></i> Data Umum</h4>
                      <label class="mt10">Nama Tim</label>
                      <input type="text" name="nama_tim" class="form-control2" readonly value="{{$karya->nama_tim}}">
                      <label class="mt10">Foto Tim 
                        @if ($karya->foto_tim != null)
                        <div class="gal">
                          <div class="gal-frame" style="padding-left: 0px; padding-right:0px;">
                            <img src="{{asset('uploads/karyas/'.$karya->foto_tim)}}" alt="">
                          </div>
                        </div>
                        @else
                        - Foto kosong -
                        @endif
                      </label>
                      <label class="mt10" id="tentangkamiLabel">Tentang Tim (sisa <span id="word_count_tentangkami"></span> karakter)</label>
                      <textarea id="textarea_tentangkami" name="tentang_tim" maxlength="360" rows="5" readonly class="form-control2">{{$karya->tentang_tim}}</textarea>
                      <div class="row">
                        <div class="col-md-6">
                          <label class="mt10">Jenjang</label>
                          <input type="text" name="nama_tim" class="form-control2" readonly value="{{$karya->jenjang}}">
                        </div>
                        <div class="col-md-6">
                          <label class="mt10">Kategori</label>
                          <input type="text" name="nama_tim" class="form-control2" readonly value="{{$karya->kategori}}">
                        </div>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <br>
                    <h4><i class="icofont-paint"></i> Data Produk</h4>
                      <label class="mt10">Nama Produk</label>
                      <input type="text" class="form-control2" readonly value="{{$karya->nama}}">
                      <label class="mt10">Deskripsi Produk (sisa <span id="word_count_deskripsi"></span> karakter)</label>
                      <textarea id="textarea_deskripsi" readonly maxlength="350" rows="10" class="form-control2">{{$karya->deskripsi}}</textarea>
                      <div class="row">
                        <div class="col-md-6">
                          <label class="mt10">Proposal
                            @if ($karya->proposal != null)
                              <a style="color: rgb(41, 91, 228)" href="{{asset('uploads/karyas/'.$karya->proposal)}}" target="_blank">Lihat proposal saat ini <i class="icofont-paper"></i></a>
                            @endif
                          </label>
                          <input type="text" class="form-control2" readonly value="{{$karya->proposal}}">
                        </div>
                        <div class="col-md-6">
                          <label class="mt10">Foto Poster
                            @if ($karya->foto_poster != null)
                              <a style="color: rgb(41, 91, 228)" href="{{asset('uploads/karyas/'.$karya->foto_poster)}}" data-lightbox="foto_poster" data-title="{{$karya->foto_poster}}">Lihat foto saat ini <i class="icofont-image"></i></a>
                            @endif
                          </label>
                          <input type="text"  class="form-control2" readonly value="{{$karya->foto_poster}}">
                        </div>
                      </div>
                      <label class="mt10">Link Profil</label>
                      <input type="text" name="link_profil" readonly class="form-control2" value="{{$karya->link_profil}}">
                      <label class="mt10">Link Presentasi</label>
                      <input type="text" name="link_presentation" readonly class="form-control2" value="{{$karya->link_presentation}}">
                      <label class="mt10">Link Mockup</label>
                      <input type="text" name="link_mockup" readonly class="form-control2" value="{{$karya->link_mockup}}">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <br><br>
                    <h4><i class="icofont-image"></i> Data Foto Produk</h4>
                  </div>
                </div>
                <div class="row">
                  <div class="gal">
                    @forelse ($karya->fotos as $foto)
                      <a href="{{asset('uploads/karyafotos/'.$foto->foto)}}" class="gal-frame" data-lightbox="fotos" data-title="{{$foto->foto}}">
                        <img src="{{asset('uploads/karyafotos/'.$foto->foto)}}" alt="">
                      </a>
                    @empty
                    @endforelse
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="panel">
                <div class="row">
                  <div class="col-md-12">
                    <h4><i class="icofont-user"></i> Data Login Akun</h4>
                    <form action="{{url('profil')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="_method" value="PATCH">
                      <label class="mt10">Username</label>
                      <input type="text" class="form-control2" name="name" value="{{$user->name}}" placeholder="Username baru">
                      <br>
                      <label class="mt10">Email</label>
                      <input type="text" class="form-control2" name="email" value="{{$user->email}}" placeholder="Email baru">
                      <br>
                      <label class="mt10">Password</label>
                      <input type="password" class="form-control2" name="password" placeholder="Password baru">
                      <br><br>
                      <div class="alert alert-warning form-control2" style="border: 0px solid transparent !important;">
                        <i class="icofont-warning"></i> Isi kolom password hanya jika ingin mengganti password
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Simpan perubahan">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
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
  $('#status').modal('show');
</script>
@endsection