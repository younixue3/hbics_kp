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
                            <td><img
                                    src="{{$data->kategori_lp == null ? asset('uploads/events/'.\App\Event::find(1)->logo) : asset('uploads/events/'.\App\Event::find(2)->logo) }}"
                                    style="width: 50px;"
                                    alt=""></td>
                            <td>{{ $data->kategori_lp == null ? \App\Event::find(1)->tagline : \App\Event::find(2)->tagline }}</td>
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
                                    class="alert alert-sm @if($data->jenjang == '') alert-danger @else alert-success @endif">
									@if($data->jenjang == '')
                                        <i class="icofont-close-circled"></i>
                                    @else
                                        {{$data->jenjang}}
                                    @endif
								</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>
                                @if($data->karya == null)
                                    <span
                                        class="alert alert-sm alert-danger">
                                            <i class="icofont-close-circled"></i>
								</span>
                                @else
                                    <span
                                        class="alert alert-sm @if($data->karya->kategori == null) alert-danger @else alert-success @endif">
									@if($data->karya == null && $data->karya->kategori == '')
                                            <i class="icofont-close-circled"></i>
                                        @else
                                            {{$data->karya->kategori}}
                                        @endif
								</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Foto Tim</th>
                            <td>
								<span
                                    class="alert alert-sm @if($data->foto_profile == '') alert-danger @else alert-success @endif">
									@if($data->foto_profile == '')
                                        <i class="icofont-close-circled"></i>
                                    @else
                                        <a href="{{asset('uploads/karyas/'.$data->foto_profile)}}"
                                           target="_blank">{{$data->foto_profile}}</a>
                                    @endif
								</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Foto Poster</th>
                            <td>
                                @if($data->karya == null)
                                    <span
                                        class="alert alert-sm alert-danger">
                                            <i class="icofont-close-circled"></i>
								</span>
                                @else
                                    <span
                                        class="alert alert-sm @if($data->karya->foto_poster == '') alert-danger @else alert-success @endif">
									@if($data->karya->foto_poster == '')
                                            <i class="icofont-close-circled"></i>
                                        @else
                                            <a href="{{asset('uploads/karyas/'.$data->karya->foto_poster)}}"
                                               target="_blank">{{$data->karya->foto_poster}}</a>
                                        @endif
								</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Tentang Tim</th>
                            <td>
								<span
                                    class="alert alert-sm @if($data->desc == '') alert-danger @else alert-success @endif">
									@if($data->desc == '')
                                        <i class="icofont-close-circled"></i>
                                    @else
                                        {{$data->desc}}
                                    @endif
								</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>
                                @if($data->karya == null)
                                    <span
                                        class="alert alert-sm alert-danger">
                                            <i class="icofont-close-circled"></i>
								</span>
                                @else
                                    <span
                                        class="alert alert-sm @if($data->karya->nama == '') alert-danger @else alert-success @endif">
									@if($data->karya->nama == '')
                                            <i class="icofont-close-circled"></i>
                                        @else
                                            {{$data->karya->nama}}
                                        @endif
								</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>
                                @if($data->karya == null)
                                    <span
                                        class="alert alert-sm alert-danger">
                                            <i class="icofont-close-circled"></i>
								</span>
                                @else
                                    <span
                                        class="alert alert-sm @if($data->karya->deskripsi == '') alert-danger @else alert-success @endif">
									@if($data->karya->deskripsi == '')
                                            <i class="icofont-close-circled"></i>
                                        @else
                                            {{$data->karya->deskripsi}}
                                        @endif
								</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Link Profil</th>
                            <td>
                                @if($data->karya == null)
                                    <span
                                        class="alert alert-sm alert-danger">
                                            <i class="icofont-close-circled"></i>
								</span>
                                @else
                                    <span
                                        class="alert alert-sm @if($data->karya->link_profil == '') alert-danger @else alert-success @endif">
									@if($data->karya->link_profil == '')
                                            <i class="icofont-close-circled"></i>
                                        @else
                                            <a href="{{$data->karya->link_profil}}"
                                               target="_blank">{{$data->karya->link_profil}}</a>
                                        @endif
								</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Link Presentation</th>
                            <td>
                                @if($data->karya == null)
                                    <span
                                        class="alert alert-sm alert-danger">
                                            <i class="icofont-close-circled"></i>
								</span>
                                @else
                                    <span
                                        class="alert alert-sm @if($data->karya->link_presentation == '') alert-danger @else alert-success @endif">
									@if($data->karya->link_presentation == '')
                                            <i class="icofont-close-circled"></i>
                                        @else
                                            <a href="{{$data->karya->link_presentation}}"
                                               target="_blank">{{$data->karya->link_presentation}}</a>
                                        @endif
								</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Link Mockup</th>
                            <td>
                                @if($data->karya == null)
                                    <span
                                        class="alert alert-sm alert-danger">
                                            <i class="icofont-close-circled"></i>
								</span>
                                @else
                                    <span
                                        class="alert alert-sm @if($data->karya->link_mockup == '') alert-danger @else alert-success @endif">
									@if($data->karya->link_mockup == '')
                                            <i class="icofont-close-circled"></i>
                                        @else
                                            <a href="{{$data->karya->link_mockup}}"
                                               target="_blank">{{$data->karya->link_mockup}}</a>
                                        @endif
								</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Proposal</th>
                            <td>
                                @if($data->karya == null)
                                    <span
                                        class="alert alert-sm alert-danger">
                                            <i class="icofont-close-circled"></i>
								</span>
                                @else
                                    <span
                                        class="alert alert-sm @if($data->karya->proposal == '') alert-danger @else alert-success @endif">
									@if($data->karya->proposal == '')
                                            <i class="icofont-close-circled"></i>
                                        @else
                                            <a href="{{asset('uploads/karyas/'.$data->karya->proposal)}}"
                                               target="_blank">{{$data->karya->proposal}}</a>
                                        @endif
								</span>
                                @endif
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
                                @if($data->karya == null)
                                    0
                                @else
                                    {{$data->karya->likers}}
                                @endif
                            </td>
                        </tr>
                    </table>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection
