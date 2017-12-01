<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
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
        $anuncio = Anuncio::orderBy('id','DESC')->limit(50)->get();

        return view("$this->view.index", compact('data', 'anuncio'));
    }
}
