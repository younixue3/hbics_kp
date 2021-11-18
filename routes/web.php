<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/logout', function() {
    Auth::logout();
    return redirect('login');
});
Route::get('/', 'LoginController@index');
Route::get('/daftar', 'AuthLocal\RegisterController@index');
Route::get('/login', 'AuthLocal\RegisterController@login')->name('login');
Route::post('/daftar/insert', 'AuthLocal\RegisterController@insert')->name('daftar');
Route::post('/daftar/anggota', 'AnggotaKelompokController@index')->name('daftar/anggota');
Route::get('/get_kota', 'AuthLocal\RegisterController@get_kota');
Route::get('visitors/{id}', 'PesertaController@verifikasi')->name('peserta/verifikasi');
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
    // SPONSOR
    Route::get('sponsors/{event_id}', 'SponsorController@index');
    Route::get('sponsors/{event_id}/create', 'SponsorController@create');
    Route::post('sponsors/{event_id}', 'SponsorController@store');
    Route::get('sponsors/{event_id}/{id}/edit', 'SponsorController@edit');
    Route::patch('sponsors/{event_id}/{id}', 'SponsorController@update');
    Route::get('sponsors/{event_id}/{id}/delete', 'SponsorController@destroy');
    Route::get('sponsors/{event_id}/{id}/{slug}', 'SponsorController@show');
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
    Route::get('virtualexpo', 'ExpoController@virtualexpo');
    Route::get('virtualexpo/{jenjang}/{kategori}', 'ExpoController@virtualexpoJenjangKategori');
    Route::get('virtualexpo/{jenjang}/{kategori}/{product_kategori}/{slug}', 'ExpoController@virtualexpoDetailProduct');
    // VISITORS
    Route::get('visitors', 'PesertaController@visitor')->name('visitor');
    Route::get('pengunjung/{id}', 'PesertaController@show_visitor')->name('show_visitor');
    Route::put('pengunjung/update/{id}', 'PesertaController@update_visitor')->name('update_visitor');
    Route::get('pengunjung/delete/{id}', 'PesertaController@delete_visitor')->name('delete_visitor');
    Route::get('pengunjung/change_role/{id}', 'PesertaController@change_role_visitor')->name('change_role_pengunjung');
    // PANITIA
    Route::get('panitia', 'DataPanitiaController@index')->name('panitia');
    Route::get('panitia/{id}', 'DataPanitiaController@show_panitia')->name('show_panitia');
    Route::put('panitia/update/{id}', 'DataPanitiaController@update_panitia')->name('update_panitia');
    Route::get('panitia/delete/{id}', 'DataPanitiaController@delete_panitia')->name('delete_panitia');
    Route::get('panitia/change_role/{id}', 'DataPanitiaController@change_role_panitia')->name('change_role_panitia');
});
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
Route::get('pembayaran', 'ExpoController@pembayaran')->name('bukti_pembayaran');
Route::put('pembayaran/post', 'ExpoController@postPembayaran')->name('post_pembayaran');
Route::put('pembayaran/tahap_validasi', 'ExpoController@tahap_validasi')->name('tahap_validasi');
Route::middleware(['peserta', 'pembayaran'])->group(function(){
        Route::put('profil/update', 'ExpoController@update_profil_tim')->name('profil_update');
        Route::get('profil', 'ExpoController@profil');
        Route::post('karya/insert', 'ExpoController@insert_karya')->name('karya_insert');
        Route::post('karya/foto/insert', 'ExpoController@insert_foto_karya')->name('foto_karya_insert');
        Route::get('profil/simulasi', 'ExpoController@profilSimulasi');
        Route::patch('karya', 'ExpoController@karyaUpdate');
        Route::post('karya/foto', 'ExpoController@karyaFoto');
        Route::get('karya/foto/{id}', 'ExpoController@karyaFotoDelete');
    });
