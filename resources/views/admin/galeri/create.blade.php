@extends('admin.layout')
@section('content')
    <div class="row page-content-wrapper">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1" style="margin-bottom:20px;">Tambah Data Galeri</h2>
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
                    <form action="{{ url('galeris') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Tahun/ Folder</label>
                            <input type="text" required placeholder="Masukkan Nama Tahun/ Folder" class="form-control"
                                   name="folder">
                        </div>
                        <div class="form-group">
                            <a href="{{url('posts')}}" class="btn btn-warning">Batal</a>
                            <input type="submit" value="Simpan" class="btn btn-primary" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
