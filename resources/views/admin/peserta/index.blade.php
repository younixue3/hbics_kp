@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<a style="float:right" href="{{url('pesertas/'.$event->id.'/create')}}" class="btn btn-primary">+ Tambah data</a>
				<h2 class="title-1" style="margin-bottom:20px;">Data Peserta</h2>
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
					<a class="btn btn-warning" href="{{url('events/'.$event->id.'/'.str_replace(' ', '-', $event->tagline))}}">Kembali</a>
					<br><br>
					<table class="table tabledetail">
						<tr>
							<td><img src="{{asset('uploads/events/'.$event->logo)}}" style="width: 50px;" alt=""></td>
							<td>{{$event->tagline}}</td>
						</tr>
					</table>
					<table class="table table-striped">
						<thead >
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Tanggal Dibuat</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						@php
							$no = 1;
						@endphp
						@foreach($event->karyas as $data)									
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $data->user->name }}</td>
								<td>{{ $data->user->email }}</td>
								<td>{{ $data->created_at}}</td>
								<td>
									<a class="btn btn-sm btn-success" href="{{ url('pesertas/'.$data->event_id.'/'.$data->user->id.'/'.str_replace([' ', '.'], '-', $data->user->name)) }}"><i class="fas fa-eye"></i></a>
									<a class="btn btn-sm btn-info" href="{{ url('pesertas/'.$data->event_id.'/'.$data->user->id.'/edit') }}"><i class="fas fa-edit"></i></a>
									<a class="btn btn-sm btn-danger" href="{{ url('pesertas/'.$data->id.'/delete') }}"><i class="fas fa-trash"></i></a>
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