@extends('layouts.app')

@section('content')

<div class="center info_cfg">

    @auth

    @if(auth()->user()->id == $usuario->user_id)
        @if($usuario->tipo_id == "2" || $usuario->tipo_id == "3")
            <h1 style="font-size: 2em">Meus Anuncios</h1>
        @endif
    @endif

        <h1 style="font-size: 2em">Meu Perfil</h1>
        <ul class="menu_u" style="margin-top:-25px;">
            <li class="text-right">
                <a title="Assinatura" class="botao cor_black" href="?pg=assinatura"><i class="fa fa-star fa-lg"></i> &nbsp; Assinatura </a>|

                <a title="Depoimento" class="botao cor_black" href="?pg=feedback"><i class="fa fa-list-alt  fa-lg"></i> &nbsp; Feedback </a>|

                <a title="Leilão" class="botao cor_black" href="?pg=leilao"><i class="fa fa-legal  fa-lg"></i> &nbsp; Leilão </a>|

                <a title="Configurações" class="botao cor_black" href="{{url('user')}}/{{$usuario->name}}/edit"><i class="fa fa-cog  fa-lg"></i> &nbsp; Configurações </a>

            </li>
        </ul>

    @endauth
</div>

<main class="conteudo">

    <section id="leiloes">
        <div class="user_anuncio">
            <img src="@if($usuario->foto_perfil == null) {{asset ('img/sem-foto.png')}} @else {{$usuario->foto_perfil}} @endif">
        </div>
        <div class="descricao_anuncio" style="margin-left:170px">
            <form id="form-user">
                {!! csrf_field() !!}
                <br/>
                <input type="text" class="form-control" name="name" value="{{$usuario->name}}">
                <input type="text" class="form-control" name="sobrenome" value="{{$usuario->sobrenome}}">
                <input type="text" class="form-control" name="email" value="{{$usuario->email}}">
                <input type="text" class="form-control" name="password" value="">
                <input type="text" class="form-control" name="cpf" value="{{$usuario->cpf}}">
                <input type="text" class="form-control" name="cnpj" value="{{$usuario->cnpj}}">
                <input type="text" class="form-control" name="telefone" value="{{$usuario->telefone}}">
                <input type="text" class="form-control" name="status" value="{{$usuario->status}}">
                <input type="text" class="form-control" name="loja_link" value="{{$usuario->loja_link}}">
                <input type="text" class="form-control" name="razao" value="{{$usuario->razao}}">
                <a class="btn btn-success" onclick="save('user', '{{url('user')}}');">
                    <i class="fa fa-save"></i> Salvar
                </a>
            </form>
        </div>
    </section>
    <section id="leiloes">
        @if(request()->route()->getName() == 'user.edit')
        <div class="user_anuncio">
            <img src="@if($usuario->foto_perfil == null) {{asset ('img/sem-foto.png')}} @else {{$usuario->foto_perfil}} @endif">
        </div>
        {{--<div class="descricao_anuncio" style="margin-left:170px">
            <form id="form-user"><br/>
                {!! csrf_field() !!}
                <input id="loja" type="text" class="form-control" name="loja_link" value="{{$usuario->loja_link}}">
                <input  type="text" class="form-control" name="email" value="{{$usuario->email}}">
                <input  type="text" class="form-control" name="name" value="{{$usuario->name}}">
                <a class="btn btn-success" onclick="save('user', '{{url('user')}}');"><i class="fa fa-save"></i>
                    Salvar
                </a>
            </form>
        </div>--}}
            @else
        <div class="user_anuncio">
            <img src="@if($usuario->foto_perfil == null) {{asset ('img/sem-foto.png')}} @else {{$usuario->foto_perfil}} @endif">
        </div>
        <div class="descricao_anuncio" style="margin-left:170px">
            <h3>Olá, sou {{$usuario->name}}</h3>
            @if($usuario->tipo_id == "2" || $usuario->tipo_id == "4")
                Sou Pessoa Jurídica
            @elseif($usuario->tipo_id == '3')
                Sou Pessoa Física
            @elseif($usuario->tipo_id == '1')
                Equipe da Tenon
                <p>{{$usuario->email}}</p>
            @endif
            @if($usuario->tipo_id == "4")
                <h1 style="font-size: 2em">Minha Loja</h1>
            @endif
        </div>
        @endif
    </section>
    @if(request()->route()->getName() == 'user.edit')
        @else
    @if($usuario->tipo_id == '1')

    @else
    <section id="default2">
        <div class="perfil_user_cat left cor_black">
        <h3>Anuncios do Vendedor</h3>
            <p>
                {{$usuario->anuncios->count()}} resultados
            </p>
            @if($usuario->tipo_id == "4")
                <p>
                    Membro Desde : <b>{{$usuario->created_at->format('d/m/Y')}}</b>
                </p>
                <p>
                    </p>Email : <b>{{$usuario->email}}</b>
                </p>
            @endif
        </div>
        <div class="perfil_user_anuncio right cor_black" style="width: 70%;padding:20px">
        @if(Auth::user())
            @if(auth()->user()->id == $usuario->user_id)
                @if($usuario->tipo_id == "2" || $usuario->tipo_id == "4")
                    <b>Pessoa Jurídica</b>
                @elseif($usuario->tipo_id == "3")
                    <b>Pessoa Física</b>
                @elseif($usuario->tipo_id == "1")
                    <b>Administrador</b>
                @endif
            @endif

            @if(auth()->user()->id == $usuario->user_id)
                @if($usuario->tipo_id == "3")
                    <br /> <hr>
                    Rua :<b>{{$usuario->endereco->rua or ''}}</b><br/>
                    CEP :<b>{{$usuario->endereco->cep or ''}}</b><br/>
                    Bairro :<b>{{$usuario->endereco->bairro or ''}}</b><br/>
                    Logradouro :<b>{{$usuario->endereco->logradouro or ''}}</b><br/>
                    Estado :<b>{{$usuario->endereco->uf_id->sigla or ''}}</b><br/>
                    <hr><h2>Meus Anuncios na plataforma</h2>
                    @forelse($anuncio as $z)

                        <a href="../anuncio/{{$z->id}}"><img src="{{$z->fotos->base64 or ''}}" alt="Imagem" width="200"></a>
                            <br/>
                            <a href="../anuncio/{{$z->id}}">{{$z->titulo}}</a> // {{$z->descricao}}
                            <br />Postado por: <b>{{$z->user->name or ''}}</b>
                            <br />Data: <b>{{$z->user->created_at or ''}}</b>
                        <br/>
                        @auth
                             {{$z->user_id}} - {{auth()->user()->id}}
                            @if(auth()->user()->id == $z->user_id)
                                <a href="{{url ('anuncio')}}/{{$z->id}}/edit">Editar</a> |

                                <a href="{{url ('anuncio')}}/{{$z->id}}/delete" class="delete">Deletar</a>
                            @endif

                        @endauth
                        <hr>
                    @empty
                        Não há registro!
                    @endforelse
                @endif
                @elseif($usuario->tipo_id == "2")
                   <hr>
                   <h2>Meus Anuncios na plataforma</h2>
                    <br/><br/>
                   @forelse($anuncio as $z)
                        <aside class="anuncios">
                            <div class="left" style="background-color: #f5f5f5;padding: 2px;border: 1px dotted #ccc">
                            <a href="../anuncio/{{$z->id}}"><img src="{{$z->fotos->base64 or ''}}" alt="Imagem" height="140px" width="200"></a>
                            </div>
                            <div style="height: 140px;margin-left:230px">
                                <h3 style="font-weight: 600;text-color:#000;">{{$z->titulo}}</h3>
                                 // {{$z->descricao}}
                            <br />Postado por: <b>{{$z->user->name or ''}}</b>
                            <br />Data: <b>{{$z->user->created_at or ''}}</b>
                            <br/><br/>
                            @auth
{{--
                                {{$z->user_id}} - {{auth()->user()->id}}
--}}
                                @if(auth()->user()->id == $z->user_id)
                                    <a class="cor_black" style="padding: 10px 20px;background-color: #2ab27b;border-color: #0d3625" href="{{url ('anuncio')}}/{{$z->id}}/edit">Editar</a> |

                                    <a class="cor_black" style="padding: 10px 20px;background-color: #f86c6b;border-color: #c7254e" href="{{url ('anuncio')}}/{{$z->id}}/delete" class="delete">Deletar</a>
                                @endif

                            @endauth</div>
                        </aside>
                       <hr class="style12">
                   @empty
                       Não há registro!
                   @endforelse

                @endif
                @elseif($usuario->tipo_id == "4")
                   @forelse($anuncio as $z)
                    <a href="../anuncio/{{$z->id}}"><img src="{{$z->fotos->base64 or ''}}" alt="Imagem" width="200"></a>
                    <div class="perfil_user_anuncio right cor_black" style="width: 70%;padding:20px;height: 137px">
                        <a href="../anuncio/{{$z->id}}" class="cor_black"><h4>{{$z->titulo}}</h4></a>// {{$z->descricao}}
                        <br />Postado por: <b>{{$z->user->name or ''}}</b>
                        <br />Data: <b>{{$z->user->created_at or ''}}</b>
                        @auth
                            {{-- {{$z->user_id}} - {{auth()->user()->id}}--}}
                            @if(auth()->user()->id == $usuario->user_id)
                                1
                                <a href="{{url ('anuncio')}}/{{$z->id}}/edit">Editar</a> |

                                <a href="{{url ('anuncio')}}/{{$z->id}}/delete" class="delete">Deletar</a>
                            @endif
                        @endauth
                    </div>
                    <hr class="style12">
                   @empty
                       Não há registro!
                   @endforelse

                   @else

                   <h1 class="text-center"><p>Loja não encontrada!</p></h1>

                   @endif

                   @if($anuncio)
                       @if($anuncio->links())
                           {!! $anuncio->links() !!}
                       @else

                       @endif
                   @endif
                 </div>
       </section>
    @endif
    @endif
   </main>
<script>

    function save(form, link) {
        var link = "{{url('user')}}/{{$usuario->name}}";
        var dataForm = $('#form-' + form).serialize();
        var metodo = 'POST';
        ajax(link, metodo, dataForm);
    }
    function ajax(link, metodo, dataForm) {
        jQuery.ajax({
            url: link,
            data: dataForm,
            cache: false,
            method: metodo,
        }).done(function (data) {

        }).fail(function () {

        });
    }

$(".delete").click(function() {
    alert("ALERTA SEU USUARIO.");
});
</script>
@endsection