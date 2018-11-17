@extends('layouts.app')
<script src="https://www.cssscript.com/demo/beautiful-native-javascript-alert-replacement-sweet-alert/lib/sweet-alert.js"></script>
<link rel="stylesheet" type="text/css" href="https://www.cssscript.com/demo/beautiful-native-javascript-alert-replacement-sweet-alert/lib/sweet-alert.css">
@section('content')
    <main class="conteudo">
    @auth
        <div class="info_cfg">
            @if(auth()->user()->tipo_id == "2" || auth()->user()->tipo_id == "3")
                <h1 style="font-size: 2em">Meus Anuncios</h1>
                <ul class="menu_u" style="margin-top:-25px;">
                    <li class="text-right">
                       {{-- <a title="Assinatura" class="botao cor_black" href="#"><i class="fa fa-star fa-lg"></i> &nbsp; Assinatura </a>|

                        <a title="Depoimento" class="botao cor_black" href="#"><i class="fa fa-list-alt  fa-lg"></i> &nbsp; Feedback </a>|

                        <a title="Leilão" class="botao cor_black" href="#"><i class="fa fa-legal  fa-lg"></i> &nbsp; Leilão </a>|
--}}
                        <a title="Configurações" class="botao cor_black" href="{{url('user')}}/{{auth()->user()->id}}/configuracao"><i class="fa fa-cog  fa-lg"></i> &nbsp; Configurações </a>

                    </li>
                </ul>
            @elseif(auth()->user()->tipo_id == "4")
                <h1 style="font-size: 2em">Minha Loja</h1>
                <ul class="menu_u" style="margin-top:-25px;">
                    <li class="text-right">
                        <a title="Assinatura" class="botao cor_black" href="#"><i class="fa fa-star fa-lg"></i> &nbsp; Assinatura </a>|

                        <a title="Depoimento" class="botao cor_black" href="#"><i class="fa fa-list-alt  fa-lg"></i> &nbsp; Feedback </a>|

                        <a title="Leilão" class="botao cor_black" href="#"><i class="fa fa-legal  fa-lg"></i> &nbsp; Leilão </a>|

                        <a title="Configurações" class="botao cor_black" href="{{url('user')}}/{{auth()->user()->id}}/configuracao"><i class="fa fa-cog  fa-lg"></i> &nbsp; Configurações </a>

                    </li>
                </ul>
            @elseif(auth()->user()->tipo_id == '1')
                <{{--h1 style="font-size: 2em">Anuncios</h1>
                    <ul class="menu_u" style="margin-top:-25px;">
                        <li class="text-right">
                            <a title="Assinatura" class="botao cor_black" href="{{url('user')}}"><i class="fa fa-group fa-lg"></i> &nbsp; Usuários </a> &nbsp;|
                            <a title="Usuários" class="botao cor_black" href="{{url('user')}}/"><i class="fa fa-legal  fa-lg"></i> &nbsp; Leilão </a> &nbsp;|
                            <a title="Anúncios" class="botao cor_black" href="{{url('user')}}/{{auth()->user()->id}}"><i class="fa fa-bullhorn  fa-lg"></i> &nbsp; Anúncios </a> &nbsp;|
                            <a title="Configurações" class="botao cor_black" href="config"><i class="fa fa-cog  fa-lg"></i> Configurações </a>
                        </li>
                    </ul>--}}
            @endif
        </div>
        <div class="text-center @if(auth()->user()->status_id == '1') notify2 @elseif(auth()->user()->status_id == '0') notify @else notify3 @endif cor_black"  id="alerta" style="margin-top:10px;">
            @if(auth()->user()->status_id == '1')
                Parabéns <b>{{auth()->user()->name }}</b> você está <b>Ativado</b> :)
            @elseif(auth()->user()->status_id == '0')
                Desculpe <b>{{auth()->user()->name }}</b> sua conta  está <b>Pendente</b>!!
                <div class="text-center" id="sucesso" style="display:none;margin-bottom:10px;padding:20px;background-color: #63d3f8;border:1px solid #18aecb">
                </div>
            @else
                Desculpe <b>{{auth()->user()->name }}</b> sua conta  está <b>Bloqueada</b>!!
            @endif
        </div>
        @if(auth()->user()->status_id == '1' and auth()->user()->id == $data->id)
            {{--@if($usuario->tipo_id == '2' || $usuario->loja_link == null)
                <div class="text-center notify cor_black">
                    Notamos que você não personalizou o seu link de acesso para a sua loja virtual, faça agora mesmo <b>clique aqui</b>
                </div>
            @endif--}}
    @endauth
        {{--<section id="leiloes">
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
        </section>--}}
        @if(auth()->user()->status_id == '1')
           {{-- <section id="leiloes">
                <div class="user_anuncio fade" style="width:150px;height: 150px">
                    <a href="{{url('user')}}/{{auth()->user()->id}}">
                        --}}{{--
                            <img src="{{$z->fotos->base64 or '../img/image.jpeg'}}" alt="Imagem">
                        --}}{{--
                        <img src="@if(auth()->user()->foto_perfil == null) {{asset ('img/sem-foto.png')}} @else {{auth()->user()->foto_perfil}} @endif">
                    </a>
                </div>
                    --}}{{--<div class="descricao_anuncio" style="margin-left:170px">
                        <h3>Oi, {{auth()->user()->name}}</h3>
                        @if(auth()->user()->tipo_id == "2" || auth()->user()->tipo_id == "4")
                            Pessoa Jurídica
                            <form>
                                <input type="text" value="{{auth()->user()->name}}">
                                <input type="submit" value="enviar">
                            </form>
                        @elseif(auth()->user()->tipo_id == '3')
                            Pessoa Física
                        @elseif(auth()->user()->tipo_id == '1')
                            Equipe da Tenon
                            <p>{{auth()->user()->email}}</p>
                        @endif
                        @if(auth()->user()->tipo_id == "4")
                            <h1 style="font-size: 2em">Minha Loja</h1>
                        @endif
                    </div>--}}{{--
            </section>--}}
            {{--<section id="default2">
                <div class="perfil_user_cat left cor_black">
                    <h3>Total de Anuncios</h3>
                    <p style="margin:20px">
                    <h5 style="background-color: #96caff;padding: 10px 0px 10px 0px ;margin:3px 0px 3px 0px;border-radius:3px;"><span style="background-color: #f5f5f5;border:1px dotted #e5e5e5;padding: 15px;margin:1px 5px;border-radius:3px"><b>{{\App\Models\Anuncio::onlyTrashed()->count() + \App\Models\Anuncio::all()->count()}}</b></span>Total</h5>
                    </p>
                    @if(auth()->user()->tipo_id == '1')
                        <p style="margin:20px">
                        <h5 style="background-color: #c596ff;padding: 10px 0px 10px 0px ;margin:3px 0px 3px 0px;border-radius:3px;"><span style="background-color: #f5f5f5;border:1px dotted #e5e5e5;padding: 15px;margin:1px 5px;border-radius:3px"><b>{{\App\Models\Anuncio::where('status_pagamento', 1)->count()}}</b> </span> Premium</h5>
                        </p>
                        <p style="margin:20px">
                        <h5 style="background-color: #f49c9c;padding: 10px 0px 10px 0px ;margin:3px 0px 3px 0px;border-radius:3px;"><span style="background-color: #f5f5f5;border:1px dotted #e5e5e5;padding: 15px;margin:1px 5px;border-radius:3px"><b>{{\App\Models\Anuncio::where('status', 0)->count()}}</b> </span> Desativado</h5>
                        </p>
                        <p style="margin:20px">
                        <h5 style="background-color: #24f489;padding: 10px 0px 10px 0px ;margin:3px 0px 3px 0px;border-radius:3px;"><span style="background-color: #f5f5f5;border:1px dotted #e5e5e5;padding: 15px;margin:1px 5px;border-radius:3px"><b>{{\App\Models\Anuncio::where('status', 1)->count()}}</b> </span> Ativado</h5>
                        </p>
                        <p style="margin:20px">
                        <h5 style="background-color: #ffc863;padding: 10px 0px 10px 0px ;margin:3px 0px 3px 0px;border-radius:3px;"><span style="background-color: #f5f5f5;border:1px dotted #e5e5e5;padding: 15px;margin:1px 5px;border-radius:3px"><b>{{\App\Models\Anuncio::where('status', 2)->count()}}</b> </span> Pendente</h5>
                        </p>
                        <p style="margin:20px">
                        <h5 style="background-color: #fc6464;padding: 10px 0px 10px 0px ;margin:3px 0px 3px 0px;border-radius:3px;"><span style="background-color: #f5f5f5;border:1px dotted #e5e5e5;padding: 15px;margin:1px 5px;border-radius:3px"><b>{{\App\Models\Anuncio::onlyTrashed()->count()}}</b> </span> Deletados</h5>
                        </p>
                    @endif
                </div>
                <div class="perfil_user_anuncio right cor_black" style="width: 70%;padding:20px">
                    @forelse(\App\Models\Anuncio::all() as $z)
                        <aside class="anuncios">
8                            <div class="left" style="background-color: #f5f5f5;padding: 2px;border: 1px dotted #ccc">
                                <div class="foto fade" style="width:250px;height: 160px;">
                                    <a href="{{url('anuncio')}}/{{$z->id}}">
                                        --}}{{--   <img src="{{$z->fotos->base64 or '../img/image.jpeg'}}" alt="Imagem">
                                          --}}{{--
                                        <span class="hidden" style="display: none">{{$aa = 0}}</span>
                                        @forelse($z->album as $x)
                                            @if($x->base64 == null)
                                            @else
                                                <span class="hidden" style="display: none">{{$aa = 1}}</span>
                                                <img src="{{$x->base64}}" alt="Imagem">
                                                @break
                                            @endif
                                        @empty
                                            <img src="{{'../img/image.jpeg'}}" alt="Imagem">
                                        @endforelse
                                        @if($aa == 0)
                                            <img src="{{'../img/image.jpeg'}}" alt="Imagem">
                                        @endif
                                    </a>
                                </div>
--}}{{--
                                <a href="../anuncio/{{$z->id}}"><img src="{{$z->fotos->base64 or '../img/image.jpeg'}}" alt="Imagem" height="130px" width="200"></a>
--}}{{--
                            </div>
                            <div style="height: 140px;margin-left:230px">
                                <h3 style="font-weight: 600;text-color:#000;">{{$z->titulo}}</h3>
                                // {{$z->descricao}}
                                <br />Postado por: <b>{{$z->user->name or ''}}</b>
                                <br />Data: <b>{{$z->user->created_at or ''}}</b>
                                <br/><br/>
                                --}}{{--{{$z->user_id}} - {{auth()->user()->id}}--}}{{--
                                <a class="cor_black" style="padding: 10px 20px;background-color: #2ab27b;border:1px solid #f4f4f4" href="{{url ('anuncio')}}/{{$z->id}}/edit">Editar</a>
                                @if($z->premium == 1)
                                    |<a class="cor_black" style="padding: 10px 20px;background-color: #c596ff;border:1px solid #f4f4f4" href="#">Premium</a>
                                @endif
                                @if(auth()->user()->tipo_id == '1')
                                @if($z->status_id == 0)
                                    | <a class="cor_black" style="padding: 10px 20px;background-color: #24f489;border:1px solid #f4f4f4" href="{{url ('anuncio')}}/{{$z->id}}/update?status=1">Ativar</a>
                                @elseif($z->status_id == 1)
                                    | <a class="cor_black" style="padding: 10px 20px;background-color: #ffc863;border:1px solid #f4f4f4" href="{{url ('anuncio')}}/{{$z->id}}/update?status=0">Desativar</a>
                                    --}}{{--
                                      <a class="cor_black" style="padding: 10px 20px;background-color: #ffc863;border:1px solid #e5e5e5" href="{{url ('anuncio')}}/{{$z->id}}/edit">Pendente</a> |
                                    --}}{{--
                                @endif
                                @elseif($z->status_id == 2)
                                    | <a class="cor_black" style="padding: 10px 20px;background-color: #24f489;border:1px solid #f4f4f4" href="{{url ('anuncio')}}/{{$z->id}}/update?status=1">Ativar</a>
                                @endif
                                @if($z->status_id == 1)
                                @else
                                    | <a class="cor_black" style="padding: 10px 20px;background-color: #f86c6b;border:1px solid #f4f4f4" href="{{url ('anuncio')}}/{{$z->id}}/delete" class="delete">Deletar</a>
                                @endif
                            </div>
                        </aside>
                        <hr class="style12">
                    @empty
                        Não há registro!
                    @endforelse
--}}{{--
                    @if($anuncio)
                        @if($anuncio->links())
                            {!! $anuncio->links() !!}
                        @else

                        @endif
                    @endif--}}{{--
                </div>
            </section>--}}

            @if(auth()->user()->tipo_id == '1')
            @elseif(auth()->user()->tipo_id  == '2')
            <section id="destaque">
                <div class="perfil_user_cat left cor_black">
                    <h3>Total de Anuncios</h3>
                    <p style="margin:20px">
                    <h5 style="background-color: #96caff;padding: 10px 0px 10px 0px ;margin:3px 0px 3px 0px;border-radius:3px;"><span style="background-color: #f5f5f5;border:1px dotted #e5e5e5;padding: 15px;margin:1px 5px;border-radius:3px"><b>{{\App\Models\Anuncio::withTrashed()->where('user_id', auth()->user()->id)->count() + \App\Models\Anuncio::where('user_id', auth()->user()->id)->where('status_id', 0)->where('status_id', 1)->where('status_id', 2)->where('status_id', 3)->count()}}</b></span>Total</h5>
                    </p>
                    @if(auth()->user())
                        <p style="margin:20px">
                        <h5 style="background-color: #c596ff;padding: 10px 0px 10px 0px ;margin:3px 0px 3px 0px;border-radius:3px;"><span style="background-color: #f5f5f5;border:1px dotted #e5e5e5;padding: 15px;margin:1px 5px;border-radius:3px"><b>{{\App\Models\Anuncio::where('user_id', auth()->user()->id)->where('premium', 1)->count()}}</b> </span> Premium</h5>
                        </p>
                        <p style="margin:20px">
                        <h5 style="background-color: #f49c9c;padding: 10px 0px 10px 0px ;margin:3px 0px 3px 0px;border-radius:3px;"><span style="background-color: #f5f5f5;border:1px dotted #e5e5e5;padding: 15px;margin:1px 5px;border-radius:3px"><b>{{\App\Models\Anuncio::where('user_id', auth()->user()->id)->where('status_id', 0)->count()}}</b> </span> Desativado</h5>
                        </p>
                        <p style="margin:20px">
                        <h5 style="background-color: #24f489;padding: 10px 0px 10px 0px ;margin:3px 0px 3px 0px;border-radius:3px;"><span style="background-color: #f5f5f5;border:1px dotted #e5e5e5;padding: 15px;margin:1px 5px;border-radius:3px"><b>{{\App\Models\Anuncio::where('user_id', auth()->user()->id)->where('status_id', 1)->count()}}</b> </span> Ativado</h5>
                        </p>
                        <p style="margin:20px">
                        <h5 style="background-color: #ffc863;padding: 10px 0px 10px 0px ;margin:3px 0px 3px 0px;border-radius:3px;"><span style="background-color: #f5f5f5;border:1px dotted #e5e5e5;padding: 15px;margin:1px 5px;border-radius:3px"><b>{{\App\Models\Anuncio::where('user_id', auth()->user()->id)->where('status_id', 2)->count()}}</b> </span> Pendente</h5>
                        </p>
                        <p style="margin:20px">
                        <h5 style="background-color: #fc6464;padding: 10px 0px 10px 0px ;margin:3px 0px 3px 0px;border-radius:3px;"><span style="background-color: #f5f5f5;border:1px dotted #e5e5e5;padding: 15px;margin:1px 5px;border-radius:3px"><b>{{\App\Models\Anuncio::onlyTrashed()->where('user_id', auth()->user()->id)->count()}}</b> </span> Deletados</h5>
                        </p>
                    @endif
                </div>
                <div class="perfil_user_anuncio right cor_black" id="pendente" style="width: 80%;padding:20px">
                    <div class="sub_anuncio"><i class="fa fa-clock-o" style="font-size:18px"></i> Anúncios Pendentes
                    <p style="font-size:1em;margin-top:-7px;margin-right:-20px;padding:7px;float: right;background-color: #d9d9d9">Total <b>{{\App\Models\Anuncio::all()->where('user_id', auth()->user()->id)->where('status_id', 0)->count()}}</b></p>
                    </div>
                    @forelse(\App\Models\Anuncio::all()->where('user_id', auth()->user()->id)->where('status_id', 0) as $z)
                        <aside class="anuncios">
                            <div style="position:relative;float:left;width:100%;padding-right: 2px;">
                                <div class="foto fade" style="margin-bottom:0px;margin-right:10px;width:250px;height: 160px;position:relative;float:left;">
                                        <img src="{{url('app/media/anuncio')}}/{{$z->fotos->base64 or 'image.jpeg'}}" alt="Imagem">
                                </div>
                                <h3 style="font-weight: 600;margin-top:5px;">{{$z->titulo}}</h3>
                                    <p style="height: 102px;">// {{str_limit($z->descricao, 200)}}
                                    </p>
                                        {{--{{$z->user_id}} - {{auth()->user()->id}}--}}


                                <a class="cor_black" style="font-size:12px;padding: 5px 10px;background-color: #ffc863;border-radius:3px">Pendente</a>
                                {{--<a class="cor_black" style="font-size:12px;padding: 5px 10px;background-color: #2ab27b;border-radius:3px" href="{{url ('anuncio')}}/{{$z->id}}/edit">Editar</a> |--}}

{{--
                                        <a class="cor_black delete" style="font-size:12px;padding: 5px 10px;background-color: #f86c6b;border-radius:3px" href="{{url ('anuncio')}}/{{$z->id}}/delete">Deletar</a>
--}}
                                <div class="right">
                                    <a class="cor_black" style="float:right;font-size:12px;padding: 5px 10px;background-color: #f5f5f5;border-radius:3px"> Postado em: <b>{{$z->user->created_at->format('d/m/Y')}} às {{$z->user->created_at->format('H:i')}}</a>
                                </div>
                            </div>

                        </aside>
                        <hr class="style12">
                    @empty

                           <div class="text-center" style="position:relative;float:right;padding: 10px;width:100%;background-color: #f4f4f4;"> Não há registro!</div>
                    @endforelse
                    {{--
                        @if($anuncio)
                        @if($anuncio->links())
                            {!! $anuncio->links() !!}
                        @else

                        @endif
                        @endif
                     --}}
                </div>

                <div class="perfil_user_anuncio right cor_black" style="width: 80%;padding:20px">
                    <div class="sub_anuncio"><i class="fa fa-check" style="font-size:18px"></i> Anúncios Ativos
                    <p style="font-size:1em;margin-top:-7px;margin-right:-20px;padding:7px;float: right;background-color: #d9d9d9">Total <b>{{\App\Models\Anuncio::all()->where('user_id', auth()->user()->id)->where('status_id', 1)->count()}}</b></p>
                    </div>
                @forelse(\App\Models\Anuncio::all()->where('user_id', auth()->user()->id)->where('status_id', 1)->where('status_pagamento', 1) as $z)
                        <aside class="anuncios">
                                <div class="wrapper">

                                    <div class="ribbon-wrapper-green">

                                        <div class="ribbon-green"><i class="fa fa-star"></i> </div>

                                    </div>

                                </div>
                            <div style="position:relative;float:left;width:100%;padding-right: 2px;">
                               {{-- <div style="margin-right:20px;height:100%;;width:auto;max-width:200px;padding: 2px;border: 1px dotted #ccc">
                                    <a href="../anuncio/{{$z->id}}">
                                        <img src="{{url('app/media/anuncio')}}/{{$z->fotos->base64 or 'image.jpeg'}}" alt="Imagem">
                                    </a>
                                </div>--}}
                                <div class="foto fade" style="margin-bottom:0px;margin-right:10px;position:relative;float:left;;width:250px;height: 160px;">
                                    <a href="{{url('anuncio')}}/{{$z->id}}">
                                        <img src="{{url('app/media/anuncio')}}/{{$z->fotos->base64 or 'image.jpeg'}}" alt="Imagem">
                                    </a>
                                </div>
                                <h3 style="font-weight: 600;margin-top:5px;">{{$z->titulo}}</h3>
                                <p style="height: 102px;">// {{str_limit($z->descricao->descricao, 200)}}</p>
                                {{--{{$z->user_id}} - {{auth()->user()->id}}--}}


                                <a class="cor_black" style="font-size:12px;padding: 5px 10px;background-color: #2ab27b;border-radius:3px" href="{{url ('anuncio')}}/{{$z->id}}/edit">Editar</a> |
                                <a class="cor_black" style="font-size:12px;padding: 5px 10px;background-color: #c596ff;border-radius:3px">Premium</a> |
                                <a class="cor_black delete" style="font-size:12px;padding: 5px 10px;background-color: #f86c6b;border-radius:3px" href="{{url ('anuncio')}}/{{$z->id}}/delete">Deletar</a>
                                <div class="right">
                                    <a class="cor_black" style="float:right;font-size:12px;padding: 5px 10px;background-color: #f5f5f5;border-radius:3px"> Postado em: <b>{{$z->user->created_at->format('d/m/Y')}} às {{$z->user->created_at->format('H:i')}}</a>
                                </div>
                            </div>

                        </aside>
                        <hr class="style12">
                    @empty
                    @endforelse

                    @forelse(\App\Models\Anuncio::all()->where('user_id', auth()->user()->id)->where('status_id', 1)->where('status_pagamento', 0) as $z)
                        <aside class="anuncios">
                            <div style="position:relative;float:left;width:100%;padding-right: 2px;">
                                {{-- <div style="margin-right:20px;height:100%;;width:auto;max-width:200px;padding: 2px;border: 1px dotted #ccc">
                                     <a href="../anuncio/{{$z->id}}">
                                         <img src="{{url('app/media/anuncio')}}/{{$z->fotos->base64 or 'image.jpeg'}}" alt="Imagem">
                                     </a>
                                 </div>--}}
                                <div class="foto fade" style="margin-bottom:0px;margin-right:10px;position:relative;float:left;;width:250px;height: 160px;">
                                    <a href="{{url('anuncio')}}/{{$z->id}}">
                                        <img src="{{url('app/media/anuncio')}}/{{$z->fotos->base64 or 'image.jpeg'}}" alt="Imagem">
                                    </a>
                                </div>
                                <h3 style="font-weight: 600;margin-top:5px;">{{$z->titulo}}</h3>
                                <p style="height: 102px;">// {{str_limit($z->descricao->descricao, 200)}}</p>
                                {{--{{$z->user_id}} - {{auth()->user()->id}}--}}


                                <a class="cor_black" style="font-size:12px;padding: 5px 10px;background-color: #2ab27b;border-radius:3px" href="{{url ('anuncio')}}/{{$z->id}}/editar">Editar</a> |

                                <a class="cor_black delete" style="font-size:12px;padding: 5px 10px;background-color: #f86c6b;border-radius:3px" href="{{url ('anuncio')}}/{{$z->id}}/delete">Deletar</a>
                                <div class="right">
                                    <a class="cor_black" style="float:right;font-size:12px;padding: 5px 10px;background-color: #f5f5f5;border-radius:3px"> Postado em: <b>{{$z->user->created_at->format('d/m/Y')}} às {{$z->user->created_at->format('H:i')}}</a>
                                </div>
                            </div>

                        </aside>
                        <hr class="style12">
                    @empty
                        @if(\App\Models\Anuncio::all()->where('user_id', auth()->user()->id)->where('status_id', 1)->count() == 0)
                            <div class="text-center" style="position:relative;float:right;padding: 10px;width:100%;background-color: #f4f4f4;"> Não há registro!</div>
                            @else
                        @endif
                    @endforelse
                    {{--
                        @if($anuncio)
                        @if($anuncio->links())
                            {!! $anuncio->links() !!}
                        @else

                        @endif
                        @endif
                     --}}
                </div>
            </section>
        @elseif(auth()->user()->tipo_id == '3')

        @elseif(auth()->user()->status_id == '0')
            autenticado & pendente
        @elseif(auth()->user()->status_id == '2')

        @else

        @endif


        {{--@elseif(auth()->user()->tipo_id == "4")
            @forelse($anuncio as $z)
                <a href="../anuncio/{{$z->id}}"><img src="{{$z->fotos->base64 or ''}}" alt="Imagem" width="200"></a>
                <div class="perfil_user_anuncio right cor_black" style="width: 70%;padding:20px;height: 137px">
                <a href="../anuncio/{{$z->id}}" class="cor_black"><h4>{{$z->titulo}}</h4></a>// {{$z->descricao}}
                <br />Postado por: <b>{{$z->user->name or ''}}</b>
                <br />Data: <b>{{$z->user->created_at or ''}}</b>
                 {{$z->user_id}} - {{auth()->user()->id}}
            @if(auth()->user()->id == $usuario->user_id)
                <a href="{{url ('anuncio')}}/{{$z->id}}/edit">Editar</a> |
                <a href="{{url ('anuncio')}}/{{$z->id}}/delete" class="delete">Deletar</a>
            @endif
            </div>
            <hr class="style12">
            @empty
               Não há registro!
            @endforelse
             <h1 class="text-center"><p>Loja não encontrada!</p></h1>
            @if($anuncio)
               @if($anuncio->links())
                   {!! $anuncio->links() !!}
               @else

               @endif
            @endif
        @endif--}}
        {{--<section id="default2">
            <div class="perfil_user_cat left cor_black">
            <h3>Anuncios do Vendedor</h3>
                <p>
                    {{$usuario->anuncios->count()}} resultados
                </p>
                <p>
                    {{\App\Models\Anuncio::withTrashed()->where('user_id', auth()->user()->id)->count()}} deletados
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
                --}}{{--@if(auth()->user()->id == $usuario->id)
                    @if($usuario->tipo_id == "2" || $usuario->tipo_id == "4")
                        <b>Pessoa Jurídica</b>
                    @elseif($usuario->tipo_id == "3")
                        <b>Pessoa Física</b>
                    @elseif($usuario->tipo_id == "1")
                        <b>Administrador</b>
                    @endif
                @endif--}}{{--

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
                       <h2>Meus Anuncios</h2>
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
    --}}{{--
                                    {{$z->user_id}} - {{auth()->user()->id}}
    --}}{{--
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
                                --}}{{-- {{$z->user_id}} - {{auth()->user()->id}}--}}{{--
                                @if(auth()->user()->id == $usuario->user_id)
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
           </section>--}}
        @endif
        @else
        <div class="text-center @if($data->status_id == '0') notify @elseif($data->status_id == '2') notify3 @endif cor_black"  style="margin-top:10px;">
            @if($data->status_id == '0')
                Desculpe esta conta ainda está <b>Pendente</b>, volte mais tarde!!
                <div class="text-center" id="sucesso" style="display:none;margin-bottom:10px;padding:20px;background-color: #63d3f8;border:1px solid #18aecb">
                </div>
            @elseif($data->status_id == '2')
                Desculpe esta conta foi <b>Bloqueada</b>!!
            @endif
        </div>
        @if($data->status_id == '1')
        <section id="leiloes">
            <div class="user_anuncio">
                <img src="@if($data->foto_perfil == null) {{asset ('img/sem-foto.png')}} @else {{$data->foto_perfil}} @endif">
            </div>
            <div class="descricao_anuncio" style="margin-left:170px">
                <h3>Olá, sou {{$data->name}}</h3>
                @if($data->tipo_id == "2" || $data->tipo_id == "4")
                    Pessoa Jurídica
                    <form>
                        <input type="text" value="{{$data->name}}">
                        <input type="submit" value="enviar">
                    </form>
                @elseif($data->tipo_id == '3')
                    Pessoa Física
                @elseif($data->tipo_id == '1')
                    Equipe da Tenon
                    <p>{{$data->email}}</p>
                @endif
                @if($data->tipo_id == "4")
                    <h1 style="font-size: 2em">Minha Loja</h1>
                @endif
            </div>
        </section>
        @endif
   @endif
</main>
<script>

    function save(form, link) {
        var link = "{{url('user')}}/{{$data->id}}";
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
    swal("Certo!", "Anuncio removido com sucesso!!", "success")
    var time = 10;
    setInterval(function(){
        if(time >= 0){
            document.getElementById('countdown').innerHTML = time--;
        }
    }, 10000);
});
</script>
@endsection