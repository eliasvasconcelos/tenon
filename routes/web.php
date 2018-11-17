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
    Route::get('anuncio/novo', 'AnuncioController@novo');
/*    Route::get('anuncio/{id}/update', 'AnuncioController@anuncio_update');*/

    Route::put('user/{id}', 'UserController@update');
    Route::put('user/anuncio', 'UserController@anuncio');
    Route::get('anuncio/{id}/delete', 'AnuncioController@destroy');
    Route::get('user/{id}/configuracao/edit', 'UserController@configuracao');
    Route::get('user/{id}/configuracao', 'UserController@configuracao');
    Route::get('user/{id}/endereco', 'UserController@endereco')->name('editar');
    Route::get('user/{id}/perfil', 'UserController@perfil');
});

Route::group(['prefix' => 'painel'], function () {
    Route::resource('/', 'AdminController');
    Route::get('/user', 'AdminController@user');

});

Route::resource('anuncio', 'AnuncioController');

Route::get('user/{id}/update', 'UserController@usuario_update');
Route::get('user/{id}/delete', 'UserController@destroy');

Route::resource('estado', 'UfController');

Route::resource('configuracao', 'ConfigController');
Route::resource('configuracao/anuncio', 'ConfigController@anuncio');

Route::resource('user', 'UserController');

Route::resource('loja', 'LojaController', ['except'=> 'index']);

Route::resource('anuncio_foto', 'AnuncioFotoController', ['except'=> 'index', 'create', 'edit', 'show']);

Route::resource('categoria', 'CategoriaController',['except'=> 'index', 'create', 'edit', 'show']);

Route::any('pesquisar','AnuncioController@pesquisar');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/estado', function () {
    return redirect('home');
});
