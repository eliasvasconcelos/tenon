<?php

namespace App\Http\Controllers;

use App\Models\AnuncioFoto;
use Illuminate\Http\Request;

class AnuncioFotoController extends DefaultController
{
    protected $model, $request;

    function __construct(AnuncioFoto $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }
}