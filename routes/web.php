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

Auth::routes();

Route::resource('/', 'HomeController');

Route::group(['middleware' => ['auth']], function (){
    Route::get('anuncio/novo_anuncio', 'AnuncioController@novo');
    Route::put('user/{id}', 'UserController@update');
    Route::get('anuncio/{id}/delete', 'AnuncioController@destroy');
});

Route::resource('anuncio', 'AnuncioController');

Route::resource('estado', 'UfController');

Route::resource('user', 'UserController', ['except'=> 'index']);

Route::resource('loja', 'LojaController', ['except'=> 'index']);

Route::resource('anuncio_foto', 'AnuncioFotoController', ['except'=> 'index', 'create', 'edit', 'show']);

Route::resource('categoria', 'CategoriaController',['except'=> 'index', 'create', 'edit', 'show']);

Route::any('pesquisar','AnuncioController@pesquisar');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', function () {
    return redirect('home');
});
Route::get('/estado', function () {
    return redirect('home');
});
