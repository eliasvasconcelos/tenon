<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Endereco;
use App\User;
use Illuminate\Http\Request;

class UserController extends DefaultController
{
    protected $model, $request;
    protected $anuncio;
    protected $endereco;
    protected $view = 'user';

    function __construct(User $model, Anuncio $anuncio, Request $request, Endereco $endereco)
    {
        $this->model = $model;
        $this->anuncio = $anuncio;
        $this->endereco = $endereco;
        $this->request = $request;
    }

    public function configuracao($id)
    {
        $data = $this->model->find($id);
        return view("$this->view.configuracao", compact('data'));
    }
    public function endereco($id)
    {
        $endereco = $this->endereco->find($id);
        if($endereco == null){
            return "Erro";
        }
        return view("$this->view.configuracao", compact('data','endereco'));
    }

    public function perfil($id)
    {
        $data = $this->model->find($id);
        return view("$this->view.configuracao", compact('data'));
    }

    public function index()
    {
        if (auth()->check()) {
            if (auth()->user()->tipo_id == '1') {
                $usuario = $this->model->orderBy('id','ASC')->paginate(10);
                return view("$this->view.index", compact(  'usuario'));
            } else {
                return redirect('home');
            }
        } else {
            return redirect('home');
        }
    }

    /*public function show($id)
    {
        $usuario = $this->model->find($id);
        $anuncio = $this->anuncio->where('user_id', $id)->orderBy('id','DESC')->paginate(10);
        return view("$this->view.show", compact( 'anuncio','usuario'));
    }
    */
    public function show($id)
    {
        if (auth()->user()->profile == $id) {
            $data = $this->model->where("profile", $id)->first();
            /*  $usuario = $this->model->where($id)->first(); */
            $anuncio = $this->anuncio->where('user_id', $data->id)->orderBy('id','DESC')->paginate(5);
            return view("$this->view.show", compact( 'data', 'anuncio'));
        } else {
            return redirect()->back();
        }
    }

    public function anuncio()
    {
        $usuario = $this->model->all();
        /*  $usuario = $this->model->where($id)->first();*/
        $anuncio = $this->anuncio->where('user_id', $usuario->id)->orderBy('id','DESC')->paginate(10);

        return view("$this->view.show", compact( 'anuncio','usuario'));
    }

    public function edit($id)
    {
        if (auth()->check()) {
            /*  $data = $this->model->where("name", $id)->first();*/
            $data = $this->model->find($id);
            if($data->id == auth()->user()->id) {
                if($data == null){
                    return "Erro";
                }
                return view("$this->view.cad", compact('data'));
            }else {
                return redirect('home');
            }
        }
        else {
            return redirect('home');
        }
    }

    public function update($id)
    {
        $data = $this->request->all();
        $usuario = $this->model->find($id);
        $usuario->update($data);

        return 1;
    }

    public function usuario_update($id)
    {
        if (auth()->check()) {
            $usuario = User::find($id);
            if ($usuario->tipo_id == 1) {
                $usuario = $this->model->find($id);
                $usuario->update($this->request->all());
                return redirect()->back();
            } else {
                return "nao autorizado";
            }
        } else {
            return "usuario nao logado";
        }
    }

    public function destroy($id)
    {
        if (auth()->check()) {
            $deletar = User::find($id);
            if ($deletar->tipo_id == 1) {
                $deletar->delete();
                return redirect()->back();
            } else {
                return "nao autorizado";
            }
        } else {
            return "usuario nao logado";
        }
    }

}