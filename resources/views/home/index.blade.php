@extends('layouts.app')

@section('content')

    @if(auth()->user())
        {{ Auth::user()->name }} temos informações para vc....
        vc possui {{ Auth::user()->anuncio }}
    @else
        Bwn vindo visitante
    @endif
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <h2>Buscar anuncios</h2>
    <form action="{{url('pesquisa')}}" method="post">
        {!! csrf_field() !!}
        <input type="text" name="texto" placeholder="Digite aqui...">
        <select name="estado">
            @forelse($estado as $z)
                <option>{{$z->uf}}</option>
            @empty
                <option>Não há registro!</option>
            @endforelse
        </select>
        <select name="categoria">@forelse($categoria as $z)
                <option>{{$z->nome}}</option>
            @empty
                <option>Não há registro!</option>
            @endforelse
        </select>
        <input type="submit" value="buscar">
    </form>
    <br/>
    <hr>
    <h2>Categorias</h2>
    <ul id="sub1">
        @foreach($categoria as $z)
            <li style="display: inline-table; margin-left: 10px; padding: 20px; background: #ccc; color: #000; border-radius: 6px; cursor: pointer;"
                id="{{$z->id}}" onclick="captura({{$z->id}}, 2)">{{$z->nome}}</li>
        @endforeach
    </ul>

    <ul>
        @forelse($categoria as $z)
            <li style="display:inline;border:1px solid #ccc;padding:10px">
                <a href="categoria/{{$z->id}}">{{$z->nome}}</a>
            </li>
        @empty
            <li>Não há registro!</li>
        @endforelse
    </ul>
    <br/>
    <hr>
    <h2>Em Destaque: Premium</h2>
    <ul>
        @forelse($anuncioP as $z)
            <h3>Titulo: {{$z->titulo}}</h3>
            <br />
            <img src="{{$z->fotos}}" alt="Imagem"/>
            <p><a href="anuncio/{{$z->id}}">{{$z->id}}</a> //{{$z->descricao}}</p>
            <b>Eu sou Premium</b> - criado em {{$z->created_at}}...ID PREMIUM = {{$z->premium}}
            <hr>
        @empty
            <li>Não há registro!</li>
        @endforelse
    </ul>
    <br/>
    <hr>
    <h2>Últimos Anuncios: Normal</h2>
    <ul>
        @forelse($anuncio as $z)
            <h3>{{$z->titulo}}</h3>
            <p><a href="anuncio/{{$z->id}}">{{$z->id}}</a> //{{$z->descricao}} </p>
            <b>Eu sou Normal</b> - criado em {{$z->created_at}}...ID PREMIUM = {{$z->premium}}
            <hr>
        @empty
            <li>Não há registro!</li>
        @endforelse
    </ul>

    <script>
        function captura(id, ul) {
            var metodo = 'GET';
            var link = '{{url('api/categoria/search')}}/' + id;
            ajax(link, metodo, ul, id);
            return false;
        }

        function ajax(link, metodo, ul, id) {
            jQuery.ajax({
                url: link,
                cache: false,
                method: metodo,
            }).done(function (data) {
                for (var j = ul; j <= 100; j++) {
                    jQuery("#sub" + (j-1) + " li").css("background", "#ccc");
                    jQuery("#sub" + (j-1) + " li").css("color", "#000");
                }
                jQuery("#form-categoria").fadeOut();
                jQuery("#form-categoria #name").val("");
                jQuery("#form-categoria #categoria_id").val("");
                if (data == "") {
                    jQuery("#"+id).css("background", "#07A68E");
                    jQuery("#"+id).css("color", "#FFF");
                    jQuery("#form-categoria").fadeIn();
                    jQuery("#form-categoria #name").val(jQuery("#"+id).html());
                    jQuery("#form-categoria #categoria_id").val(id);
                } else {
                    jQuery("#"+id).css("background", "#07A68E");
                    jQuery("#"+id).css("color", "#FFF");
                    jQuery.each(data, function (i, val) {
                        if (i == 0) {
                            jQuery("#sub" + ul).html('<li style="display: inline-table; margin-left 10px;  padding: 20px;background: #ccc; color: #000; border-radius: 6px; cursor: pointer;" id="' + val.id + '" onclick="captura(' + val.id + ', ' + (ul + 1) + ')">' + val.nome + '</li>');
                        }
                    });
                }
            }).fail(function () {
            });
        }
    </script>
@endsection
