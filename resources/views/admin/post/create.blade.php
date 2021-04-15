@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<h2 class="title-1" style="margin-bottom:20px;">Tambah Data Postingan</h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body card-block">
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<form action="{{ url('post') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="view" value="0">
						<input type="hidden" name="status" value="0">
						<div class="form-group">
							<label>Judul</label>
							<input type="text" required placeholder="Masukkan Judul Postingan" class="form-control" name="judul">
						</div>
						<div class="form-group">
							<label>Jenis</label>
							<select name="jenis" class="form-control">
								<option value="Berita">Berita</option>
								<option value="Artikel">Artikel</option>
								<option value="Tips">Tips</option>
							</select>
						</div>
						<div class="form-group">
							<label>Isi</label>
							<textarea id="summernote" required placeholder="Tulis Isi Postingan" class="form-control" name="isi"></textarea>
						</div>
						<div class="form-group">
							<label>Foto</label>
							<input type="file" required style="display:block;" name="foto">
						</div>
						<br>
						<div class="form-group">
							<a href="#" onclick="goBack()" class="btn btn-warning">Batal</a>
							<input type="submit" value="Posting" class="btn btn-primary" name="submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection