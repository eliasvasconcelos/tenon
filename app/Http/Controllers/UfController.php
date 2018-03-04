<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Uf;
use Illuminate\Http\Request;

class UfController extends DefaultController
{
    protected $model, $request;
    protected $anuncio;
    protected $view = 'uf';

    function __construct(Uf $model, Anuncio $anuncio, Request $request)
    {
        $this->model = $model;
        $this->anuncio = $anuncio;
        $this->request = $request;
    }
    public function index()
    {
        $data = $this->model->all();
        $anuncio = $this->anuncio->all();
        return view("$this->view.index", compact( 'anuncio', 'data'));
    }
    public function show($id)
    {
        $data = $this->model->where("sigla",$id)->first();
        $anuncio = $this->anuncio->where('uf_id', $data->id)->orderBy('id','DESC')->paginate(10);
        return view("$this->view.show", compact( 'anuncio', 'data'));
    }
}
