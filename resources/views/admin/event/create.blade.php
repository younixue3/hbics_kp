@extends('admin.layout')
@section('content')
    <div class="row page-content-wrapper">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1" style="margin-bottom:20px;">Tambah Data Event</h2>
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
                    <form action="{{ url('events') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Logo</label>
                            <input type="file" required style="display:block;" name="logo">
                        </div>
                        <div class="form-group">
                            <label>Tagline</label>
                            <input type="text" required placeholder="Masukkan Tagline Event" class="form-control"
                                   name="tagline">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea id="summernote" required placeholder="Tulis Isi Postingan" class="form-control"
                                      name="deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="1" selected>Aktif</option>
                                <option value="0">No-naktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <a href="{{url('events')}}" class="btn btn-warning">Batal</a>
                            <input type="submit" value="Simpan" class="btn btn-primary" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
