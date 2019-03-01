<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categoria/search/{id}', 'Api\CategoriaController@api')->name('api_categoria_search');
Route::get('uf/search/{id}', 'Api\UfController@api')->name('api_uf_search');
Route::get('anuncio/search/{id}', 'Api\AnuncioController@api')->name('api_anuncio_search');
Route::get('user/search/{id}', 'Api\UserController@api')->name('api_user_search');

