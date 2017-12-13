<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\User;
use Illuminate\Http\Request;

class UserController extends DefaultController
{
    protected $model, $request;
    protected $anuncio;
    protected $view = 'user';

    function __construct(User $model,Anuncio $anuncio, Request $request)
    {
        $this->model = $model;
        $this->anuncio = $anuncio;
        $this->request = $request;
    }
    public function index()
    {
        $usuario = $this->model->orderBy('id','ASC')->paginate(10);
        return view("$this->view.index", compact(  'usuario'));
    }

    public function show($id)
    {
        $usuario = $this->model->find($id);
        $anuncio = $this->anuncio->where('user_id', $id)->orderBy('id','DESC')->paginate(10);
        return view("$this->view.show", compact( 'anuncio','usuario'));
    }
}
