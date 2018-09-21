@extends('layouts.app')

@section('content')
    <div class="center info_cfg">
        @if(auth()->user()->tipo_id == '1')
        <h1 style="font-size: 2em">Usuários</h1>
            <ul class="menu_u" style="margin-top:-25px;">
                <li class="text-right">
                    <a title="Assinatura" class="botao cor_black" href="{{url('user')}}"><i class="fa fa-group fa-lg"></i> &nbsp; Usuários </a> &nbsp;|
                    <a title="Usuários" class="botao cor_black" href="{{url('#')}}"><i class="fa fa-legal  fa-lg"></i> &nbsp; Leilão </a> &nbsp;|
                    <a title="Anúncios" class="botao cor_black" href="{{url('user')}}/{{auth()->user()->id}}"><i class="fa fa-bullhorn  fa-lg"></i> &nbsp; Anúncios </a> &nbsp;|
                    <a title="Configurações" class="botao cor_black" href="config"><i class="fa fa-cog  fa-lg"></i> Configurações </a>
                </li>
            </ul>
        @endif
    </div>
    <main class="conteudo">
          {{--  <section id="leiloes">
                    <div class="user_anuncio">
                        <img src="@if(auth()->user()->foto_perfil == null) {{asset ('img/sem-foto.png')}} @else {{auth()->user()->foto_perfil}} @endif">
                    </div>
                    <div class="descricao_anuncio" style="margin-left:170px">
                        <h3>Olá, sou {{auth()->user()->name}}</h3>
                            Pessoa Jurídica
                    </div>
            </section>--}}
            @if(auth()->user()->tipo_id == '1')
                <section id="default2">
                    <div class="perfil_user_cat left cor_black">
                        <h3>Total de Anuncios</h3>

                        <p style="margin:20px">
                            <h5 style="border:2px solid #f4f4f4;background-color: #96caff;padding: 10px 0px 10px 0px"><span style="background-color: #f5f5f5;border:1px dotted #f4f4f4;padding: 12px;margin:1px 5px"><b>{{\App\User::onlyTrashed()->count() + \App\User::all()->count()}}</b></span>Total</h5>
                        </p>

                        <p style="margin:20px">
                            <h5 style="border:1px solid #e5e5e5;background-color: #cccccc;padding: 10px 0px 10px 0px"><span style="background-color: #f5f5f5;border:1px dotted #f4f4f4;padding: 12px;margin:1px 5px"><b>{{\App\User::where('tipo_id', '1')->count()}}</b></span> ADM</h5>
                        </p>

                        <p style="margin:20px">
                            <h5 style="border:2px solid #f4f4f4;background-color: #f49c9c;padding: 10px 0px 10px 0px"><span style="background-color: #f5f5f5;border:1px dotted #f4f4f4;padding: 12px;margin:1px 5px"><b>{{\App\User::where('status', '2')->count()}}</b></span> Bloqueado</h5>
                        </p>

                        <p style="margin:20px">
                            <h5 style="border:2px solid #e5e5e5;background-color: #24f489;padding: 10px 0px 10px 0px"><span style="background-color: #f5f5f5;border:1px dotted #f4f4f4;padding: 12px;margin:1px 5px"><b>{{\App\User::where('status', '1')->count()}}</b></span> Ativado</h5>
                        </p>

                        <p style="margin:20px">
                            <h5 style="border:2px solid #f4f4f4;background-color: #ffc863;padding: 10px 0px 10px 0px"><span style="background-color: #f5f5f5;border:1px dotted #f4f4f4;padding: 12px;margin:1px 5px"><b>{{\App\User::where('status', '0')->count()}}</b></span> Pendente</h5>
                        </p>

                        <p style="margin:20px">
                            <h5 style="border:2px solid #f4f4f4;background-color: #fc6464;padding: 10px 0px 10px 0px"><span style="background-color: #f5f5f5;border:1px dotted #f4f4f4;padding: 12px;margin:1px 5px"><b>{{\App\User::onlyTrashed()->count()}}</b></span> Deletados</h5>
                        </p>

                    </div>
                    <div class="perfil_user_anuncio right cor_black" style="width: 70%;padding:20px">
                        @forelse($usuario as $z)
                            <aside class="anuncios">
                                <div class="left" style="padding: 2px;border: 1px dotted #ccc">
                                    <div class="user_anuncio fade" style="width:130px;height:130px">
                                        <a href="{{url('user')}}/{{$z->id}}">
                                            {{--
                                                <img src="{{$value->fotos->base64 or '../img/image.jpeg'}}" alt="Imagem">
                                            --}}
                                            <img src="@if($z->foto_perfil == null) {{asset ('img/sem-foto.png')}} @else {{$z->foto_perfil}} @endif">
                                        </a>
                                    </div>
                                </div>
                                    <div style="height: 140px;margin-left:230px">
                                    <h3 style="font-weight: 600;text-color:#000;">{{$z->name or ''}}</h3>
                                        <p>//Nível de Usuario<b> @if($z->tipo_id == 1) Administrador @elseif($z->tipo_id == 2) Pessoa Física @elseif($z->tipo_id == 3) Logista @endif </p>
                                        <p> //Status do Usuario<b> @if($z->status == 1) Ativado @elseif($z->status == 0) Desativado @elseif($z->status == 3) Banido @endif </p>
                                        <p> Cadastrado em :<b>{{$z->created_at or ''}}</b> </p>
                                    <br/><br/>
                                    {{--{{$z->user_id}} - {{auth()->user()->id}}--}}
                                        <a class="cor_black" style="border-radius:5px;padding: 10px 20px;background-color: #2ab27b;border:2px solid #f4f4f4" href="{{url ('user')}}/{{$z->id}}/edit">Editar</a> |
                                    @if($z->premium == 1)
                                        <a class="cor_black" style="border-radius:5px;padding: 10px 20px;background-color: #c596ff;border:2px solid #f4f4f4" href="#">Premium</a> |
                                    @endif
                                    @if($z->status == '0')
                                        <a class="cor_black" style="border-radius:5px;padding: 10px 20px;background-color: #24f489;border:2px solid #f4f4f4" href="{{url ('user')}}/{{$z->id}}/update?status=1">Ativar</a> |
                                        <a class="cor_black" style="border-radius:5px;padding: 10px 20px;background-color: #f86c6b;border:2px solid #f4f4f4" href="{{url ('user')}}/{{$z->id}}/delete" class="delete">Deletar</a>
                                        @elseif($z->status == '1')
                                        <a class="cor_black" style="border-radius:5px;padding: 10px 20px;background-color: #ffc863;border:2px solid #f4f4f4" href="{{url ('user')}}/{{$z->id}}/update?status=0">Desativar</a>
                                        {{--
                                        <a class="cor_black" style="padding: 10px 20px;background-color: #ffc863;border:1px solid #e5e5e5" href="{{url ('anuncio')}}/{{$z->id}}/edit">Pendente</a> |
                                        --}}
                                    @elseif($z->status == '0')
                                        <a class="cor_black" style="border-radius:5px;padding: 10px 20px;background-color: #24f489;border:2px solid #f4f4f4" href="{{url ('user')}}/{{$z->id}}/update?status=1">Ativar</a> |
                                    @endif
                                    @if($z->status == '2')
                                        <a class="cor_black" style="border-radius:5px;padding: 10px 20px;background-color: #24f489;border:2px solid #f4f4f4" href="{{url ('user')}}/{{$z->id}}/update?status=1">Ativar</a> |
                                        <a class="cor_black" style="border-radius:5px;padding: 10px 20px;background-color: #f86c6b;border:2px solid #f4f4f4" href="{{url ('user')}}/{{$z->id}}/delete" class="delete">Deletar</a>
                                    @endif
                                </div>
                            </aside>
                            <hr class="style12">
                        @empty
                            Não há registro!
                        @endforelse

                    </div>
                </section>
            @endif

        <section id="leiloes">
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
        </section>
    </main>

@endsection