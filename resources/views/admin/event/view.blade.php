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
					<a class="btn btn-warning" href="{{url('events')}}">Kembali</a>
					<br><br>
					<table class="table tabledetail">
						<tr>
							<th>Logo</th>
							<td><img src="{{asset('uploads/events/'.$data->logo)}}" style="width: 50px;" alt=""></td>
						</tr>
						<tr>
							<th>Tagline</th>
							<td>{{$data->tagline}}</td>
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
							<th>Timeline</th>
							<td>
								<a href="{{url('timelines/'.$data->id)}}"><i class="icofont-rounded-right"></i> {{$data->timelines->count()}} Timeline</a>
							</td>
						</tr>
						<tr>
							<th>Juri</th>
							<td>
								<a href="{{url('juris/'.$data->id)}}"><i class="icofont-rounded-right"></i> {{$data->juris->count()}} Juri</a>
							</td>
						</tr>
						<tr>
							<th>Karya/ Peserta</th>
							<td>
								<a href="{{url('pesertas/'.$data->id)}}"><i class="icofont-rounded-right"></i> {{$data->karyas->count()}} Peserta</a>
							</td>
						</tr>
						<tr>
							<th>Sponsor</th>
							<td>
								<a href="{{url('sponsors/'.$data->id)}}"><i class="icofont-rounded-right"></i> {{$data->sponsors->count()}} Sponsor</a>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection