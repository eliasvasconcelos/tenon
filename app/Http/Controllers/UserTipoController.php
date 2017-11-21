<?php

namespace App\Http\Controllers;

use App\Models\UserTipo;
use Illuminate\Http\Request;

class UserTipoController extends DefaultController
{
    protected $model, $request;

    function __construct(UserTipo $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }
}
