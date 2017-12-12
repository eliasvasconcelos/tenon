@extends('layouts.app')

@section('content')
<h2>Anuncio -> <a href="{{url('../')}}">Voltar</a></h2>
<ul>
    @forelse($anuncio as $z)
        <li>
            <a href="anuncio/{{$z->id}}">{{$z->titulo}}</a> // {{$z->descricao}}
            <br />Postado por: <b>{{$z->user->name}}</b>
            <br />Data: <b>{{$z->user->created_at}}</b>
            <br /><b>{{$z->fotos}}</b><br />
            <img src="">
        </li>
    @empty
        <li>Não há registro!</li>
    @endforelse
</ul>

@if($anuncio)
    @if($anuncio->links())
        {!! $anuncio->links() !!}
    @else

    @endif
@endif
@endsection