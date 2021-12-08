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
					<form action="{{ url('juris/'.$event->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="event_id" value="0">
						<div class="form-group">
							<label>Foto</label>
							<input type="file" required style="display:block;" name="foto">
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" required placeholder="Masukkan Nama Juri" class="form-control" name="nama">
						</div>
						<div class="form-group">
							<label>Url Profil (Youtube)</label>
							<input type="text" required placeholder="Masukkan Url Profil" class="form-control" name="url_profil">
						</div>
						<div class="form-group">
							<label>Quote</label>
							<textarea id="summernote" required placeholder="Tulis Quote" class="form-control" name="quote"></textarea>
						</div>
						<br>
						<div class="form-group">
							<a href="{{url('juris/'.$event->id)}}" class="btn btn-warning">Batal</a>
							<input type="submit" value="Posting" class="btn btn-primary" name="submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
