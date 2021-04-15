@extends('admin.layout')
@section('content')
	<div class="row page-content-wrapper">
		<div class="col-md-12">
			<div class="overview-wrap">
				<h2 class="title-1" style="margin-bottom:20px;">Detail Data Event</h2>
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
							<th>Tagline</th>
							<td>{{$data->tagline}}</td>
						</tr>
						<tr>
							<th>Logo</th>
							<td><img src="{{asset('uploads/events/'.$data->logo)}}" style="width: 50px;" alt=""></td>
						</tr>
						<tr>
							<th>Deskripsi</th>
							<td>{!!$data->deskripsi!!}</td>
						</tr>
						<tr>
							<th>Status</th>
							<td>
								<span href="{{ url('events/'.$data->id.'/status') }}">
									@if($data->status == 1)
										<span class="alert alert-info alert-sm">Aktif</span>
									@elseif($data->status == 0)
										<span class="alert alert-warning alert-sm">Nonaktif</span>
									@endif
								</span>
							</td>
						</tr>
						<tr>
							<th>Jumlah Juri</th>
							<td>0 Juri
								<br>
								<a href="">+ kelola data juri</a>
							</td>
						</tr>
						<tr>
							<th>Jumlah Peserta</th>
							<td>0 Peserta
								<br>
								<a href="">+ kelola data peserta</a>
							</td>
						</tr>
					</table>
					<hr>
					<a class="btn btn-warning" href="{{url('events')}}">Kembali</a>
				</div>
			</div>
		</div>
	</div>
@endsection