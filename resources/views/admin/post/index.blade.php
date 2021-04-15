@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<a style="float:right" href="{{url('posts/create')}}" class="btn btn-primary">+ Tambah data</a>
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
						<thead >
							<tr>
								<th>No</th>
								<th>Foto</th>
								<th>Judul</th>
								<th>Waktu Baca</th>
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
								<td><img style="width:50px;" class="img-responsive" src="{{asset('uploads/posts/'.$data->foto)}}" alt=""></td>
								<td>{{$data->judul}}</td>
								<td>{{$data->waktu}} Menit</td>
								<td>
									<a class="btn btn-sm btn-success" href="{{ url('posts/'.$data->id.'/'.str_replace(' ', '-', $data->judul)) }}"><i class="fas fa-eye"></i></a>
									<a class="btn btn-sm btn-info" href="{{ url('posts/'.$data->id.'/edit') }}"><i class="fas fa-edit"></i></a>
									<a class="btn btn-sm btn-danger" href="{{ url('posts/'.$data->id.'/delete') }}"><i class="fas fa-trash"></i></a>
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