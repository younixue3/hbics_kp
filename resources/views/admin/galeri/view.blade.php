@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<h2 class="title-1" style="margin-bottom:20px;">Detail Data Galeri</h2>
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
							<th>Nama Tahun/ Folder</th>
							<td>{{$data->folder}}</td>
						</tr>
					</table>
					<hr>
					<div class="row">
						@forelse ($data->fotos as $foto)
						<div class="col-md-3">
							<img class="imagegaleri" src="{{asset('uploads/galeris/'.$foto->foto)}}" alt="">
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