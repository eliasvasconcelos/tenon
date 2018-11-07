<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tenon') }}</title>
    <meta name="Description" content="">
    <meta name="author" content="Elias Vasconcelos">
    <meta keywords="">
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/resolucao.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="{{ asset('js/valida.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>

        $(document).ready(function() {
            var nav = $('.top_esq');
            $(window).scroll(function () {
                if ($(this).scrollTop() > 540) {
                    nav.addClass("fixo");
                } else {
                    nav.removeClass("fixo");
                }
            });
        });
        $(document).ready(function() {
            var nav = $('.cat_principal');
            $(window).scroll(function () {
                if ($(this).scrollTop() > 540) {
                    nav.addClass("cat_fixa");
                } else {
                    nav.removeClass("cat_fixa");
                }
            });
        });
    </script>
</head>

<body>
<div class="container">
    <div class="list"></div>
    <header class="topo">
        <a href ="{{ url('/') }}" title="Home">
            <div class="logo swing fade"><h1>Tenon - Tudo do meio Rural em um só local</h1></div>
        </a>
        <span class="saudacao">
            @guest
                Olá! <a href="{{ route('login') }}">Entre</a> ou <a href="{{ route('register') }}">cadastre-se</a>
            @else
               Olá,  <b>{{ Auth::user()->name }} {{Auth::user()->id - Auth::user()->profile}}</b>
            @endguest
        </span>
        <!-- MENU MOBILE -->
        <ul class="menu_mobile">
            <h1 class="fontzero">Menu Mobile - Tenon</h1>
            <li class="right text-right">
                <a title="Acesse nossa plataforma" class="botao visivel" href="#animais"><i class="fa fa-home fa-lg chat"></i> &nbsp; Home </a><span class="visivel">|</span>
                <a title="Acesse nossa plataforma" class="botao" href=""><i class="fa fa-user-circle-o  fa-lg user"></i> &nbsp; Minha Conta </a>
            </li>
        </ul>
        <!-- MENU FULL TOPO -->
        <ul class="menu">
            <h1 class="fontzero">Acesse o Menu Desktop</h1>
            <li class="right text-right">
                @if(Auth::user())
{{--
                <a title="Acesse nossa plataforma" class="botao" href="#"><i class="fa fa-comments fa-lg"></i> &nbsp; Chat </a>|
--}}

                <a title="Desconectar" class="botao" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-close fa-lg"></i> Sair </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <a title="Acesse nossa plataforma" class="botao" href="{{url ('user')}}/{{Auth::user()->profile}}">
                    <i class="fa fa-user-circle-o  fa-lg"></i> Minha Conta </a>
                @else
                    <a title="Acesse nossa plataforma" class="botao visivel" href="{{ url('/') }}"><i class="fa fa-home fa-lg chat"></i> &nbsp; Home </a><span class="visivel">|</span>
                    <a title="Acesse nossa plataforma" class="botao" href="{{ route('login') }}"><i class="fa fa-user-circle-o  fa-lg user"></i> &nbsp; Minha Conta </a>
                @endif
            </li>
        </ul>

        <section class="intro swing">
            <a href="#"><h1>Encontre tudo</h1></a>
        </section>
        <p class="tagline">do comércio agropecuário em um só local...</p>
    </header>
    <section class="header_op">
        <h1 class="fontzero"> Pesquisar produtos na plataforma Tenon </h1>
    @if(Auth::user())
       @if(Auth::user()->tipo_id == '1')
           <a href="{{url ('/painel')}}">
               <span class="ofertas swing">
                   <i class="fa fa-cog fa-lg"></i> Administração
               </span>
           </a>
       @elseif(Auth::user()->tipo_id == "2" || Auth::user()->tipo_id == "4")
           @if(Auth::user()->loja_link != null)
           <a href="{{url ('loja')}}/{{Auth::user()->loja_link}}">
               <span class="ofertas swing">
                   <i class="fa fa-user fa-lg"></i> Meus anúncios
               </span>
           </a>
           @else
           <a href="{{url ('user')}}/{{Auth::user()->profile}}">
               <span class="ofertas swing">
                   <i class="fa fa-user fa-lg"></i> Meus anúncios
               </span>
           </a>
           @endif
           <a href="{{url ('anuncio/novo')}}#anunciar">
               <span class="anunciar swing">
                   <i class="fa fa-bullhorn fa-lg"></i> Inserir anúncio
               </span>
           </a>
       @else
           <a href="{{url ('user')}}/{{Auth::user()->profile}}">
               <span class="ofertas swing">
                   <i class="fa fa-user fa-lg"></i> Meus anúncios
               </span>
           </a>
            <a href="{{url ('anuncio/novo')}}#anunciar">
               <span class="anunciar swing">
                   <i class="fa fa-bullhorn fa-lg"></i> Inserir anúncio
               </span>
            </a>
       @endif
    @else
       <a href="{{url ('anuncio/novo')}}#anunciar">
       <span class="anunciar2 swing">
           <i class="fa fa-bullhorn fa-lg"></i> Inserir anúncio
       </span>
       </a>
    @endif
<div class="bg_busca">
   <div class="busca">
       <i class="fa fa-search fa-3x busca_icon"></i>
       <form action="{{url('pesquisar')}}" method="get">
           <input id="busca-cursor" placeholder="Digite aqui...." type="text" name="texto" value="{{request()->get('texto')}}" class="header_pesquisa">
           <select class="categorias" name="categoria">
               <option value="" selected>O que é?</option>
               @forelse(\App\Models\Categoria::orderBy('id')->where('categoria_id',0)->get() as $z)
                   <option value="{{$z->id}}">{{$z->nome}}</option>
               @empty
                   <li class="cor_black">Sem Categoria</li>
               @endforelse
           </select>
           <select name="estado" class="estados" id="id_estados">
               <option value="" selected>Qual local?
               </option>
               @forelse(\App\Models\Uf::orderBy('id')->get() as $z)
                    <option value="{{$z->sigla}}">{{$z->uf}}</option>
               @empty
                   <li class="cor_black">Sem Categoria</li>
               @endforelse
           </select>
           <button class="btn_busca"><i class="fa fa-search fa-lg b_pes"></i> pesquisar</button>
       </form>
   </div>
</div>
</section>
<div class="bg_branco">
<menu class="cat_principal">
   <div class="center">
       <h1 class="fontzero">Pesquise por Categorias</h1>
       <ul>
           <a href="{{url('/')}}" class="fade_m">
               <li>
                   <i class="fa fa-home fa-2x"></i>
                   <p>Home</p>
               </li>
           </a>
       @forelse(\App\Models\Categoria::where('categoria_id', 0)->get() as $z)
               <a href="{{url('categoria')}}/{{$z->id}}" class="fade_m">
                   <li>
                       <i class="fa fa-{{$z->icon}} fa-2x"></i>
                       <p>{{$z->nome}}</p>
                   </li>
               </a>
           @empty
               <li class="cor_black">Sem Categoria</li>
           @endforelse
           <!--  <a href="?pg=resultado" class="fade_m"><li><i class="fa fa-picture-o fa-2x"></i><p>Artesanato</p></li></a>
           <a href="?pg=resultado" class="fade_m"><li><i class="fa fa-graduation-cap fa-2x"></i><p>Cursos</p></li></a>
           <a href="?pg=resultado" class="fade_m"><li><i class="fa fa-map fa-2x"></i><p>Equitação</p></li></a>
           <a href="?pg=resultado" class="fade_m"><li><i class="fa fa-camera fa-2x"></i><p>Eventos</p></li></a>
           <a href="?pg=resultado" class="fade_m"><li><i class="fa fa-home fa-2x"></i><p>Imóveis</p></li></a>
           <a href="?pg=resultado" class="fade_m"><li><i class="fa fa-truck fa-2x"></i><p>Maquinário</p></li></a>
           <a href="?pg=resultado" class="fade_m"><li><i class="fa fa-leaf fa-2x"></i><p>Mudas/Ramos</p></li></a>
           <a href="?pg=resultado" class="fade_m all"><li><i class="fa fa-bars fa-2x"></i><p>All Categorias</p></li></a>
                                       <li><a href="#" class="fade_m">Suprimentos</a></li>
                           <li class="oculta right"><a href="?pg=resultado" class="fade_m"><i class="fa fa-lemon-o fa-2x"></i><p>Sementes</p>
                           <li><a href="#" class="fade_m">Vestimentas</a></li>
                           <li><a href="#" class="fade_m">Veículos</a></li></a></li>-->
       </ul>
   </div>
</menu>
</div>
</div>

@yield('content')

<footer id="rodape">
<div class="bg">
<div class="center">
   <div class="left"><img src="{{asset ('/')}}img/Logo.png"></div>
   <div class="middle">&copy; 2017 - <?= date('Y'); ?> Tenon - Todos os direitos Reservados</div>
   <div class="right">

       Share<br /><br />
       <i class="fa fa-rss-square fa-2x rodape_icon"></i>
       <i class="fa fa-youtube-square fa-2x rodape_icon"></i>
       <i class="fa fa-facebook-square fa-2x rodape_icon"></i>
       <i class="fa fa-twitter-square fa-2x rodape_icon"></i>
   </div>
   <div class="empresa">Lorem ipsum dolor sit amet, consectetur adipiscing elit,incididunt ut labore et dolore magna aliqua. Ut enim ad quis nostrud exercitation ullamco laboris.</div>
   <div class="menu">
       <h1 class="fontzero">Links Úteis da Plataforma</h1>
       <ul>
           <li><h3> Apoio?</h3></li>
           <li> <a href="?pg=ajuda">Ajuda</a></li>
           <li> <a href="?pg=protecao">Proteção</a></li>
       </ul>

       <ul>
           <li><h3> Proteção</h3></li>
           <li> <a href="?pg=regras">Regras</a></li>
       </ul>

       <ul>
           <li><h3> Divulgue</h3></li>
           <li> <a href="#">Segurança</a></li>
       </ul>

       <ul>
           <li><h3> Sobre Nós</h3></li>
           <li> <a href="#">Publicidade</a></li>
           <li> <a href="#">Localização</a></li>
       </ul>
   </div>
</div>
</div>
</footer>
</body>
</html>