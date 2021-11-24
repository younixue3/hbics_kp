@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<h2 class="title-1" style="margin-bottom:20px;">Data Visitor</h2>
                <div style="float: right;margin-bottom: 10px;">
                    <form action="{{route('panitia')}}">
                        <span>
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
						<thead >
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Tanggal Registrasi</th>
                                @if(Auth::User()->role == 'superadmin')
                                    <th>Aksi</th>
                                @else
                                @endif
							</tr>
						</thead>
						<tbody>
						@foreach($datas as $key => $data)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ $data->name }}</td>
								<td>{{ $data->email }}</td>
								<td>{{ $data->created_at->format('d, M Y - H:i:s')}}</td>
                                @if(Auth::User()->role == 'superadmin')
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu" style="padding: 0; margin-top: 5px !important;" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item bg-danger text-white" href="{{route('delete_panitia', $data->id)}}">Hapus</a>
                                                <a class="dropdown-item bg-warning text-white" href="{{route('show_panitia', $data->id)}}">Edit</a>
                                                <a class="dropdown-item bg-primary text-white" href="{{route('change_role_panitia', $data->id)}}">Jadikan Pengunjung</a>
                                            </div>
                                        </div>
                                    </td>
                                @else
                                    @endif
							</tr>
						@endforeach
						</tbody>
					</table>
					{{$datas->links()}}
				</div>
			</div>
		</div>
	</div>
@endsection
