<?php

Route::resource('/', 'HomeController');

Route::resource('anuncio', 'AnuncioController');

Route::resource('anuncio_foto', 'AnuncioFotoController', ['except'=> 'index', 'create', 'edit', 'show']);

Route::resource('categoria', 'CategoriaController');

Route::resource('user', 'UserController');