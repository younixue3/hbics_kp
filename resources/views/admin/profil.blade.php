@extends('admin.layout')
@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="overview-wrap">
	            <h2 class="title-1" style="margin-bottom:20px;">Profil / {{Auth::User()->name}}</h2>
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
					<form action="{{url('profils/update')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="_method" value="PATCH">
						<div class="form-group">
							<label for="">Nama</label>
							<input type="text" name="name" class="form-control" required value="{{Auth::User()->name}}">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="mail" name="email" class="form-control" required value="{{Auth::User()->email}}">
						</div>
						<div class="form-group">
							<label for="">Password Lama (Enkripsi)</label>
							<input type="text" class="form-control" disabled value="{{Auth::User()->password}}">
						</div>
						<div class="form-group">
							<label for="">Update Password<span style="opacity:0.5; color:red;"> *isi hanya jika ingin mengganti password</span></label>
							<input type="password" name="password" placeholder="Masukkan Password Baru" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection