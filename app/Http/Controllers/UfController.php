<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $data = $this->model->all();
        return view("$this->view.index", compact( 'data'));
    }

}
