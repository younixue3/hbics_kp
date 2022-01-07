@extends('layouts.layout-expo')
@section('content')
    <div class="container-fluid">
        {{-- <a class="logo logo--stuck" href="{{url('beranda')}}">
            <img src="{{asset('images/logo.png')}}"/>
        </a> --}}
        <div class="row frame frame2">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="apaitu apaitu--profil">
                            <img src="{{asset('images/gif/3.gif')}}" class="apaitu-image wow fadeInUp"
                                 data-wow-delay="0.5s" alt="">
                            <div class="apaitu-mid">
                                <p class="namateam namateam--new wow fadeInUp" data-wow-delay="1s">
                                    <i class="icofont-people"></i> {{$creation->participant_names}}
                                </p>
                                <a href="#" data-toggle="modal" data-target="#anggotatim"
                                   class="button-text wow fadeInUp" data-wow-delay="1s">Edit Nama tim <i
                                        class="icofont-pencil-alt-1"></i></a>
                                <div class="modal fade" id="anggotatim" tabindex="-1" role="dialog"
                                     aria-labelledby="anggotatimLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="anggotatimLabel">Nama tim</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form-participant-names" action="{{url('creation')}}"
                                                      method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="creation_id" value="{{$creation->id}}">
                                                </form>
                                                <textarea form="form-participant-names" name="participant_names"
                                                          rows="10" placeholder="Masukkan nama tim"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button form="form-participant-names" type="submit"
                                                        class="btn btn-primary">Simpan Perubahan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <p class="apaitu-title wow fadeInUp" data-wow-delay="1.5s" style="margin-bottom:0px;">
                                    TENTANG KAMI
                                </p>
                                <p class="namateam wow fadeInUp" data-wow-delay="2s">
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
                                                $kategori = 'Desain Grafis';
                                                break;

                                            case 2:
                                                $kategori = 'Aplikasi dan Game';
                                                break;

                                            case 3:
                                                $kategori = 'Food and beverage';
                                                break;

                                            case 4:
                                                $kategori = 'Fashion';
                                                break;

                                            case 5:
                                                $kategori = 'Kriya';
                                                break;
                                        }
                                    @endphp
                                    <i class="icofont-check wow fadeInUp" data-wow-delay="2s"></i> Jenjang
                                    : {{$jenjang ?? 'Belum diatur'}}, Kategori: {{$kategori ?? 'Belum diatur'}}
                                </p>
                                <a href="#" data-toggle="modal" data-target="#jenjang" class="button-text wow fadeInUp"
                                   data-wow-delay="2s">Edit jenjang dan kategori <i
                                        class="icofont-pencil-alt-1"></i></a>
                                <div class="modal fade" id="jenjang" tabindex="-1" role="dialog"
                                     aria-labelledby="jenjangLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="jenjangLabel">Jenjang dan kategori</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form-level-category" action="{{url('creation')}}"
                                                      method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="creation_id" value="{{$creation->id}}">
                                                </form>
                                                <label for="">Jenjang</label>
                                                <select form="form-level-category" name="level" class="form-control"
                                                        style="color: black !important">
                                                    {{-- <option value="" selected disabled>- Jenjang -</option> --}}
                                                    <option value="2">SMP</option>
                                                    <option value="3">SMA</option>
                                                </select>
                                                <br>
                                                <label for="">Kategori</label>
                                                <select form="form-level-category" name="category" class="form-control">
                                                    {{-- <option value="" selected disabled>- Jenjang -</option> --}}
                                                    <option value="1">Desain Grafis</option>
                                                    <option value="2">Aplikasi dan Game</option>
                                                    <option value="3">Food and beverage</option>
                                                    <option value="4">Fashion</option>
                                                    <option value="5">Kriya</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button form="form-level-category" type="submit"
                                                        class="btn btn-primary">Simpan Perubahan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <p class="apaitu-text wow fadeInUp" data-wow-delay="2.5s">
                                    {{$creation->about_team}}
                                </p>
                                <a href="#" data-toggle="modal" data-target="#tentangkami"
                                   class="button-text wow fadeInUp" data-wow-delay="2.5s">Edit Tentang Kami <i
                                        class="icofont-pencil-alt-1"></i></a>
                                <div class="modal fade" id="tentangkami" tabindex="-1" role="dialog"
                                     aria-labelledby="tentangkamiLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tentangkamiLabel">Tentang Kami</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form-about-team" action="{{url('creation')}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="creation_id" value="{{$creation->id}}">
                                                </form>
                                                <textarea form="form-about-team" name="about_team" rows="10"
                                                          placeholder="Masukkan deskripsi 'tentang kami'"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button form="form-about-team" type="submit" class="btn btn-primary">
                                                    Simpan Perubahan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="1s">
                        @if ($creation->image_team_id)
                            <img src="{{url('image/'.$creation->image_team_id)}}" class="apaitu-profilpict" alt="">
                        @else
                            <img src="{{asset('images/juri.png')}}" class="apaitu-profilpict" alt="">
                        @endif

                        <a href="#" class="button-text" data-toggle="modal" data-target="#foto"
                           style="margin-top: -10px">Ganti foto tim <i class="icofont-image"></i></a>
                        <div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-labelledby="fotoLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="fotoLabel">Ganti Foto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-left">
                                        <form id="form-image-team" action="{{url('creation')}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="creation_id" value="{{$creation->id}}">
                                        </form>
                                        <label for="">Upload foto</label>
                                        <input form="form-image-team" type="file" name="image_team">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button form="form-image-team" type="submit" class="btn btn-primary">Simpan
                                            Perubahan
                                        </button>
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
        <div class="row frame">
            @if (count($creation->product_images()))
                <div class="col-md-6 produk wow fadeInUp" data-wow-delay="0.5s"
                     style="background-image: url('{{url('image/'.$creation->product_images()[0])}}');background-size:cover;">
                    @else
                        <div class="col-md-6 produk wow fadeInUp" data-wow-delay="0.5s"
                             style="background-image: url('{{asset('images/sample2.png')}}');background-size:cover;">
                            @endif
                        </div>
                        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s" style="background-color: #FFDE5A">
                            <div class="deskripsi text-center">
                                <p class="deskripsi-title wow fadeInUp" data-wow-delay="1s">DESKIRPSI PRODUK</p>
                                <p class="deskripsi-title wow fadeInUp" data-wow-delay="1.5s" style="font-size: 20px">
                                    "{{$creation->product_name ?? 'Nama produk belum diatur'}}"</p>
                                <p class="deskripsi-text wow fadeInUp" data-wow-delay="2s">
                                    {{$creation->product_description}}
                                </p>
                                <a href="#" data-toggle="modal" data-target="#deskripsiproduk"
                                   class="button-text wow fadeInUp" data-wow-delay="1.5s">Edit produk <i
                                        class="icofont-pencil-alt-1"></i></a>
                                <div class="modal fade" id="deskripsiproduk" tabindex="-1" role="dialog"
                                     aria-labelledby="deskripsiprodukLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deskripsiprodukLabel">Deskripsi Produk</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-left">
                                                <form id="form-product" action="{{url('creation')}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="creation_id" value="{{$creation->id}}">
                                                </form>
                                                <label for="">Nama Produk</label>
                                                <input form="form-product" name="product_name" type="text"
                                                       class="form-control" placeholder="Masukkan nama produk">
                                                <label for="">Deskripsi Produk</label>
                                                <textarea form="form-product" name="product_description" rows="10"
                                                          placeholder="Masukkan deskripsi 'produk'"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button form="form-product" type="submit" class="btn btn-primary">Simpan
                                                    Perubahan
                                                </button>
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
                        <div class="col-md-2">
                            <a href="#" data-toggle="modal" data-target="#fotoMass" class="button-text wow fadeInUp"
                               data-wow-delay="1s">Tambah foto produk<i class="icofont-image"></i></a>
                            <div class="modal fade" id="fotoMass" tabindex="-1" role="dialog"
                                 aria-labelledby="fotoMassLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="fotoLabel">Upload Foto</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <form id="form-image-product" action="{{url('creation')}}" method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="creation_id" value="{{$creation->id}}">
                                            </form>
                                            <label for="">Upload foto</label>
                                            <input form="form-image-product" type="file" name="image_product[]">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button form="form-image-product" type="submit" class="btn btn-primary">
                                                Simpan Perubahan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 wow fadeInUp" data-wow-delay="1s">
                            <div class="row">
                                @forelse ($creation->product_images() as $imageId)
                                    <div class="col-md-4">
                                        <img src="{{url('image/'.$imageId)}}" class="slide-image"
                                             style="height: 200px; object-fit:cover;margin-bottom:15px;" alt="">
                                        <form id="form-image-product-delete-{{$imageId}}" action="{{url('creation')}}"
                                              method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="creation_id" value="{{$creation->id}}">
                                        </form>
                                        <input form="form-image-product-delete-{{$imageId}}" type="hidden"
                                               name="image_product_delete[]" value="{{$imageId}}">
                                        <button form="form-image-product-delete-{{$imageId}}" type="submit"
                                                class="btn btn-danger">Hapus
                                        </button>
                                    </div>
                                @empty
                                    <div class="col-md-12">
                                        Data foto kosong
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container-fluid">
          <div class="row">
              <div class="col-md-12 text-center slide">
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
                            <form id="form-image-product" action="{{url('creation')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <input type="hidden" name="creation_id" value="{{$creation->id}}">
                            </form>
                            <label for="">Upload foto</label>
                            <input form="form-image-product" type="file" name="image_product[]">
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button form="form-image-product" type="submit" class="btn btn-primary">Simpan Perubahan</button>
                          </div>
                          </div>
                      </div>
                  </div>
                  @forelse ($creation->product_images() as $imageId)
                    <img src="{{url('image/'.$imageId)}}" class="slide-image" alt="">
                    <form id="form-image-product-delete-{{$imageId}}" action="{{url('creation')}}" method="POST">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="creation_id" value="{{$creation->id}}">
                    </form>
                    <input form="form-image-product-delete-{{$imageId}}" type="hidden" name="image_product_delete[]" value="{{$imageId}}">
                    <button form="form-image-product-delete-{{$imageId}}" type="submit" class="btn btn-danger">Hapus</button>
                  @empty
                    <img src="{{asset('images/sample2.png')}}" class="slide-image" alt="">
                  @endforelse
              </div>
          </div>
        </div> --}}
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
                                    <img src="{{asset('images/kenali/1.png')}}" alt="" class="kenali-logo">
                                    <a href="" class="kenali-title">VIDEO PROFIL</a>
                                    <a href="#" data-toggle="modal" data-target="#video" class="button-text button-sm">Tambahkan
                                        Link <i class="icofont-link-alt"></i></a>
                                    <div class="modal fade" id="video" tabindex="-1" role="dialog"
                                         aria-labelledby="videoLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="fotoLabel">Video Profil</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <form id="form-link-profile" action="{{url('creation')}}"
                                                          method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="creation_id"
                                                               value="{{$creation->id}}">
                                                    </form>
                                                    <label for="">Link video profil</label>
                                                    <input form="form-link-profile" name="link_profile" type="text"
                                                           class="form-control" placeholder="Masukkan link youtube">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button form="form-link-profile" type="submit"
                                                            class="btn btn-primary">Simpan Perubahan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="1.5s">
                                    <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
                                    <img src="{{asset('images/kenali/2.png')}}" alt="" class="kenali-logo">
                                    <a href="" class="kenali-title">VIDEO PRESENTASI</a>
                                    <a href="#" data-toggle="modal" data-target="#presentasi"
                                       class="button-text button-sm">Tambahkan Link <i class="icofont-link-alt"></i></a>
                                    <div class="modal fade" id="presentasi" tabindex="-1" role="dialog"
                                         aria-labelledby="presentasiLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="fotoLabel">Video Presentasi</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <form id="form-link-presentation" action="{{url('creation')}}"
                                                          method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="creation_id"
                                                               value="{{$creation->id}}">
                                                    </form>
                                                    <label for="">Link video presentasi</label>
                                                    <input form="form-link-presentation" name="link_presentation"
                                                           type="text" class="form-control"
                                                           placeholder="Masukkan link youtube">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button form="form-link-presentation" type="submit"
                                                            class="btn btn-primary">Simpan Perubahan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="2s">
                                    <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
                                    <img src="{{asset('images/kenali/3.png')}}" alt="" class="kenali-logo">
                                    <a href="" class="kenali-title">VIDEO MOCK-UP</a>
                                    <a href="#" data-toggle="modal" data-target="#mockup" class="button-text button-sm">Tambahkan
                                        Link <i class="icofont-link-alt"></i></a>
                                    <div class="modal fade" id="mockup" tabindex="-1" role="dialog"
                                         aria-labelledby="mockupLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="fotoLabel">Video Mockup</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <form id="form-link-mockup" action="{{url('creation')}}"
                                                          method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="creation_id"
                                                               value="{{$creation->id}}">
                                                    </form>
                                                    <label for="">Link video mockup</label>
                                                    <input form="form-link-mockup" name="link_mockup" type="text"
                                                           class="form-control" placeholder="Masukkan link youtube">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button form="form-link-mockup" type="submit"
                                                            class="btn btn-primary">Simpan Perubahan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="2.5s">
                                    <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
                                    <img src="{{asset('images/kenali/4.png')}}" alt="" class="kenali-logo">
                                    <a href="" class="kenali-title">PROPOSAL</a>
                                    <a href="#" data-toggle="modal" data-target="#dokumen"
                                       class="button-text button-sm">Upload Dokumen <i class="icofont-link-alt"></i></a>
                                    <div class="modal fade" id="dokumen" tabindex="-1" role="dialog"
                                         aria-labelledby="dokumenLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="fotoLabel">Dokumen Proposal</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <form id="form-document-proposal" action="{{url('creation')}}"
                                                          method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="creation_id"
                                                               value="{{$creation->id}}">
                                                    </form>
                                                    <label for="">Dokumen proposal</label>
                                                    <input form="form-document-proposal" name="proposal" type="file"
                                                           accept="application/pdf">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button form="form-document-proposal" type="submit"
                                                            class="btn btn-primary">Simpan Perubahan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="3s">
                                    <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
                                    <img src="{{asset('images/kenali/5.png')}}" alt="" class="kenali-logo">
                                    <a href="" class="kenali-title">POSTER</a>
                                    <a href="#" data-toggle="modal" data-target="#poster" class="button-text button-sm">Upload
                                        Poster <i class="icofont-link-alt"></i></a>
                                    <div class="modal fade" id="poster" tabindex="-1" role="dialog"
                                         aria-labelledby="posterLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="fotoLabel">Foto Poster</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <form id="form-image-poster" action="{{url('creation')}}"
                                                          method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="creation_id"
                                                               value="{{$creation->id}}">
                                                    </form>
                                                    <label for="">Foto poster</label>
                                                    <input form="form-image-poster" name="image_poster" type="file">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button form="form-image-poster" type="submit"
                                                            class="btn btn-primary">Simpan Perubahan
                                                    </button>
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
                                <p><i class="icofont-like"></i> total likes : {{count($creation->product_likers())}}, <i
                                        class="icofont-comment"></i> total komentar : {{$creation->comments->count()}}
                                </p>
                            </div>
                            @forelse ($creation->comments as $komentar)
                                <div class="komen wow fadeInUp" data-wow-delay="1.5s">
                                    <img src="{{asset('images/chat.png')}}" alt="" class="komen-icon">
                                    <div class="komen-content">
                                        <p class="komen-text">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elitumque quos nisi quas
                                            tempore esse veniam.
                                        </p>
                                        <p class="komen-info">
                                            <i class="icofont-user-alt-5"></i> Nama pengirim
                                            &nbsp;&nbsp;
                                            <i class="icofont-calendar"></i> 13 Juni 2020
                                        </p>
                                        <br>
                                        <a href="" class="button-text button-sm button-red">Sembunyikan komentar ini <i
                                                class="icofont-close"></i></a>
                                    </div>
                                </div>
                            @empty
                                Data komentar Kosong
                            @endforelse
                        </div>
                        <div class="col-md-4 wow fadeInUp" data-wow-delay="1.5s">
                            <p class="headingtitle">
                                <i>LIHAT KARYA LAINNYA</i>
                            </p>
                            Data Kosong
                            {{-- <a href="" class="lainnya">
                                <img src="{{asset('images/sample2.png')}}" alt="">
                            </a>
                            <a href="" class="lainnya">
                                <img src="{{asset('images/sample2.png')}}" alt="">
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
