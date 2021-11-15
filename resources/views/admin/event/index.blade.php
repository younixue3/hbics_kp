@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<a style="float:right" href="{{url('events/create')}}" class="btn btn-primary">+ Tambah data</a>
				<h2 class="title-1" style="margin-bottom:20px;">Data Event</h2>
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
								<th>Logo</th>
								<th>Tagline</th>
								<th>Status</th>
								<th>Tanggal dibuat</th>
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
								<td><img style="width:50px;" class="img-responsive" src="{{asset('uploads/events/'.$data->logo)}}" alt=""></td>
								<td>{{ $data->tagline }}</td>
								<td>
									<a href="{{ url('events/'.$data->id.'/status') }}">
									@if($data->status == 1)
										<span class="alert alert-info alert-sm">Aktif</span>
									@elseif($data->status == 0)
										<span class="alert alert-warning alert-sm">Nonaktif</span>
									@endif
									</a>
								</td>
								<td>{{$data->created_at->format('d, M Y')}}</td>
								<td>
									<a class="btn btn-sm btn-success" href="{{ url('events/'.$data->id.'/'.str_Replace(' ', '-', $data->tagline)) }}"><i class="fas fa-eye"></i></a>
									<a class="btn btn-sm btn-info" href="{{ url('events/'.$data->id.'/edit') }}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger" href="{{ url('events/'.$data->id.'/delete') }}"><i class="fas fa-trash"></i></a>
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
