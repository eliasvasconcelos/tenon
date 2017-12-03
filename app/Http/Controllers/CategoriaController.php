<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Anuncio;
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
        $data = $this->model->orderBy('id','DESC')->limit(10)->get();

        return view("$this->view.index", compact('data'));

    }

}
