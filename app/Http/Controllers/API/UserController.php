<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\DefaultController;
use App\User;
use Illuminate\Http\Request;


class UserController extends DefaultController
{
    protected $model, $request;
    protected $view = 'user';

    function __construct(User $model, Request $request)
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