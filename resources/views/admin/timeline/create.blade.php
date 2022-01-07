@extends('admin.layout')
@section('content')
    <div class="row page-content-wrapper">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1" style="margin-bottom:20px;">Tambah Data Timeline</h2>
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
                    <br><br>
                    <table class="table tabledetail">
                        <tr>
                            <td><img src="{{asset('uploads/events/'.$event->logo)}}" style="width: 50px;" alt=""></td>
                            <td>{{$event->tagline}}</td>
                        </tr>
                    </table>
                    <form action="{{ url('timelines/'.$event->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" required placeholder="Masukkan Nama Timeline" class="form-control"
                                   name="nama">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" required placeholder="Masukkan Keterangan Timeline" class="form-control"
                                   name="keterangan">
                        </div>
                        <div class="form-group">
                            <label>Kode Timeline</label>
                            <select name="kode" class="form-control">
                                <option value="-">Tanpa Kode</option>
                                <option value="#01">#01 (Pendaftaran Akun Peserta)</option>
                                <option value="#02">#02 (Submit Karya Peserta)</option>
                                <option value="#03">#03 (Peserta Upload Profile)</option>
                                <option value="#04">#04 (Perjurian Karya Peserta)</option>
                                <option value="#05">#05 (Voting Juara Favorite)</option>
                                <option value="#06">#06 (Virtual Expo Kidspreneurship)</option>
                                <option value="#07">#07 (Pengumuman Pemenang)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" required placeholder="Masukkan Tanggal Mulai"
                                   class="form-control col-md-2" name="tanggal_mulai">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Selesai</label>
                            <input type="date" required placeholder="Masukkan Tanggal Selesai"
                                   class="form-control col-md-2" name="tanggal_selesai">
                        </div>
                        <br>
                        <div class="form-group">
                            <a href="{{url('timelines/'.$event->id)}}" class="btn btn-warning">Batal</a>
                            <input type="submit" value="Posting" class="btn btn-primary" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
