<?php

namespace App\Http\Controllers;

use App\Models\Uf;
use Illuminate\Http\Request;

class UfController extends DefaultController
{
    protected $model, $request;

    function __construct(Uf $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }
}
