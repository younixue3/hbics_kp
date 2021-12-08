@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<a style="float:right" href="{{url('juris/'.$event->id.'/create')}}" class="btn btn-primary">+ Tambah data</a>
				<h2 class="title-1" style="margin-bottom:20px;">Data Juri</h2>
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
								<th>Foto</th>
								<th>Nama/ Akun</th>
								<th>Url Profil</th>
								<th>Quote</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						@php
							$no = 1;
						@endphp
						@foreach($juri as $data)
							<tr>
								<td>{{ $no++ }}</td>
								<td><img style="width:50px;" class="img-responsive" src="{{asset('uploads/juris/'.$data->foto)}}" alt=""></td>
								<td>
									{{ $data->nama }}
									<span style="font-size: 12px;opacity: 0.5;">
										<br>
										{{ $data->email }}
									</span>
								</td>
								<td>
									<a href="{{$data->url_profil}}" target="_blank">{{$data->url_profil}}</a>
								</td>
								<td>{{strip_tags($data->quote)}}</td>
								<td>
									<a class="btn btn-sm btn-success" href="{{ url('juris/'.$data->event_id.'/'.$data->id.'/show')}}"><i class="fas fa-eye"></i></a>
									<a class="btn btn-sm btn-info" href="{{ url('juris/'.$data->event_id.'/'.$data->id.'/edit') }}"><i class="fas fa-edit"></i></a>
									<a class="btn btn-sm btn-danger" href="{{ url('juris/'.$data->event_id.'/'.$data->id.'/delete') }}"><i class="fas fa-trash"></i></a>
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
