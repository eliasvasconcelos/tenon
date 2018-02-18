<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Uf;
use App\Models\Anuncio;
use App\User;
use Illuminate\Http\Request;

class HomeController extends DefaultController
{
    public function index()
    {
        $estado = Uf::all();
        $categoria = Categoria::where('categoria_id', 0)->limit(8)->get();
        $anuncio = Anuncio::where('premium', 0)->inRandomOrder()->limit(4)->get();
        $anuncioP = Anuncio::where('premium', 1)->inRandomOrder()->limit(4)->get();
        $lojas = User::where('tipo_id', 4)->InRandomOrder()->limit(4)->get();
        return view("home.index", compact('lojas','anuncio','anuncioP','estado', 'categoria'));
    }
}

