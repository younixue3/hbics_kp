@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<a style="float:right" href="{{url('post/create')}}" class="btn btn-primary">+ Tambah data</a>
				<h2 class="title-1" style="margin-bottom:20px;">Data Postingan</h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body card-block">
					@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
					@endif
					<br>
					<table class="table table-striped">
						<thead >
							<tr>
								<th>No</th>
								<th>Foto</th>
								<th>Jenis</th>
								<th>Judul</th>
								<th>View</th>
								<th>Status</th>
								<th>Tanggal</th>
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
								<td><img style="width:100px;height:70px;" class="img-responsive" src="{{asset('uploads/'.$data->foto)}}" alt=""></td>
								<td>{{ $data->jenis }}</td>
								<td>
									{{ Str::limit($data->judul, '30') }}
								</td>
								<td>{{ $data->view }}</td>
								<td>
									<a href="{{ url('post/'.$data->id.'/unpublish') }}">
									@if($data->status == 0)
										<span class="alert alert-info warning-sm">Dipublish</span>
									@elseif($data->status == 1)
										<span class="alert alert-warning warning-sm">Dibatalkan</span>
									@endif
									</a>
								</td>
								<td>{{ $data->created_at->format('d, M Y') }}</td>
								<td>
									<a class="btn btn-sm btn-success" href="{{ url('post/'.$data->id) }}"><i class="fas fa-eye"></i></a>
									<a class="btn btn-sm btn-info" href="{{ url('post/'.$data->id.'/edit') }}"><i class="fas fa-edit"></i></a>
									<a class="btn btn-sm btn-danger" href="{{ url('post/'.$data->id.'/delete') }}"><i class="fas fa-trash"></i></a>									
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					{!! $datas->links() !!}
				</div>
			</div>
		</div>
	</div>
@endsection