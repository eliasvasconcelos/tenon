@extends('layouts.app')

@section('content')
<h2>Anuncio -> <a href="{{url('../')}}">Voltar</a></h2>

@forelse($anuncio as $z)

        <img src="{{$z->fotos->base64 or ''}}" alt="Imagem" width="250">
        <br />
        <a href="anuncio/{{$z->id}}">{{$z->titulo}}</a> // {{$z->descricao}}
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