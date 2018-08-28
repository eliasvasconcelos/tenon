<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends DefaultController
{
    protected $model, $request;
    protected $view = 'admin';

    function __construct(User $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }

    public function index()
    {
        if (auth()->check()) {
            if (auth()->user()->tipo_id == '1') {
                $data = $this->model->all();
                return view("$this->view.index", compact('data'));
            } else {
                return redirect('home');
            }
        } else {
            return redirect('home');
        }
    }

    public function user()
    {
        if (auth()->check()) {
            if (auth()->user()->tipo_id == '1') {
                $data = $this->model->all();
                return view("$this->view.user", compact('data'));
            } else {
                return redirect('home');
            }
        } else {
            return redirect('home');
        }
    }

}

