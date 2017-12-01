<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;

class HomeController extends DefaultController
{
    public function index()
    {
        $anuncio = Anuncio::orderBy('id','DESC')->limit(10)->get();

        return view("home.index", compact('anuncio'));
    }
}
