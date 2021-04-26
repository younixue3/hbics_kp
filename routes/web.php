<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    dd(\App\Auth::user());
    return view('auth.login');
});

Auth::routes();
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('profils', 'HomeController@profil');
    Route::patch('profils/update', 'HomeController@profilUpdate');
    // DISCLAIMER KENAPA GA PAKE RECOURCE? BECAUSE IM PRO
    // EVENT
    Route::get('events', 'EventController@index');
    Route::get('events/create', 'EventController@create');
    Route::post('events', 'EventController@store');
    Route::get('events/{id}/edit', 'EventController@edit');
    Route::patch('events/{id}', 'EventController@update');
    Route::get('events/{id}/delete', 'EventController@destroy');
    Route::get('events/{id}/status', 'EventController@status');
    Route::get('events/{id}/{slug}', 'EventController@show');
    // JURI
    Route::get('juris/{event_id}', 'JuriController@index');
    Route::get('juris/{event_id}/create', 'JuriController@create');
    Route::post('juris/{event_id}', 'JuriController@store');
    Route::get('juris/{event_id}/{id}/edit', 'JuriController@edit');
    Route::patch('juris/{event_id}/{id}', 'JuriController@update');
    Route::get('juris/{event_id}/{id}/delete', 'JuriController@destroy');
    Route::get('juris/{event_id}/{id}/{slug}', 'JuriController@show');
    // TIMELINE
    Route::get('timelines/{event_id}', 'TimelineController@index');
    Route::get('timelines/{event_id}/create', 'TimelineController@create');
    Route::post('timelines/{event_id}', 'TimelineController@store');
    Route::get('timelines/{event_id}/{id}/edit', 'TimelineController@edit');
    Route::patch('timelines/{event_id}/{id}', 'TimelineController@update');
    Route::get('timelines/{event_id}/{id}/delete', 'TimelineController@destroy');
    Route::get('timelines/{event_id}/{id}/{slug}', 'TimelineController@show');
    // KARYA/PESERTA
    Route::get('pesertas/{event_id}', 'PesertaController@index');
    Route::get('pesertas/{event_id}/create', 'PesertaController@create');
    Route::post('pesertas/{event_id}', 'PesertaController@store');
    Route::get('pesertas/{event_id}/{user_id}/edit', 'PesertaController@edit');
    Route::patch('pesertas/{event_id}/{user_id}', 'PesertaController@update');
    Route::get('pesertas/{event_id}/{user_id}/delete', 'PesertaController@destroy');
    Route::get('pesertas/{event_id}/{user_id}/{slug}', 'PesertaController@show');
    // POSTINGAN
    Route::get('posts', 'PostController@index');
    Route::get('posts/create', 'PostController@create');
    Route::post('posts', 'PostController@store');
    Route::get('posts/{id}/edit', 'PostController@edit');
    Route::patch('posts/{id}', 'PostController@update');
    Route::get('posts/{id}/delete', 'PostController@destroy');
    Route::get('posts/{id}/{slug}', 'PostController@show');
    // FOLDER GALERI
    Route::get('galeris', 'GaleriController@index');
    Route::get('galeris/create', 'GaleriController@create');
    Route::post('galeris', 'GaleriController@store');
    Route::get('galeris/{id}/edit', 'GaleriController@edit');
    Route::patch('galeris/{id}', 'GaleriController@update');
    Route::get('galeris/{id}/delete', 'GaleriController@destroy');
    Route::get('galeris/{id}/{slug}', 'GaleriController@show');
    // FOTOS
    Route::get('fotos/{id}/delete', 'GaleriController@fotoDestroy');
    Route::post('fotos/{galeri_tahun}', 'GaleriController@fotoStore');
    // EXTRAS
    Route::get('visitors', 'PesertaController@visitor');
    Route::get('virtualexpo', 'ExpoController@virtualexpo');
    Route::get('virtualexpo/{jenjang}/{kategori}', 'ExpoController@virtualexpoJenjangKategori');
    Route::get('virtualexpo/{jenjang}/{kategori}/{product_kategori}/{slug}', 'ExpoController@virtualexpoDetailProduct');
});
Route::middleware(['auth', 'visitor'])->group(function(){
    // MENU NON ADMIN
    // LANDING
    Route::get('beranda', 'LandingController@beranda');
    Route::get('tentang-kami', 'LandingController@tentangKami');
    Route::get('timeline', 'LandingController@timeline');
    Route::get('kategori', 'LandingController@kategori');
    Route::get('juri', 'LandingController@juri');
    Route::get('galeri', 'LandingController@galeri');
    Route::get('galeri/{id}/{folder}', 'LandingController@galeriDetail');
    Route::get('post', 'LandingController@post');
    Route::get('post/{id}/{slug}', 'LandingController@postDetail');
    // Route::post('expo/komentar/{id}/{slug}', 'LandingController@expoKomentar');
    Route::get('expo/{jenjang}', 'LandingController@expoJenjang');
    Route::get('expo/likes/{id}', 'LandingController@expoLikes');
    Route::get('expo/{jenjang}/{kategori}', 'LandingController@expoJenjangKategori');
    Route::get('expo/{jenjang}/{kategori}/{product_kategori}/{slug}', 'LandingController@expoDetailProduct');
    // EXPO
    Route::middleware(['peserta'])->group(function(){
        Route::get('profil', 'ExpoController@profil');
        Route::patch('profil', 'ExpoController@profilUpdate');
        Route::patch('karya', 'ExpoController@karyaUpdate');
        Route::post('karya/foto', 'ExpoController@karyaFoto');
        Route::get('karya/foto/{id}', 'ExpoController@karyaFotoDelete');
    });
});