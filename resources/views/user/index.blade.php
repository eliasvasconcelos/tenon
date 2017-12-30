@extends('layouts.app')

@section('content')
    <h2>Todos usuarios cadastrados </h2>
    <hr>
@forelse($usuario as $z)
@if( $z->tipo_id == 2 || $z->tipo_id == 3 )

    <a href="user/{{$z->id}}">{{$z->name}}</a>
    <br />
    Usuario desde: <b>{{$z->created_at}}</b>
    <br />

@endif

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