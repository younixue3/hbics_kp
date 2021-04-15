@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<h2 class="title-1" style="margin-bottom:20px;">Preview data postingan</h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body card-block">
				<div class="col-md-12 pdless"><img src="{{ asset('uploads/'.$data->foto) }}" style="max-height:400px;margin:auto;display:block;"></div>	
				<br>
				<div class="col-md-12 pdless"><br><h4>{{ $data->judul }}</h4></div>	
				<br>
				<div class="col-md-12 pdless"><p style="font-size:13px;">{{ $data->created_at->format('d, M Y : h:m') }} - View {{ $data->view }}</p></div>	
				<br>
				<div class="col-md-12 pdless">{!!$data->isi!!}</div>
				<br>
				<br>
          		<a class="btn btn-warning" href="{{url('post')}}">Kembali</a>
				</div>
			</div>
		</div>
	</div>
@endsection