@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<h2 class="title-1" style="margin-bottom:20px;">Detail Data Post</h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body card-block">
					<br>
					<table class="table tabledetail">
						<tr>
							<th>Judul</th>
							<td>{{$data->judul}}</td>
						</tr>
						<tr>
							<th>Isi</th>
							<td>{{$data->isi}}</td>
						</tr>
						<tr>
							<th>Waktu (Menit)</th>
							<td>{{$data->waktu}} Menit</td>
						</tr>
						<tr>
							<th>Foto</th>
							<td><img src="{{asset('uploads/posts/'.$data->foto)}}" style="width: 300px;" alt=""></td>
						</tr>
					</table>
					<hr>
					<a class="btn btn-warning" href="{{url('posts')}}">Kembali</a>
				</div>
			</div>
		</div>
	</div>
@endsection