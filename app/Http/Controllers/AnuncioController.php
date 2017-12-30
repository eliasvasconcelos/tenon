<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\AnuncioFoto;
use App\Models\UserTipo;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
        $anuncio = Anuncio::orderBy('id', 'DESC')->paginate(30);

        return view("$this->view.index", compact('usuario', 'categoria', 'anuncio'));
    }

    public function Pesquisar()
    {
        if (Input::has('texto') == false) {
            return redirect('/');
        }
        $texto = Input::get('texto');
        $estado = Input::get('id_estados');
        $pesquisa = Anuncio::where('titulo', 'like', '%' . $texto . '%')
            ->orWhere('descricao', 'like', '%' . $texto . '%')
            ->orWhere('uf_id', 'like', '%' . $estado . '%')->orderBy('id', 'DESC')->paginate(10);

        return view("$this->view.search")->with('result', $pesquisa);
    }

    public function destroy($id)
    {
        $deletar = Anuncio::find($id);

        $deletar->delete();
    }

    public function novo()
    {
        return view("$this->view.cad");

        /* $inserir = $this->model->create([
             'user_id' =>   1,
             'categoria_id' =>  4,
             'titulo' =>   '',
             'descricao' =>  '',
             'uf_id' =>   2,
             'premium' =>   0

         ]);

         if($inserir){
            return view('anuncio.create');
        /*     return "inserido com sucesso";
         }else{
             return view('anuncio.create');
             return "Vixi, deu zebra";
         }*/
    }

    /*
     * ESSE METODO ESTAVA PEGANDO DO DEFAULTCONTROLLER
     * FOI REESCRITO AQUI PORQUE TEM QUE ADICIONAR O CREATE DA FOTO JUNTO COM O ID DO ANUNCIO CONFORME ABAIXO
    */
    public function store()
    {
        $data = $this->request->all();
        $store = $this->model->create($data);

        $data['anuncio_id'] = $store->id;
        AnuncioFoto::create($data);


        return 1;
    }
}
