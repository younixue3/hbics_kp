@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<h2 class="title-1" style="margin-bottom:20px;">Event / Edit</h2>
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
					<form action="{{ url('events/'.$data->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="_method" value="PATCH">
						<div class="form-group">
							<div class="lama">
								logo sebelumnya:
								<img src="{{asset('uploads/events/'.$data->logo)}}" alt="">
							</div>
							<label>Logo baru (Jika ada)</label>
							<input type="file" style="display:block;" name="logo">
						</div>
						<div class="form-group">
							<label>Tagline</label>
							<input type="text" required placeholder="Masukkan Tagline Event" class="form-control" name="tagline" value="{{$data->tagline}}">
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea id="summernote" required placeholder="Tulis Isi Postingan" class="form-control" name="deskripsi">{{$data->deskripsi}}</textarea>
						</div>
						<div class="form-group">
							<label>Status</label>
							<select name="status" class="form-control">
								<option value="1" @if ($data->status == 1)
									selected
								@endif>Aktif</option>
								<option value="0" @if ($data->status == 0)
									selected
								@endif>No-naktif</option>
							</select>
						</div>
						<br>
						<div class="form-group">
							<a href="{{url('events')}}" class="btn btn-warning">Batal</a>
							<input type="submit" value="Update" class="btn btn-primary" name="submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection