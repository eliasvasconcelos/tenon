<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DefaultController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $data = $this->model->all();
        if($data == null){
            return "Erro";
        }
        return view("$this->view.index", compact('data'));
    }

    public function create()
    {
        return view("$this->view.cad");
    }

    public function store()
    {
        $data = $this->request->all();
        $this->model->create($data);
        if($data == null){
            return "Erro";
        }
        return 1;
    }

    public function show($id)
    {
        $data = $this->model->find($id);
            if($data == null){
                return "Erro";
            }
        return view("$this->view.show", compact('data'));
    }



    public function edit($id)
    {
        $data = $this->model->find($id);
        if($data == null){
            return "Erro";
        }
        return view("$this->view.cad", compact('data'));
    }

    public function update($id)
    {
        $data = $this->request->all();

        $model = $this->model->find($id);
        $model->update($data);

        return 1;
    }

    public function destroy($id)
    {
        $data = $this->model->find($id);
        $data->delete();

        return 1;
    }
}
