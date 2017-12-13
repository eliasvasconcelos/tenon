@extends('layouts.app')

@section('content')

    @if(auth()->user())
        {{ Auth::user()->name }} temos informações para vc....
        vc possui {{ Auth::user()->anuncio }}
    @else
        Bwn vindo visitante
    @endif
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <h2>Buscar anuncios</h2>
    <form action="{{url('pesquisa')}}" method="post">
        {!! csrf_field() !!}
        <input type="text" name="texto" placeholder="Digite aqui...">
        <select name="estado">
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
        </select>
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
            <img src="{{$z->fotos->base64 or ''}}" alt="Imagem" width="200">
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
            <img src="{{$z->fotos->base64 or ''}}" alt="Imagem" width="200">
            <br />
            <p><a href="anuncio/{{$z->id}}">{{$z->id}}</a> //{{$z->descricao}} </p>
            <b>Eu sou Normal</b> - criado em {{$z->created_at}}...ID PREMIUM = {{$z->premium}}
            <hr>
        @empty
            <li>Não há registro!</li>
        @endforelse
    </ul>
@endsection
