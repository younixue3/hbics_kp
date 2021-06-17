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
                      <i class="icofont-people"></i> {{$karya->nama_tim}}
                    </p>
                    <br>
                    <p class="apaitu-title wow fadeInUp" data-wow-delay="1.5s" style="margin-bottom:0px;">
                        TENTANG KAMI
                    </p>
                    <p class="namateam wow fadeInUp" data-wow-delay="2s">
                      <i class="icofont-check wow fadeInUp" data-wow-delay="2s"></i> Jenjang : {{strToUpper($karya->jenjang)}}, Kategori: {{$karya->kategori}}
                    </p>   
                    <br>  
                    <p class="apaitu-text wow fadeInUp" data-wow-delay="2.5s">
                        {{$karya->tentang_tim}}
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
      </div>
    </div>
  </div>
</div>
<div class="container-fluid wow fadeInUp" data-wow-delay="1s">
<div class="row frame4 text-center" style="position: relative">
  <div class="row owl-carousel owl-theme" style="margin: 0px;">
    @forelse ($karya->fotos as $foto)
    <div class="item">
      <div class="slide">
        <img src="{{asset('uploads/karyafotos/'.$foto->foto)}}" class="slide-image" alt="">
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
            </div>
            <div class="kenali-frame text-center wow fadeInUp" data-wow-delay="3s">
              <img src="{{asset('images/gif/1.gif')}}" alt="" class="kenali-gif">
              <a href="" data-toggle="modal" data-target="#c-poster"><img src="{{asset('images/kenali/5.png')}}" alt="" class="kenali-logo"></a>
              <a href="" data-toggle="modal" data-target="#c-poster" class="kenali-title">POSTER @if($karya->foto_poster != '') <i class="icofont-check" style="color: rgb(15, 177, 15); position:absolute;"></i> @endif</a>
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
                    <p><i class="icofont-like"></i> total likes : {{$karya->likers->count()}}</p>
                </div>
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