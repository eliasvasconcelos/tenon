@extends('layouts.app')

@section('content')
@forelse($result as $z => $value)
    <a href="../anuncio/{{$value->id}}"><img src="{{$value->fotos->base64 or ''}}" alt="Imagem" width="250"></a>
<br />
<a href="anuncio/{{$value->id}}">{{$value->titulo}}</a> // {{$value->descricao}}
<br />Postado por: <b>{{$value->user->name or ''}}</b>
<br />Data: <b>{{$value->user->created_at or ''}}</b>
<hr>
    @empty
        Sem resultado!!

@endforelse
@endsection