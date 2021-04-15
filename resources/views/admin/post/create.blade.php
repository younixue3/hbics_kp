@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<h2 class="title-1" style="margin-bottom:20px;">Tambah Data Event</h2>
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
					<form action="{{ url('posts') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Foto</label>
							<input type="file" required style="display:block;" name="foto">
						</div>
						<div class="form-group">
							<label>Judul</label>
							<input type="text" required placeholder="Masukkan Judul Postingan" class="form-control" name="judul">
						</div>
						<div class="form-group">
							<label>Waktu Baca (Menit)</label>
							<input type="number" required placeholder="Masukkan Waktu Baca Postingan" class="form-control" name="waktu">
						</div>
						<div class="form-group">
							<label>Isi</label>
							<textarea id="summernote" required placeholder="Tulis Isi Postingan" class="form-control" name="isi"></textarea>
						</div>
						<br>
						<div class="form-group">
							<a href="{{url('posts')}}" class="btn btn-warning">Batal</a>
							<input type="submit" value="Posting" class="btn btn-primary" name="submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection