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

Route::resource('/', 'HomeController');

Route::resource('anuncio', 'AnuncioController');
Route::group(['prefix' => 'anuncio'], function () {
    Route::post('/novo', 'AnuncioController@novo');
});


Route::resource('estado', 'UfController');

Route::resource('anuncio_foto', 'AnuncioFotoController', ['except'=> 'index', 'create', 'edit', 'show']);

Route::resource('categoria', 'CategoriaController');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
