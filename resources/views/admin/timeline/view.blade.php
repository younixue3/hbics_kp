@extends('admin.layout')
@section('content')
    <div class="row page-content-wrapper">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1" style="margin-bottom:20px;">Detail Data Event</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body card-block">
                    <a class="btn btn-warning"
                       href="{{url('timelines/'.$data->event_id.'/'.str_replace(' ', '-', $data->tagline))}}">Kembali</a>
                    <br><br>
                    <table class="table tabledetail">
                        <tr>
                            <td><img src="{{asset('uploads/events/'.$data->event->logo)}}" style="width: 50px;" alt="">
                            </td>
                            <td>{{$data->event->tagline}}</td>
                        </tr>
                    </table>
                    <table class="table tabledetail">
                        <tr>
                            <th>Nama Timeline</th>
                            <td>{{$data->nama}}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{$data->keterangan}}</td>
                        </tr>
                        <tr>
                            <th>Kode</th>
                            <td>{{$data->kode}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Mulai</th>
                            <td>{{$data->tanggal_mulai->format('d, M Y')}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Selesai</th>
                            <td>{{$data->tanggal_selesai->format('d, M Y')}}</td>
                        </tr>
                    </table>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection
