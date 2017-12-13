@extends('layouts.app')

@section('content')
    Profile

Nome :<b>{{$usuario->name}}</b>
    <br/>
Email :<b>{{$usuario->email}}</b>
<br/>
Membro Desde :<b>{{$usuario->created_at}}</b>
<br/> <br/>
Eu sou um usuario :

@if($usuario->tipo_id == "2")
    <b>Pessoa Jurídica</b>
@elseif($usuario->tipo_id == "3")
    <b>Pessoa Física</b>
@elseif($usuario->tipo_id == "1")
    <b>Equipe Tenon</b>
@endif
<hr>
<h2>Meus Anuncios na plataforma</h2>
@forelse($anuncio as $z)

        <img src="{{$z->fotos->base64 or ''}}" alt="Imagem" width="200">
        <br/>
        <a href="../anuncio/{{$z->id}}">{{$z->titulo}}</a> // {{$z->descricao}}
        <br />Postado por: <b>{{$z->user->name or ''}}</b>
        <br />Data: <b>{{$z->user->created_at or ''}}</b>
    <hr>
@empty
    Não há registro!
@endforelse

@if($anuncio)
    @if($anuncio->links())
        {!! $anuncio->links() !!}
    @else

    @endif
@endif
@endsection