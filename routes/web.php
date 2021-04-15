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
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->group(function(){
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
    Route::get('events/{id}/{slug}', 'EventController@show');
    // JURI
    Route::get('juris/{event_id}', 'JuriController@index');
    Route::get('juris/{event_id}/create', 'JuriController@create');
    Route::post('juris/{event_id}', 'JuriController@store');
    Route::get('juris/{event_id}/{id}/edit', 'JuriController@edit');
    Route::patch('juris/{event_id}/{id}', 'JuriController@update');
    Route::get('juris/{event_id}/{id}/{slug}', 'JuriController@show');
    // TIMELINE
    Route::get('timelines/{event_id}', 'TimelineController@index');
    Route::get('timelines/{event_id}/create', 'TimelineController@create');
    Route::post('timelines/{event_id}', 'TimelineController@store');
    Route::get('timelines/{event_id}/{id}/edit', 'TimelineController@edit');
    Route::patch('timelines/{event_id}/{id}', 'TimelineController@update');
    Route::get('timelines/{event_id}/{id}/{slug}', 'TimelineController@show');
    // KARYA/PESERTA
    Route::get('pesertas/{event_id}', 'PesertaController@index');
    Route::get('pesertas/{event_id}/create', 'PesertaController@create');
    Route::post('pesertas/{event_id}', 'PesertaController@store');
    Route::get('pesertas/{event_id}/{user_id}/edit', 'PesertaController@edit');
    Route::patch('pesertas/{event_id}/{user_id}', 'PesertaController@update');
    Route::get('pesertas/{event_id}/{user_id}/{slug}', 'PesertaController@show');
});
