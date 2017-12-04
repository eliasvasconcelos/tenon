<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
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
