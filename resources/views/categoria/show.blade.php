@extends('layouts.app')

@section('content')
<h3>Categoria Selecionada  <a href="{{url('../categoria')}}">Voltar</a></h3>
{{$data->nome}}
<hr>
<h2>Anuncios para categoria {{$data->nome}}</h2>
<ul>
    @forelse($data->anuncios as $z)

        <img src="{{$z->fotos->base64 or ''}}" alt="Imagem" width="200">
        <br/>
        <a href="../anuncio/{{$z->id}}">{{$z->titulo}}</a>
        {{$z->descricao}}
        <hr>
         @empty
        Sem registro!!
    @endforelse
</ul>

@endsection