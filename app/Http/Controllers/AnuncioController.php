<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;

class AnuncioController extends DefaultController
{
    protected $model, $request;
    protected $view = 'anuncio';

    function __construct(Anuncio $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }
}
