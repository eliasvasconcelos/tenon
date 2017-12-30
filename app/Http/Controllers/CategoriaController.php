<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends DefaultController
{
    protected $model, $request;
    protected $view = 'categoria';

    function __construct(Categoria $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }

    public function index()
    {
        $data = $this->model->where('categoria_id', 0)->get();
        return view("$this->view.index", compact('data'));
    }


}

