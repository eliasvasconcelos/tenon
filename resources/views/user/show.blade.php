@extends('layouts.app')

@section('content')
    <div class="center info_cfg">
    <h1 style="font-size: 2em">Perfil</h1>
    <ul class="menu_u" style="margin-top:-25px;">
        <li class="text-right">
            <a title="Assinatura" class="botao cor_black" href="?pg=assinatura"><i class="fa fa-star fa-lg"></i> &nbsp; Assinatura </a>|

            <a title="Depoimento" class="botao cor_black" href="?pg=feedback"><i class="fa fa-list-alt  fa-lg"></i> &nbsp; Feedback </a>|

            <a title="Leilão" class="botao cor_black" href="?pg=leilao"><i class="fa fa-legal  fa-lg"></i> &nbsp; Leilão </a>|

            <a title="Configurações" class="botao cor_black" href="?pg=configuracoes"><i class="fa fa-cog  fa-lg"></i> &nbsp; Configurações </a>

        </li>
    </ul>
</div>
<main class="conteudo">
    <section id="default2">
    Profile
Nome :<b>{{$usuario->name}}</b>
    <br/>
Email :<b>{{$usuario->email}}</b>
<br/>
Membro Desde :<b>{{$usuario->created_at}}</b>
<br/> <br/>
Eu sou um usuario :

@if($usuario->tipo_id == "2" || $usuario->tipo_id == "4")
    <b>Pessoa Jurídica</b>
@elseif($usuario->tipo_id == "3")
    <b>Pessoa Física</b>
@elseif($usuario->tipo_id == "1")
    <b>Equipe Tenon</b>
@endif
@if($usuario->tipo_id == "3")
    <br />
    <hr>
    Rua :<b>{{$usuario->endereco->rua or ''}}</b><br/>
    CEP :<b>{{$usuario->endereco->cep or ''}}</b><br/>
    Bairro :<b>{{$usuario->endereco->bairro or ''}}</b><br/>
    Logradouro :<b>{{$usuario->endereco->logradouro or ''}}</b><br/>
    Estado :<b>{{$usuario->endereco->uf_id->sigla or ''}}</b><br/>
<hr>
<h2>Meus Anuncios na plataforma</h2>
@forelse($anuncio as $z)

    <a href="../anuncio/{{$z->id}}"><img src="{{$z->fotos->base64 or ''}}" alt="Imagem" width="200"></a>
        <br/>
        <a href="../anuncio/{{$z->id}}">{{$z->titulo}}</a> // {{$z->descricao}}
        <br />Postado por: <b>{{$z->user->name or ''}}</b>
        <br />Data: <b>{{$z->user->created_at or ''}}</b>
    <br/>
    @auth
        {{-- {{$z->user_id}} - {{auth()->user()->id}}--}}
        @if(auth()->user()->id == $z->user_id)
            <a href="{{url ('user')}}/{{$z->id}}/edit">Editar</a> |

            <a href="{{url ('user')}}/{{$z->id}}/delete">Deletar</a>
        @endif
    @endauth
    <hr>
@empty
    Não há registro!
@endforelse
@elseif($usuario->tipo_id == "2")
    <hr>
    <h2>Meus Anuncios na plataforma</h2>
    @forelse($anuncio as $z)

        <a href="../anuncio/{{$z->id}}"><img src="{{$z->fotos->base64 or ''}}" alt="Imagem" width="200"></a>
        <br/>
        <a href="../anuncio/{{$z->id}}">{{$z->titulo}}</a> // {{$z->descricao}}
        <br />Postado por: <b>{{$z->user->name or ''}}</b>
        <br />Data: <b>{{$z->user->created_at or ''}}</b>
        <br/>
        @auth
            {{-- {{$z->user_id}} - {{auth()->user()->id}}--}}
            @if(auth()->user()->id == $z->user_id)
                <a href="{{url ('user')}}/{{$z->id}}/edit">Editar</a> |

                <a href="{{url ('user')}}/{{$z->id}}/delete">Deletar</a>
            @endif
        @endauth
        <hr>
    @empty
        Não há registro!
    @endforelse
@endif
@if($usuario->tipo_id == "4")
    <hr>
    <h2>Minha Loja</h2>
    <hr>
    <h2>Meus Anuncios na plataforma</h2>
    @forelse($anuncio as $z)

        <a href="../anuncio/{{$z->id}}"><img src="{{$z->fotos->base64 or ''}}" alt="Imagem" width="200"></a>
        <br/>
        <a href="../anuncio/{{$z->id}}">{{$z->titulo}}</a> // {{$z->descricao}}
        <br />Postado por: <b>{{$z->user->name or ''}}</b>
        <br />Data: <b>{{$z->user->created_at or ''}}</b>
        <br/>
        @auth
           {{-- {{$z->user_id}} - {{auth()->user()->id}}--}}
            @if(auth()->user()->id == $z->user_id)
                <a href="{{url ('user')}}/{{$z->id}}/edit">Editar</a> |

                <a href="{{url ('user')}}/{{$z->id}}/destroy">Deletar</a>
            @endif
        @endauth
        <hr>
    @empty
        Não há registro!
    @endforelse
@endif
@if($anuncio)
    @if($anuncio->links())
        {!! $anuncio->links() !!}
    @else

    @endif
@endif

    </section>
        </main>
@endsection