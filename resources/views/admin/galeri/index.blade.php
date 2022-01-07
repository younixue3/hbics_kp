@extends('admin.layout')
@section('content')
    <div class="row page-content-wrapper">
        <div class="col-md-12">
            <div class="overview-wrap">
                <a style="float:right" href="{{url('galeris/create')}}" class="btn btn-primary">+ Tambah data</a>
                <h2 class="title-1" style="margin-bottom:20px;">Data Postingan</h2>
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
                    <br>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tahun/ Folder</th>
                            <th>Jumlah Foto</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach($datas as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{$data->folder}}</td>
                                <td>{{$data->fotos->count()}}</td>
                                <td>
                                    <a class="btn btn-sm btn-success"
                                       href="{{ url('galeris/'.$data->id.'/'.str_replace(' ', '-', $data->folder)) }}"><i
                                            class="fas fa-eye"></i></a>
                                    <a class="btn btn-sm btn-info" href="{{ url('galeris/'.$data->id.'/edit') }}"><i
                                            class="fas fa-edit"></i></a>
                                    @if ($data->fotos->count() == 0)
                                        <a class="btn btn-sm btn-danger"
                                           href="{{ url('galeris/'.$data->id.'/delete') }}"><i class="fas fa-trash"></i></a>
                                    @else
                                        <a class="btn btn-sm disabled"><i class="fas fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
