@extends('admin.layout')
@section('content')
    <div class="row page-content-wrapper">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1" style="margin-bottom:20px;">Juri / Edit</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body card-block">
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
                    @endif
                    <table class="table tabledetail">
                        <tr>
                            <td><img src="{{asset('uploads/events/'.$data->event->logo)}}" style="width: 50px;" alt="">
                            </td>
                            <td>{{$data->event->tagline}}</td>
                        </tr>
                    </table>
                    <br>
                    <form action="{{ url('juris/'.$data->event_id.'/'.$data->id) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-group">
                            <div class="lama">
                                foto sebelumnya:
                                <img src="{{asset('uploads/juris/'.$data->foto)}}" alt="">
                            </div>
                            <label>Foto baru (Jika ada)</label>
                            <input type="file" style="display:block;" name="foto">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" required placeholder="Masukkan Nama Event" class="form-control"
                                   name="nama" value="{{$data->nama}}">
                        </div>
                        <div class="form-group">
                            <label>Url Profil (Youtube)</label>
                            <textarea id="summernote" required placeholder="Tulis Isi Postingan" class="form-control"
                                      name="url_profil">{{$data->url_profil}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Quote</label>
                            <textarea id="summernote" required placeholder="Tulis Quote" class="form-control"
                                      name="quote">{{$data->quote}}</textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <a href="{{url('juris/'.$data->event_id)}}" class="btn btn-warning">Batal</a>
                            <input type="submit" value="Update" class="btn btn-primary" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
