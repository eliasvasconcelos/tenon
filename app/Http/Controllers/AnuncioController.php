<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
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
        $anuncio = Anuncio::orderBy('id','DESC')->paginate(30);

        return view("$this->view.index", compact( 'usuario','categoria','anuncio'));
    }

    public function Pesquisar()
    {
        if(Input::has('texto')==false)
        {
            return redirect('/');
        }
        $texto = Input::get('texto');
        $pesquisa = Anuncio::where('titulo', 'like', '%' . $texto . '%')
            ->orWhere('descricao', 'like', '%' . $texto . '%')->get();

        return view("$this->view.search")->with('result', $pesquisa);
    }
public function destroy($id)
{
    $deletar = Anuncio::find($id);

    $deletar->delete();
}

    public function novo()
    {
        return view('anuncio.create');
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
}
