<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\DefaultController;
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

    public function api($id)
    {
        $data = $this->model->where('id', $id)->get();
        return response()->json($data);
    }
}