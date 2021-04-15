@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<h2 class="title-1" style="margin-bottom:20px;">Galeri / Edit</h2>
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
					<form action="{{ url('fotos/'.$data->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Tambah Foto</label>
							<br>
							<input type="file" required placeholder="Pilih Foto" name="foto">
						</div>
						<div class="form-group">
							<input type="submit" value="Upload" class="btn btn-primary" name="submit">
						</div>
					</form>
					<div class="row">
						@forelse ($data->fotos as $foto)
						<div class="col-md-3">
							<img class="imagegaleri" src="{{asset('uploads/galeris/'.$foto->foto)}}" alt="">
							<a href="{{url('fotos/'.$foto->id.'/delete')}}" class="imagegaleri-delete">Hapus</a>
						</div>
						@empty
						<div class="col-md-12">
							Data Kosong
							<br><br>
						</div>
						@endforelse
					</div>
					<a class="btn btn-warning" href="{{url('galeris')}}">Kembali</a>
				</div>
			</div>
		</div>
	</div>
@endsection