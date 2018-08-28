@extends('layouts.app')

@section('content')
@if (Request::path() == 'anuncio')
...
@endif
@if(Request::segment(1) == 'config/anuncio')
//Suas instruções aqui
@endif
<div class="center info_cfg">
    <h1 style="font-size: 2em">Configurações</h1>
    <ul class="menu_u" style="margin-top:-25px;">
        <li class="text-right">
            <a title="Assinatura" class="botao cor_black" href="{{url('user')}}"><i class="fa fa-group fa-lg"></i> &nbsp; Usuários </a> &nbsp;|
            <a title="Usuários" class="botao cor_black" href="{{url('#')}}"><i class="fa fa-legal  fa-lg"></i> &nbsp; Leilão </a> &nbsp;|
            <a title="Anúncios" class="botao cor_black" href="{{url('user')}}/{{auth()->user()->id}}"><i class="fa fa-bullhorn  fa-lg"></i> &nbsp; Anúncios </a> &nbsp;|
            <a title="Configurações" class="botao cor_black" href="config"><i class="fa fa-cog  fa-lg"></i> Configurações </a>
        </li>
    </ul>
</div>
<main class="conteudo">
    <section id="leiloes">
    </section>
    <section id="default2">
        <div class="perfil_user_cat left cor_black">
            <h3>Menu Administrador</h3>
            <a href="#" class="cor_black" style="margin:20px">
                <h5 style="border:1px solid #e5e5e5;background-color: #cccccc;padding: 10px 0px 10px 0px"><span style="background-color: #f5f5f5;border:1px dotted #f4f4f4;padding: 8px;margin:1px 5px"><b>{{\App\User::where('tipo_id', '1')->count()}}</b></span> Usuários</h5>
            </a>
        </div>
        <div class="perfil_user_anuncio right cor_black" style="width: 70%;padding:20px">
            <aside class="anuncios">
                <div class="left" style="padding: 2px;border: 1px dotted #ccc">
                    <div class="user_anuncio fade" style="width:130px;height:130px">
                        <a href="">
                            {{--
                            <img src="{{$value->fotos->base64 or '../img/image.jpeg'}}" alt="Imagem">
                            --}}
                            <img src="img/sem-foto.png">
                        </a>
                    </div>
                </div>
                <div style="height: 140px;margin-left:230px">

                </div>
            </aside>
            <hr class="style12">
        </div>
    </section>
</main>
@endsection