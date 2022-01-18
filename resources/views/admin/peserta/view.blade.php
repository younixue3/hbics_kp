@extends('admin.layout')
@section('content')
    <div class="row page-content-wrapper">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1" style="margin-bottom:20px;">Detail Data Peserta</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body card-block">
                    <a class="btn btn-warning" href="{{url('pesertas/'.$event_id)}}">Kembali</a>
                    <br><br>
                    <table class="table tabledetail">
                        <tr>
{{--                            {{dd($data->kategori_lp)}}--}}
{{--                            {{asset('uploads/events/'.$data->karya->event->logo)}}--}}
                            <td><img src="{{$data->kategori_lp == null ? asset('uploads/events/'.\App\Event::find(1)->logo) : asset('uploads/events/'.\App\Event::find(2)->logo) }}" style="width: 50px;"
                                     alt=""></td>
                            <td>{{$data->karya->event->tagline}}</td>
                        </tr>
                    </table>
                    <br>
                    <table class="table tabledetail">
                        <tr>
                            <th>Nama</th>
                            <td>{{$data->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$data->email}}</td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td>{{$data->password}}</td>
                        </tr>
                        <tr>
                            <th colspan="2">KARYA :</th>
                        </tr>
                        <tr>
                            <th>Jenjang</th>
                            <td>
								<span
                                    class="alert alert-sm @if($data->karya->jenjang == '') alert-danger @else alert-success @endif">
									@if($data->karya->jenjang == '')
                                        <i class="icofont-close-circled"></i>
                                    @else
                                        {{$data->karya->jenjang}}
                                    @endif
								</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>
								<span
                                    class="alert alert-sm @if($data->karya->kategori == '') alert-danger @else alert-success @endif">
									@if($data->karya->kategori == '')
                                        <i class="icofont-close-circled"></i>
                                    @else
                                        {{$data->karya->kategori}}
                                    @endif
								</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Foto Tim</th>
                            <td>
								<span
                                    class="alert alert-sm @if($data->karya->foto_tim == '') alert-danger @else alert-success @endif">
									@if($data->karya->foto_tim == '')
                                        <i class="icofont-close-circled"></i>
                                    @else
                                        <a href="{{asset('uploads/karyas/'.$data->karya->foto_tim)}}"
                                           target="_blank">{{$data->karya->foto_tim}}</a>
                                    @endif
								</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Foto Poster</th>
                            <td>
								<span
                                    class="alert alert-sm @if($data->karya->foto_poster == '') alert-danger @else alert-success @endif">
									@if($data->karya->foto_poster == '')
                                        <i class="icofont-close-circled"></i>
                                    @else
                                        <a href="{{asset('uploads/karyas/'.$data->karya->foto_poster)}}"
                                           target="_blank">{{$data->karya->foto_poster}}</a>
                                    @endif
								</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Tentang Tim</th>
                            <td>
								<span
                                    class="alert alert-sm @if($data->karya->tentang_tim == '') alert-danger @else alert-success @endif">
									@if($data->karya->tentang_tim == '')
                                        <i class="icofont-close-circled"></i>
                                    @else
                                        {{$data->karya->tentang_tim}}
                                    @endif
								</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>
								<span
                                    class="alert alert-sm @if($data->karya->nama == '') alert-danger @else alert-success @endif">
									@if($data->karya->nama == '')
                                        <i class="icofont-close-circled"></i>
                                    @else
                                        {{$data->karya->nama}}
                                    @endif
								</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>
								<span
                                    class="alert alert-sm @if($data->karya->deskripsi == '') alert-danger @else alert-success @endif">
									@if($data->karya->deskripsi == '')
                                        <i class="icofont-close-circled"></i>
                                    @else
                                        {{$data->karya->deskripsi}}
                                    @endif
								</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Link Profil</th>
                            <td>
								<span
                                    class="alert alert-sm @if($data->karya->link_profil == '') alert-danger @else alert-success @endif">
									@if($data->karya->link_profil == '')
                                        <i class="icofont-close-circled"></i>
                                    @else
                                        <a href="{{$data->karya->link_profil}}"
                                           target="_blank">{{$data->karya->link_profil}}</a>
                                    @endif
								</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Link Presentation</th>
                            <td>
								<span
                                    class="alert alert-sm @if($data->karya->link_presentation == '') alert-danger @else alert-success @endif">
									@if($data->karya->link_presentation == '')
                                        <i class="icofont-close-circled"></i>
                                    @else
                                        <a href="{{$data->karya->link_presentation}}"
                                           target="_blank">{{$data->karya->link_presentation}}</a>
                                    @endif
								</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Link Mockup</th>
                            <td>
								<span
                                    class="alert alert-sm @if($data->karya->link_mockup == '') alert-danger @else alert-success @endif">
									@if($data->karya->link_mockup == '')
                                        <i class="icofont-close-circled"></i>
                                    @else
                                        <a href="{{$data->karya->link_mockup}}"
                                           target="_blank">{{$data->karya->link_mockup}}</a>
                                    @endif
								</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Proposal</th>
                            <td>
								<span
                                    class="alert alert-sm @if($data->karya->proposal == '') alert-danger @else alert-success @endif">
									@if($data->karya->proposal == '')
                                        <i class="icofont-close-circled"></i>
                                    @else
                                        <a href="{{asset('uploads/karyas/'.$data->karya->proposal)}}"
                                           target="_blank">{{$data->karya->proposal}}</a>
                                    @endif
								</span>
                            </td>
                        </tr>
                        {{-- <tr>
                            <th>Total Komentar</th>
                            <td>
                                {{$data->karya->komentars->count()}}
                            </td>
                        </tr> --}}
                        <tr>
                            <th>Total Likes</th>
                            <td>
                                {{$data->karya->likers}}
                            </td>
                        </tr>
                    </table>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection
