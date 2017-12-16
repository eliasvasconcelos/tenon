@extends('layouts.app')

@section('content')
    <h3>Qual Categoria?</h3>
    <ul id="sub1">
        @foreach(\App\Models\Categoria::where('categoria_id', 0)->get() as $z)
            <li style="display: inline-table; margin-left: 10px; padding: 20px; background: #ccc; color: #000; border-radius: 6px; cursor: pointer;"
                id="{{$z->id}}" onclick="captura({{$z->id}}, 2)">{{$z->nome}}</li>
        @endforeach
    </ul>

    @for($i=2; $i<=100; $i++)
        <ul id="sub{{$i}}">

        </ul>
    @endfor
    <form id="form-anuncio" class="form" style="display: none;"><br/>
        {!! csrf_field() !!}
        <input type="hidden" id="categoria_id" name="categoria_id" value="">
        <input type="hidden" id="user_id" name="user_id" value="{{auth()->user()->id}}">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Titulo</div>
                    <input class="form-control" id="titulo" name="titulo" placeholder="Titulo" value="">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Descricao</div>
                    <input class="form-control" id="descricao" name="descricao" placeholder="Titulo" value="">
                </div>
            </div>
        </div>
        <a class="btn btn-success" onclick="save('anuncio', '{{url('anuncio')}}');"><i
                    class="fa fa-save"></i>
            Salvar
        </a>
    </form>

    <script>
        function captura(id, ul) {
            var metodo = 'GET';
            var link = '{{url('api/categoria/search')}}/' + id;
            ajax2(link, metodo, ul, id);
            return false;
        }

        function save(form, link) {
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
                alert("OK");
                window.refresh();
            }).fail(function () {

            });
        }

        function ajax2(link, metodo, ul, id) {
            jQuery.ajax({
                url: link,
                cache: false,
                method: metodo,
            }).done(function (data) {
                for (var j = ul; j <= 100; j++) {
                    jQuery("#sub" + j).html("");
                    jQuery("#sub" + (j - 1) + " li").css("background", "#ccc");
                    jQuery("#sub" + (j - 1) + " li").css("color", "#000");
                }
                jQuery("#form-anuncio").fadeOut();
                jQuery("#form-anuncio #name").val("");
                jQuery("#form-anuncio #categoria_id").val("");
                if (data == "") {
                    jQuery("#" + id).css("background", "#07A68E");
                    jQuery("#" + id).css("color", "#FFF");
                    jQuery("#form-anuncio").fadeIn();
                    jQuery("#form-anuncio #name").val(jQuery("#" + id).html());
                    jQuery("#form-anuncio #categoria_id").val(id);
                } else {
                    jQuery("#" + id).css("background", "#07A68E");
                    jQuery("#" + id).css("color", "#FFF");
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
    </script>

@endsection