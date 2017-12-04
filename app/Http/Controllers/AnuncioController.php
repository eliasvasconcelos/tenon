<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\UserTipo;
use App\Models\Categoria;
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
    public function index()
    {
        $categoria = Categoria::all();
        $usuario = UserTipo::all();
        $anuncio = Anuncio::orderBy('id','DESC')->paginate(30);

        return view("$this->view.index", compact( 'usuario','categoria','anuncio'));
    }
}
