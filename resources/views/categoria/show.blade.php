@extends('layouts.app')

@section('content')
        <h3>Categoria Selecionada -> {{$data->nome}}
        -> <a href="{{url('../categoria')}}">Voltar</a></h3>


<ul>
    @forelse($data->anuncios as $z)
        <li>
                <a href="../anuncio/{{$z->id}}">{{$z->titulo}}</a>
        </li>
         @empty
    @endforelse
</ul>

@endsection