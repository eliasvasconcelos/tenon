<?php

namespace App\Http\Controllers;

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
}
