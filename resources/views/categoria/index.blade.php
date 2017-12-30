@extends('layouts.app')

@section('content')
    <main class="conteudo">
        <section id="default2">
    <h1>Categoria</h1>
<ul>
        @forelse($data as $z)
        <li> <a class="cor_black" href="categoria/{{$z->id}}">{{$z->nome}}</a></li>
        @empty
                <li>Não há registro!</li>
        @endforelse
</ul>
{{--
<ul id="sub1">
    @foreach($data as $z)
        <li style="display: inline-table; margin-left: 10px; padding: 20px; background: #ccc; color: #000; border-radius: 6px; cursor: pointer;"
            id="{{$z->id}}" onclick="captura({{$z->id}}, 2)">{{$z->nome}}</li>
    @endforeach
</ul>

@for($i=2; $i<=100; $i++)
    <ul id="sub{{$i}}">

    </ul>
@endfor
    <form id="form-categoria" class="form" style="display: none;"><br/>
        {!! csrf_field() !!}
        <input type="hidden" id="categoria_id" name="categoria_id" value="">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Categoria</div>
                    <input class="form-control" id="nome" name="nome" placeholder="Categoria" value="">
                </div>
            </div>
        </div>
        <a class="btn btn-success" onclick="save('categoria', '{{url('categoria')}}');"><i
                    class="fa fa-save"></i>
            Salvar
        </a>
    </form>

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
                jQuery("#sub" + j).html("");
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
                    } else {
                        jQuery("#sub" + ul).append('<li style="display: inline-table; margin-left: 10px; padding: 20px; background: #ccc; color: #000; border-radius: 6px; cursor: pointer;" id="' + val.id + '" onclick="captura(' + val.id + ', ' + (ul + 1) + ')">' + val.nome + '</li>');
                    }
                });
            }
        }).fail(function () {
        });
    }
</script>--}}
        </section>
    </main>

@endsection