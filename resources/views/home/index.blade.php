@extends('layouts.app')
<style type="text/css">
    #menu{margin-top:20px;}
    #menu a{color: #fff}
    #menu a:hover{color: #fff}
    #menu li{display: inline; padding:10px; background-color:#1f648b;}
   #menu .danger{background-color:#c7254e;}
</style>
@section('content')

    @if(auth()->user())
        {{ Auth::user()->name }}<br/>
        você tem {{auth()->user()->anuncios->count()}}
    @else
        Ben vindo <b>VISITANTE</b>
    @endif

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

<ul id="menu">
    @if(auth()->user())
    <li class="danger"><a href="anuncio/novo_anuncio">Anunciar</a></li>
    @endif
    <li><a href="anuncio">Anuncios</a></li>
    <li><a href="estado">Estados</a></li>
    <li><a href="categoria">Categorias</a></li>
    <li><a href="user">Usuarios</a></li>
</ul>
    <h2>Buscar anuncios</h2>
    <form action="{{url('pesquisar')}}" method="get">
        {{--{!! csrf_field() !!}--}}
        <input type="text" name="texto" placeholder="Digite aqui...">
       {{-- <select name="estado">
            @forelse($estado as $z)
                <option>{{$z->uf}}</option>
            @empty
                <option>Não há registro!</option>
            @endforelse
        </select>
        <select name="categoria">@forelse($categoria as $z)
                <option>{{$z->nome}}</option>
            @empty
                <option>Não há registro!</option>
            @endforelse
        </select>--}}
        <input type="submit" value="buscar">
    </form>
    <br/>
    <hr>
    <h2>Categorias</h2>
    <ul>
        @forelse($categoria as $z)
            <li style="display:inline;border:1px solid #ccc;padding:10px">
                <a href="categoria/{{$z->id}}">{{$z->nome}}</a>
            </li>
        @empty
            <li>Não há registro!</li>
        @endforelse
    </ul>
    <hr>
    <h2>Em Destaque: Premium</h2>
    <ul>
        @forelse($anuncioP as $z)
            <h3>Titulo: {{$z->titulo}}</h3>
            <a href="anuncio/{{$z->id}}"><img src="{{$z->fotos->base64 or ''}}" alt="Imagem" width="200"></a>
            <br />
            <p><a href="anuncio/{{$z->id}}">{{$z->id}}</a> //{{$z->descricao}}</p>
            <b>Eu sou Premium</b> - criado em {{$z->created_at}}...ID PREMIUM = {{$z->premium}}
            <hr>
        @empty
            <li>Não há registro!</li>
        @endforelse
    </ul>
    <br/>
    <hr>
    <h2>Últimos Anuncios: Normal</h2>
    <ul>
        @forelse($anuncio as $z)
            <h3>{{$z->titulo}}</h3>
            <a href="../anuncio/{{$z->id}}"><img src="{{$z->fotos->base64 or ''}}" alt="Imagem" width="200"></a>
            <br />
            <p><a href="anuncio/{{$z->id}}">{{$z->id}}</a> //{{$z->descricao}} </p>
            <b>Eu sou Normal</b> - criado em {{$z->created_at}}...ID PREMIUM = {{$z->premium}}
            <hr>
        @empty
            <li>Não há registro!</li>
        @endforelse
    </ul>
@endsection
