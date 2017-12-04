<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<h1>Categoria</h1>
<ul>
        @forelse($data as $z)
                <li>{{$z->nome}}</li>
        @empty
                <li>Não há registro!</li>
        @endforelse
</ul>

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
            jQuery("#form-category").fadeOut();
            jQuery("#form-category #nome").val("");
            jQuery("#form-category #categoria_id").val("");
            if (data == "") {
                jQuery("#"+id).css("background", "#07A68E");
                jQuery("#"+id).css("color", "#FFF");
                jQuery("#form-categoria").fadeIn();
                jQuery("#form-categoria #nome").val(jQuery("#"+id).html());
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
</script>