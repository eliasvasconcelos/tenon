<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\DefaultController;
use App\Models\Uf;
use Illuminate\Http\Request;

class UfController extends DefaultController
{
    protected $model, $request;
    protected $view = 'uf';

    function __construct(Uf $model, Request $request)
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