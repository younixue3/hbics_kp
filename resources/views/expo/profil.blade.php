@extends('layouts.layout-expo')
@section('content')

    <div class="container-fluid">
      <div class="row frame frame2">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="status">
                  <p class="status-text"><span class="status-grey"><i class="icofont-ui-calendar"></i> Waktu pengisian profil :</span> <span class="status-blue"></span></p>
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
                        Foto Tim
                        <span class="alert alert-xs">
                            {!!$user->foto_profile == null ? '<i class="icofont-close-circled text-danger"></i>' : '<i class="icofont-checked text-success"></i>'!!}
                        </span>,
                        Foto Poster
                        <span class="alert alert-xs">
                            @if($karya == null)
                                <i class="icofont-close-circled text-danger"></i>
                            @else
                                {!! $karya->foto_poster == null ? '<i class="icofont-close-circled text-danger"></i>' : '<i class="icofont-checked text-success"></i>' !!}
                            @endif
                        </span>,
                        Tentang Tim
                        <span class="alert alert-xs">
{{--                            {{dd($user->desc == null)}}--}}
                            {!!$user->desc == null ? '<i class="icofont-close-circled text-danger"></i>' : '<i class="icofont-checked text-success"></i>'!!}
                        </span>,
                        Nama Produk
                        <span class="alert alert-xs">
                            @if($karya == null)
                                <i class="icofont-close-circled text-danger"></i>
                            @else
                                {!! $karya->nama == null ? '<i class="icofont-close-circled text-danger"></i>' : '<i class="icofont-checked text-success"></i>' !!}
                            @endif
                        </span>,
                        Deskripsi
                        <span class="alert alert-xs">
                            @if($karya == null)
                                <i class="icofont-close-circled text-danger"></i>
                            @else
                                {!! $karya->deskripsi == null ? '<i class="icofont-close-circled text-danger"></i>' : '<i class="icofont-checked text-success"></i>' !!}
                            @endif
                        </span>,
                        Link Profil
                        <span class="alert alert-xs">
                            @if($karya == null)
                                <i class="icofont-close-circled text-danger"></i>
                            @else
                                {!! $karya->link_profil == null ? '<i class="icofont-close-circled text-danger"></i>' : '<i class="icofont-checked text-success"></i>' !!}
                            @endif
                        </span>,
                        Link Presentasi
                        <span class="alert alert-xs">
                            @if($karya == null)
                                <i class="icofont-close-circled text-danger"></i>
                            @else
                                {!! $karya->link_presentation == null ? '<i class="icofont-close-circled text-danger"></i>' : '<i class="icofont-checked text-success"></i>' !!}
                            @endif
                        </span>,
                        Link Mockup
                        <span class="alert alert-xs">
                            @if($karya == null)
                                <i class="icofont-close-circled text-danger"></i>
                            @else
                                {!! $karya->link_mockup == null ? '<i class="icofont-close-circled text-danger"></i>' : '<i class="icofont-checked text-success"></i>' !!}
                            @endif
                        </span>,
                        Proposal
                        <span class="alert alert-xs">
                            @if($karya == null)
                                <i class="icofont-close-circled text-danger"></i>
                            @else
                                {!! $karya->proposal == null ? '<i class="icofont-close-circled text-danger"></i>' : '<i class="icofont-checked text-success"></i>' !!}
                            @endif
                        </span>
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
                      <form action="{{route('profil_update')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                        <label class="mt10">
                              <i style="color: green" class="icofont-check-circled"></i>
                          Nama Tim</label>
                        <input type="text" name="nama_tim" class="form-control2" placeholder="Masukkan nama tim" disabled value="{{Auth::user()->name}}">
                        <label class="mt10">
                              <i style="color: green" class="icofont-check-circled"></i>
                          Foto Tim
                            <a style="color: rgb(41, 91, 228)" href="" data-lightbox="foto_poster" data-title="">Lihat foto saat ini <i class="icofont-image"></i></a>
                        </label>
                        <input type="file" name="foto_profile" class="form-control2" placeholder="Masukkan foto tim">
                        <label class="mt10" id="tentangkamiLabel">
                              <i style="color: green" class="icofont-check-circled"></i>
                          Tentang Tim (sisa <span id="word_count_tentangkami"></span> karakter)</label>
                        <textarea id="textarea_tentangkami" name="desc" maxlength="360" rows="10" placeholder="Masukkan deskripsi 'tentang tim'" class="form-control2">{{Auth::User()->desc}}</textarea>
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
                      <form action="{{route('karya_insert')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label class="mt10">
                            <i style="color: green" class="icofont-check-circled"></i>
                          Nama Produk</label>
                        <input type="text" name="nama" class="form-control2" placeholder="Masukkan nama produk" value="{{$karya == null ? '' : $karya->nama}}">
                          <div class="row">
                              <div class="col-md-6">
                                  <label class="mt10">
                                      <i style="color: green" class="icofont-check-circled"></i>
                                      Kategori</label>
                                  <select name="kategori" class="form-control2" style="padding-top: 5px !important; height:50px; padding-bottom:3px;">
                                      <option value="" selected disabled>Pilih Kategori</option>
                                      @if( $karya != null)
                                          @foreach($kategori_lomba as $key => $value)
                                              <option {{$value->id == $karya->kategori ? 'selected' : ''}} value="{{$value->id}}">{{$value->kategori}}</option>
                                          @endforeach
                                      @else
                                          @foreach($kategori_lomba as $key => $value)
                                              <option value="{{$value->id}}">{{$value->kategori}}</option>
                                          @endforeach
                                      @endif
                                  </select>
                              </div>
                          </div>
                        <label class="mt10">
                            <i style="color: green" class="icofont-check-circled"></i>
                          Deskripsi Produk (sisa <span id="word_count_deskripsi"></span> karakter)</label>
                        <textarea id="textarea_deskripsi" name="deskripsi" maxlength="350" rows="10" placeholder="Masukkan deskripsi 'produk'" class="form-control2">{{$karya == null ? '' : $karya->deskripsi}}</textarea>
                        <div class="row">
                          <div class="col-md-6">
                            <label class="mt10">
                                <i style="color: green" class="icofont-check-circled"></i>
                              Proposal
                                <a style="color: rgb(41, 91, 228)" href="" target="_blank">Lihat proposal saat ini <i class="icofont-file"></i></a>
                            </label>
                            <input type="file" name="proposal" class="form-control2">
                          </div>
                          <div class="col-md-6">
                            <label class="mt10">
                                <i style="color: green" class="icofont-check-circled"></i>
                              Foto Poster
                                <a style="color: rgb(41, 91, 228)" href="" data-lightbox="foto_poster" data-title="">Lihat foto saat ini <i class="icofont-image"></i></a>
                            </label>
                            <input type="file" name="foto_poster" class="form-control2">
                          </div>
                        </div>
                        <label class="mt10">
                            <i style="color: green" class="icofont-check-circled"></i>
                          Link Profil</label>
                        <input type="text" name="link_profil" placeholder="Masukkan Link Profil" class="form-control2" value="{{$karya == null ? '' : $karya->link_profil}}">
                        <label class="mt10">
                            <i style="color: green" class="icofont-check-circled"></i>
                          Link Presentasi</label>
                        <input type="text" name="link_presentation" placeholder="Masukkan Link presentation" class="form-control2" value="{{$karya == null ? '' : $karya->link_presentation}}">
                        <label class="mt10">
                            <i style="color: green" class="icofont-check-circled"></i>
                          Link Mockup</label>
                        <input type="text" name="link_mockup" placeholder="Masukkan Link mockup" class="form-control2" value="{{$karya == null ? '' : $karya->link_mockup}}">
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
                        <h4><i class="icofont-image"></i> Data Foto Produk</h4>
                        <form action="{{route('foto_karya_insert')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <label class="mt10">Foto Produk <span ></span></label>
                          <input type="file" required name="foto_karya" class="form-control2">
                          <br><br>
                          <button type="submit" class="btn btn-primary">Upload Foto</button>
                        </form>
                    </div>
                  </div>
                  <div class="row">
                    <div class="gal">
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
