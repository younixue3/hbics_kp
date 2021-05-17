@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<h2 class="title-1" style="margin-bottom:20px;">Sponsor / Edit</h2>
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
					<table class="table tabledetail">
						<tr>
							<td><img src="{{asset('uploads/events/'.$data->event->logo)}}" style="width: 50px;" alt=""></td>
							<td>{{$data->event->tagline}}</td>
						</tr>
					</table>
					<br>
					<form action="{{ url('sponsors/'.$data->event_id.'/'.$data->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="_method" value="PATCH">
						<div class="form-group">
							<div class="lama">
								logo sebelumnya:
								<img src="{{asset('uploads/sponsors/'.$data->logo)}}" alt="">
							</div>
							<label>Logo baru (Jika ada)</label>
							<input type="file" style="display:block;" name="logo">
						</div>
						<div class="form-group">
							<label>Keterangan</label>
							<textarea id="summernote" required placeholder="Tulis Keterangan" class="form-control" name="keterangan">{{$data->keterangan}}</textarea>
						</div>
						<br>
						<div class="form-group">
							<a href="{{url('sponsors/'.$data->event_id)}}" class="btn btn-warning">Batal</a>
							<input type="submit" value="Update" class="btn btn-primary" name="submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection