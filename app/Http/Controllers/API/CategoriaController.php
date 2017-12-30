<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\DefaultController;
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

    public function api($id)
    {
        $data = $this->model->where('categoria_id', $id)->get();
        return response()->json($data);
    }
}