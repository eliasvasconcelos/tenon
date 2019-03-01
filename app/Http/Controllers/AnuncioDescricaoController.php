<?php

namespace App\Http\Controllers;

use App\Models\DescricaoAnuncio;
use Illuminate\Http\Request;

class AnuncioDescricaoController extends DefaultController
{
    protected $model, $request;

    function __construct(DescricaoAnuncio $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }
}