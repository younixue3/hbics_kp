@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<h2 class="title-1" style="margin-bottom:20px;">Berita / Edit</h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body card-block">
					<form action="{{ url('post/'.$data->id) }}" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_method" value="PATCH">
						@csrf
						<div class="form-group">
							<input type="hidden" name="view" value="{{$data->view}}">
							<input type="hidden" name="jenis" value="{{$data->jenis}}">
						</div>
						<div class="form-group">
							<label>Judul</label>
							<input type="text" placeholder="Masukkan Judul Berita" value="{{ $data->judul }}" class="form-control" name="judul">
						</div>
						<div class="form-group">
							<label>Jenis</label>
							<select name="jenis" class="form-control">
								<option @if($data->jenis == 'Berita') selected @endif value="Berita">Berita</option>
								<option @if($data->jenis == 'Artikel') selected @endif value="Artikel">Artikel</option>
								<option @if($data->jenis == 'Tips') selected @endif value="Tips">Tips</option>
							</select>
						</div>
						<div class="form-group">
							<label>Isi</label>
							<textarea id="summernote" class="form-control" name="isi">{{ $data->isi }}</textarea>
						</div>
						<div class="file-lama">
							<img src="{{ asset('uploads/'.$data->foto) }}" width="300px;" class="text-center" alt="">
						</div>
						<div class="form-group">
							<label>Foto Baru *opsional</label>
							<input type="file" style="display:block;" name="foto">
						</div>
						<br>
						<div class="form-group">
							<a href="{{url('post')}}" class="btn btn-warning">Batal</a>
							<input type="submit" value="Update" class="btn btn-primary" name="submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection