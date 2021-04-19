@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<h2 class="title-1" style="margin-bottom:20px;">Tambah Data Peserta</h2>
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
					<form action="{{ url('pesertas/'.$event->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Nama</label>
							<input type="text" required placeholder="Masukkan Nama Peserta" class="form-control" name="name">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="mail" required placeholder="Masukkan Email Peserta" class="form-control" name="email">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" value="EPIK2K21" required placeholder="Masukkan Password Peserta" class="form-control" name="password">
						</div>
						<br>
						<div class="form-group">
							<a href="{{url('pesertas/'.$event->id)}}" class="btn btn-warning">Batal</a>
							<input type="submit" value="Posting" class="btn btn-primary" name="submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection