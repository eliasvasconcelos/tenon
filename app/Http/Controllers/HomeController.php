<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Categoria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $model, $request;
    protected $view = 'home';

    function __construct(Categoria $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }

    public function index()
    {
        $categoria  = Categoria::orderBy('nome','ASC')->limit(7)->get();
        $anuncio    = Anuncio::orderBY('id','DESC')->limit(4)->get();

        return view("$this->view.index", compact('categoria', 'anuncio'));
    }
}
