<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\AnuncioFoto;
use App\Models\DescricaoAnuncio;
use App\Models\UserTipo;
use App\User;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class AnuncioController extends DefaultController
{
    protected $model, $midia, $user, $descricao , $request;
    protected $view = 'anuncio';

    function __construct(Anuncio $model, AnuncioFoto $midia, DescricaoAnuncio $descricao, User $user, Request $request)

    {
        $this->model = $model;
        $this->midia = $midia;
        $this->user = $user;
        $this->descricao = $descricao;
        $this->request = $request;
    }

    public function show($id)
    {
       $data = $this->model->find($id);
/*        $data = $this->model->where("titulo", $id)->first();*/

            if($data->status_id != 1)
        {
            return redirect("home");
        }
        else{
            return view("$this->view.show", compact('data'));
        }
    }

    public function index()
    {
        $data = $this->model->where('status_id', 1)->orderBy('id', 'DESC')->paginate(30)->get();
        $categoria = Categoria::all();
        $usuario = UserTipo::all();
/*        $anuncio = Anuncio::where('status_id', 1)->orderBy('id', 'DESC')->paginate(30);*/

        return view("$this->view.index", compact('data', 'usuario', 'categoria', 'anuncio'));
    }

    public function edit($id)
    {
        $data = $this->model->find($id);
        if($data == null){
            return "Erro";
        }
        return view("$this->view.cad", compact('data'));
    }

    public function Pesquisar()
    {
        /*if (Input::has('texto') == false) {
            return redirect('/');
        }*/
        ini_set('memory_limit', '-1');
        set_time_limit(0);
        if (!$this->request->all()) {
            $getArray = [];
            $data = [];
        } else {
            $getArray = $this->request->all();
            $data_inicial = '';
            $data_final = '';
            $status_id = '';
            $motivo_id = '';
            $canal_id = '';
            $operador_id = '';
            $tempo = '';
            foreach ($this->request->all() as $nome_campo => $valor) {
                $comando = "\$" . $nome_campo . "='" . $valor . "';";
                eval($comando);
            }
            $busca = Anuncio::select('anuncios.*')->where('status_id', 1);
            if ($status_id != '') {
                $busca->where('status_id', $status_id);
            }
            if ($motivo_id != '') {
                $busca->where('motivo_id', $motivo_id);
            }
            if ($canal_id != '') {
                $busca->where('canal_id', $canal_id);
            }
            if ($tempo != '') {
                $busca->where('tm', $tempo);
            }
            if ($operador_id != '') {
                $busca->where('operador_id', $operador_id);
            }
            if ($data_inicial != '') {
                $busca->where('canal_protocolos.created_at', '>=', "$data_inicial 00:00:00");
            }
            if ($data_final != '') {
                $busca->where('canal_protocolos.created_at', '<=', "$data_final 23:59:59");
            }
            $busca->orderBy('id', 'desc');
            $data = $busca->get();
        }
        return view("$this->view.search", compact('data', 'getArray'));
    /*

        $t = Input::get('texto');
        $busca = Anuncio::where('status_id', 1)
           ->orWhere('titulo', 'LIKE', '%' . $t . '%')/*
           ->orWhere('descricao', 'LIKE', '%' . $t . '%')
           ->orderBy('id', 'desc')->paginate(10);

        return view("$this->view.search")->with('result', $busca);*/

    }

    public function destroy($id)
    {
        if (auth()->check()) {
            $deletar = Anuncio::find($id);
            if ($deletar->user_id == auth()->user()->id) {
                $deletar->delete();
                return redirect()->back();
            } else {
                return "nao autorizado";
            }
        } else {
            return "usuario nao logado";
        }
    }

    public function novo()
    {
        if(Auth()->user()->status_id == 0){
            return redirect("user/".Auth()->user()->profile."#alerta");
        }
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
        $store = $this->model->create($this->request->all());
        foreach (request()->get('base64') as $midia) {
            $data = [];
            $data['base64'] = $midia;
            $midia = utf8_decode($midia);
            $base64_str = substr($midia, strpos($midia, ",") + 1);
            $image = base64_decode($base64_str);
            $teste = explode(",", $midia);
            $teste1 = explode("/", $teste[0]);
            $teste2 = explode(";", $teste1[1]);
            $avatar = time(). rand(10, 99). "." . $teste2[0];
            Storage::disk('anuncio')->put("$avatar", $image);
            if ($teste2[0] == "jpg" || $teste2[0] == "png" || $teste2[0] == "jpeg") {
                $return['tipo_id'] = 2;
            } else if ($teste2[0] == "mp3") {
                $return['tipo_id'] = 3;
            } else if ($teste2[0] == "mp4") {
                $return['tipo_id'] = 4;
            } else {
                $return['tipo_id'] = 8;
            }
            $return['base64'] = $avatar;

            $data['base64'] = $avatar;
            $data['anuncio_id'] = $store->id;
            $this->midia->create($data);
        }

        $create = [];
        $create['anuncio_id'] =  $store->id;
        $create['descricao'] = $this->request->get('descricao');
        $create['valor'] = $this->request->get('valor');
        $create['tipo'] = $this->request->get('tipo');
        $data = $this->descricao->create($create);
        return 1;

        /*

        $store = $this->model->create($this->request->all());

        foreach (request()->get('base64') as $z) {

            $data = [];
            $data['base64'] = $z;
            dd($data);

            $data['anuncio_id'] = $store->id;
            AnuncioFoto::create($data);
        }

        return 1;*/

        /* $data = $this->request->all();
         $store = $this->model->create($data);

         $data['anuncio_id'] = $store->id;
         AnuncioFoto::create($data);

         return 1;*/
    }

    public function anuncio_update($id)
    {
        $anuncio = $this->model->find($id);
        $anuncio->update($this->request->all());
        return redirect()->back();
    }

}
