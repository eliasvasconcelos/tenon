@extends('layouts.app')

@section('content')
    <h2>Todos usuarios cadastrados </h2>
    <hr>
@forelse($usuario as $z)

        <a href="{{$z->id}}">{{$z->name}}</a>
        <br />
        Usuario desde: <b>{{$z->created_at}}</b>
        <br />

@empty
    Não há registro!
@endforelse

@if($usuario)
    @if($usuario->links())
        {!! $usuario->links() !!}
    @else

    @endif
@endif

@endsection