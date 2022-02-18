@extends('admin.layout')
@section('content')
    <div class="row page-content-wrapper">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1" style="margin-bottom:20px;">Data Visitor</h2>
                <div style="float: right;margin-bottom: 10px;">
                    <form action="{{route('visitor')}}">
                        <span>
                            <div>
                                <span>
                                    <input type="radio" value="1" name="filter_lomba" checked>
                                    <label>Kidspreneurship</label>
                                </span>
                                <span>
                                    <input type="radio" value="2" name="filter_lomba">
                                    <label>Lomba Pendukung</label>
                                </span>
                            </div>
                            <label for="cari"><i class="fas fa-search" style="font-size: 18px; margin-right: 5px;"></i></label>
                            <input type="text" name="cari">
                        </span>
                        <span>
                            <input type="submit" value="Cari">
                        </span>
                    </form>
                </div>
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
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal Registrasi</th>
                            <th>Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $key => $data)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->created_at->format('d, M Y - H:i:s')}}</td>
                                <td>
                                    @if($data->pembayaran != 'verified')
                                        <button type="button" class="btn-outline-danger btn" data-toggle="modal"
                                                data-target=".bd-example-modal-lg-{{ $key }}">{{$data->pembayaran}}</button>
                                        <div class="modal fade bd-example-modal-lg-{{ $key }}" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Verifikasi Pembayaran</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="inputEmail4">Nama</label>
                                                                <input type="text" class="form-control"
                                                                       value="{{$data->name}}" disabled>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputPassword4">Email</label>
                                                                <input type="email" class="form-control"
                                                                       value="{{$data->email}}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="my-5">
                                                            <h3 class="text-center">Struk pembayaran</h3>
                                                            <table class="table" style="background-color: #e0e0e0">
                                                                <thead>
                                                                <tr>
                                                                    <th>Jumlah peserta</th>
                                                                    <th></th>
                                                                    <th>Harga satuan</th>
                                                                    <th>Total</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        {{ $data->kategori_peserta == 'individu' ? 1 : $data->anggota->count() }}
                                                                    </td>
                                                                    <td> x</td>
                                                                    <td>
                                                                        Rp. {{ $harga_satuan->find($data->kategori_lp) == null ? number_format(300000) : $harga_satuan->find($data->kategori_lp)->harga }}</td>
                                                                    <td>Rp.
                                                                        @if($data->kategori_peserta == 'individu')
                                                                            @if($harga_satuan->find($data->kategori_lp) == null)
                                                                                {{number_format(300000)}}
                                                                            @else
                                                                                {{ $harga_satuan->find($data->kategori_lp)->harga }}
                                                                            @endif
                                                                        @else
                                                                            @if($harga_satuan->find($data->kategori_lp) == null)
                                                                                {{ number_format(300000) }}
                                                                            @else
                                                                                {{ $harga_satuan->find($data->kategori_lp)->harga }}
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div>
                                                            @if($data->bukti_pembayaran == null)
                                                                <div class="text-center h-50 w-50"
                                                                     style="background-color: #cfcfcf">
                                                                    Bukti Pembayaran Kosong
                                                                </div>
                                                            @else

                                                                <img class="h-50 w-50" style="object-fit: cover;"
                                                                     src="{{asset('Upload/paidbill/'.$data->bukti_pembayaran)}}">
                                                            @endif
                                                        </div>
                                                        @if($data->event_id == 2)
                                                        @else
                                                        @endif
                                                        <div>
                                                            @if($data->event_id == 2)
                                                                <h3>Bukti Akte</h3>
                                                                @if($data->bukti_pembayaran == null)
                                                                    <div class="text-center h-50 w-50"
                                                                         style="background-color: #cfcfcf">
                                                                        Bukti Akte Kosong
                                                                    </div>
                                                                @else

                                                                    <img class="h-50 w-50" style="object-fit: cover;"
                                                                         src="{{asset('Upload/buktiakte/'.$data->bukti_akte)}}">
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a type="button" class="btn btn-primary"
                                                           href="{{route('peserta/verifikasi', $data->id)}}">Verifikasi</a>
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <button type="button"
                                                class="btn-outline-primary btn">{{$data->pembayaran}}</button>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu" style="padding: 0; margin-top: 5px !important;"
                                             aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item bg-danger text-white"
                                               href="{{route('delete_visitor', $data->id)}}">Hapus</a>
                                            <a class="dropdown-item bg-warning text-white"
                                               href="{{route('show_visitor', $data->id)}}">Edit</a>
{{--                                            {{$data->karya}}--}}
                                            @if($data->karya == null)
                                                @else
                                                @if($data->karya->proposal == null)
                                                    @else
                                                    <a class="dropdown-item bg-warning text-white"
                                                       href="{{ $data->karya != null ? asset('Upload/proposal/' . $data->karya->proposal) : '#'}}" target="{{ $data->karya != null ? '_blank' : ''}}">Lihat Proposal</a>
                                                @endif
                                                    @if($data->karya->naskah == null)
                                                    @else
                                                        <a class="dropdown-item bg-warning text-white"
                                                           href="{{ $data->karya != null ? asset('Upload/naskah/' . $data->karya->naskah) : '#'}}" target="{{ $data->karya != null ? '_blank' : ''}}">Lihat Naskah</a>
                                                    @endif
                                            @endif
                                            @if(Auth::User()->role == 'superadmin')
                                                <a class="dropdown-item bg-primary text-white"
                                                   href="{{route('change_role_pengunjung', $data->id)}}?admin=1">Jadikan
                                                    Admin KP</a>
                                                <a class="dropdown-item bg-primary text-white"
                                                   href="{{route('change_role_pengunjung', $data->id)}}?admin=2">Jadikan
                                                    Admin LP</a>
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$datas->appends(request()->all())->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.exampleCheck1').checked(function () {
            console.log('clicked')
        })
    </script>
@endsection
