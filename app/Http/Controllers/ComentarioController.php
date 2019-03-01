<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends DefaultController
{
    protected $model, $request;

    function __construct(ComentarioController $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }

}