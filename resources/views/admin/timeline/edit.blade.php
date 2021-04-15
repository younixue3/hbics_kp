@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<h2 class="title-1" style="margin-bottom:20px;">Timeline / Edit</h2>
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
					<form action="{{ url('timelines/'.$data->event_id.'/'.$data->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="_method" value="PATCH">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" required placeholder="Masukkan Nama Timeline" class="form-control" name="nama" value="{{$data->nama}}">
						</div>
						<div class="form-group">
							<label>Keterangan</label>
							<input type="text" required placeholder="Masukkan Keterangan Timeline" class="form-control" name="keterangan" value="{{$data->keterangan}}">
						</div>
						<div class="form-group">
							<label>Kode Timeline</label>
							<select name="kode" class="form-control">
								<option @if($data->kode == '-') selected @endif value="-">Tanpa Kode</option>
								<option @if($data->kode == '#01') selected @endif value="#01">#01 (Pendaftaran Akun Peserta)</option>
								<option @if($data->kode == '#02') selected @endif value="#02">#02 (Submit Karya Peserta)</option>
								<option @if($data->kode == '#03') selected @endif value="#03">#03 (Peserta Upload Profile)</option>
								<option @if($data->kode == '#04') selected @endif value="#04">#04 (Perjurian Karya Peserta)</option>
								<option @if($data->kode == '#05') selected @endif value="#05">#05 (Voting Juara Favorite)</option>
								<option @if($data->kode == '#06') selected @endif value="#06">#06 (Virtual Expo Kidspreneurship)</option>
								<option @if($data->kode == '#07') selected @endif value="#07">#07 (Pengumuman Pemenang)</option>
							</select>
						</div>
						<div class="form-group">
							<label>Tanggal Mulai</label>
							<input type="date" required value="{{$data->tanggal_mulai->format('Y-m-d')}}" placeholder="Masukkan Tanggal Mulai" class="form-control col-md-2" name="tanggal_mulai">
						</div>
						<div class="form-group">
							<label>Tanggal Mulai</label>
							<input type="date" required value="{{$data->tanggal_selesai->format('Y-m-d')}}" placeholder="Masukkan Tanggal Selesai" class="form-control col-md-2" name="tanggal_selesai">
						</div>
						<br>
						<div class="form-group">
							<a href="{{url('juris/'.$data->event_id)}}" class="btn btn-warning">Batal</a>
							<input type="submit" value="Update" class="btn btn-primary" name="submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection