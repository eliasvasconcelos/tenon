<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Tenon') }}</title>
    <meta name="Description" content="">
    <meta name="author" content="Elias Vasconcelos">
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/resolucao.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="{{ asset('js/valida.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>

<div class="container" style="background-image: none;background-color: #0d3625">
    <div class="list"></div>
    <header class="topo_search_fixo">
        <div style="width: 1110px; margin: auto">
            <div class="logo swing fade" style="float: left"><h1>Tenon - Tudo do meio Rural em um só local</h1></div>

        </div>
        <!-- MENU FULL TOPO -->
    </header>
    <div class="bg_branco" style="height: 50px;padding:2.5px;">
        <menu class="cat_principal" style="margin-top: 0px;">
            <div class="center">
                <h1 class="fontzero">Pesquise por Categorias</h1>
                <ul>
                    <a href="{{url('/')}}" class="fade_m">
                        <li>
                            <p>Home</p>
                        </li>
                    </a>
                    @forelse(\App\Models\Categoria::where('categoria_id', 0)->get() as $z)
                        <a href="pesquisar?categoria={{$z->id}}" class="fade_m">
                            <li>
                                <p>{{$z->nome}}</p>
                            </li>
                        </a>
                    @empty
                        <li class="cor_black">Sem Categoria</li>
                @endforelse
                <!--  <a href="?pg=resultado" class="fade_m"><li><i class="fa fa-picture-o fa-2x"></i><p>Artesanato</p></li></a>
           <a href="?pg=resultado" class="fade_m"><li><i class="fa fa-graduation-cap fa-2x"></i><p>Cursos</p></li></a>
           <a href="?pg=resultado" class="fade_m"><li><i class="fa fa-map fa-2x"></i><p>Equitação</p></li></a>
           <a href="?pg=resultado" class="fade_m"><li><i class="fa fa-camera fa-2x"></i><p>Eventos</p></li></a>
           <a href="?pg=resultado" class="fade_m"><li><i class="fa fa-home fa-2x"></i><p>Imóveis</p></li></a>
           <a href="?pg=resultado" class="fade_m"><li><i class="fa fa-truck fa-2x"></i><p>Maquinário</p></li></a>
           <a href="?pg=resultado" class="fade_m"><li><i class="fa fa-leaf fa-2x"></i><p>Mudas/Ramos</p></li></a>
           <a href="?pg=resultado" class="fade_m all"><li><i class="fa fa-bars fa-2x"></i><p>All Categorias</p></li></a>
                                       <li><a href="#" class="fade_m">Suprimentos</a></li>
                           <li class="oculta right"><a href="?pg=resultado" class="fade_m"><i class="fa fa-lemon-o fa-2x"></i><p>Sementes</p>
                           <li><a href="#" class="fade_m">Vestimentas</a></li>
                           <li><a href="#" class="fade_m">Veículos</a></li></a></li>-->
                </ul>
            </div>
        </menu>
    </div>
</div>
<!-- Chamamos o Conteúdo -->
@yield('content')
<!-- Chamamos o Rodapé -->
@extends('layouts.footer')