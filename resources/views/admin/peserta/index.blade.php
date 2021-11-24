@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				@if ($event->pendaftaran)
					<a style="float:right" href="{{url('pesertas/'.$event->id.'/create')}}" class="btn btn-primary">+ Tambah data</a>
				@else
					<a style="float:right" href="#" class="btn btn-default">Bukan fase pendaftaran</a>
				@endif
				<h2 class="title-1" style="margin-bottom:20px;">Data Peserta ({{$jumlah}})</h2>
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
						@foreach($karyas as $key => $data)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ $data->name }}</td>
								<td>{{ $data->email }}</td>
								<td>{{ $data->created_at->format('d, M Y - h:i:s')}}</td>
								<td>
									<a class="btn btn-sm btn-success" href="{{ url('pesertas/'.$data->event_id.'/'.$data->id.'/'.str_replace([' ', '.'], '-', $data->name)) }}"><i class="fas fa-eye"></i></a>
									<a class="btn btn-sm btn-info" href="{{ url('pesertas/'.$data->event_id.'/'.$data->id.'/edit') }}"><i class="fas fa-edit"></i></a>
									<a class="btn btn-sm btn-danger" href="{{ url('pesertas/'.$data->event_id.'/'.$data->id.'/delete') }}"><i class="fas fa-trash"></i></a>
								</td>
							</tr>
							<tr>
								<td colspan="5" style="font-size: 12px; color: grey;">
									Jenjang
									<span class="alert alert-xs @if($data->jenjang == '') alert-danger @else alert-success @endif">
										@if($data->jenjang == '')
											<i class="icofont-close-circled"></i>
										@else
											<i class="icofont-checked"></i>
										@endif
									</span>,
									Kategori
									<span class="alert alert-xs @if($data->kategori == '') alert-danger @else alert-success @endif">
										@if($data->kategori == '')
											<i class="icofont-close-circled"></i>
										@else
											<i class="icofont-checked"></i>
										@endif
									</span>,
									Foto Tim
									<span class="alert alert-xs @if($data->foto_tim == '') alert-danger @else alert-success @endif">
										@if($data->foto_tim == '')
											<i class="icofont-close-circled"></i>
										@else
											<i class="icofont-checked"></i>
										@endif
									</span>,
									Foto Poster
									<span class="alert alert-xs @if($data->foto_poster == '') alert-danger @else alert-success @endif">
										@if($data->foto_poster == '')
											<i class="icofont-close-circled"></i>
										@else
											<i class="icofont-checked"></i>
										@endif
									</span>,
									Tentang Tim
									<span class="alert alert-xs @if($data->tentang_tim == '') alert-danger @else alert-success @endif">
										@if($data->tentang_tim == '')
											<i class="icofont-close-circled"></i>
										@else
											<i class="icofont-checked"></i>
										@endif
									</span>,
									Nama
									<span class="alert alert-xs @if($data->nama == '') alert-danger @else alert-success @endif">
										@if($data->nama == '')
											<i class="icofont-close-circled"></i>
										@else
											<i class="icofont-checked"></i>
										@endif
									</span>,
									Deskripsi
									<span class="alert alert-xs @if($data->deskripsi == '') alert-danger @else alert-success @endif">
										@if($data->deskripsi == '')
											<i class="icofont-close-circled"></i>
										@else
											<i class="icofont-checked"></i>
										@endif
									</span>,
									Link Profil
									<span class="alert alert-xs @if($data->link_profil == '') alert-danger @else alert-success @endif">
										@if($data->link_profil == '')
											<i class="icofont-close-circled"></i>
										@else
											<i class="icofont-checked"></i>
										@endif
									</span>,
									Link Presentasi
									<span class="alert alert-xs @if($data->link_presentation == '') alert-danger @else alert-success @endif">
										@if($data->link_presentation == '')
											<i class="icofont-close-circled"></i>
										@else
											<i class="icofont-checked"></i>
										@endif
									</span>,
									Link Mockup
									<span class="alert alert-xs @if($data->link_mockup == '') alert-danger @else alert-success @endif">
										@if($data->link_mockup == '')
											<i class="icofont-close-circled"></i>
										@else
											<i class="icofont-checked"></i>
										@endif
									</span>,
									Proposal
									<span class="alert alert-xs @if($data->proposal == '') alert-danger @else alert-success @endif">
										@if($data->proposal == '')
											<i class="icofont-close-circled"></i>
										@else
											<i class="icofont-checked"></i>
										@endif
									</span>.
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					{{$karyas->links()}}
				</div>
			</div>
		</div>
	</div>
@endsection
