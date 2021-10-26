@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<h2 class="title-1" style="margin-bottom:20px;">Data Visitor</h2>
                <div style="float: right;margin-bottom: 10px;">
                    <form action="{{route('visitor')}}">
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
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="">Hapus</a>
                                            <a class="dropdown-item" href="{{route('show_visitor', $data->id)}}">Edit</a>
                                            <a class="dropdown-item" href="#">Jadikan Admin</a>
                                        </div>
                                    </div>
                                </td>
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
