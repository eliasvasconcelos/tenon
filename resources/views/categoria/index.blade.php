
<h1>Categoria</h1>
<ul>
        @forelse($data as $z)
                <li>{{$z->nome}} // {{$z->created_at}}</li>
        @empty
                <li>Não há registro!</li>
        @endforelse
</ul>

<ul id="sub1">
    @foreach($data as $z)
        <li style="display: inline-table; margin-left: 10px; padding: 20px; background: #ccc; color: #000; border-radius: 6px; cursor: pointer;"
            id="{{$z->id}}" onclick="captura({{$z->id}}, 2)">{{$z->name}}</li>
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
            jQuery("#form-category #name").val("");
            jQuery("#form-category #category_id").val("");
            if (data == "") {
                jQuery("#"+id).css("background", "#07A68E");
                jQuery("#"+id).css("color", "#FFF");
                jQuery("#form-category").fadeIn();
                jQuery("#form-category #name").val(jQuery("#"+id).html());
                jQuery("#form-category #category_id").val(id);
            } else {
                jQuery("#"+id).css("background", "#07A68E");
                jQuery("#"+id).css("color", "#FFF");
                jQuery.each(data, function (i, val) {
                    if (i == 0) {
                        jQuery("#sub" + ul).html('<li style="display: inline-table; margin-left 10px;  padding: 20px;background: #ccc; color: #000; border-radius: 6px; cursor: pointer;" id="' + val.id + '" onclick="captura(' + val.id + ', ' + (ul + 1) + ')">' + val.name + '</li>');
                    } else {
                        jQuery("#sub" + ul).append('<li style="display: inline-table; margin-left: 10px; padding: 20px; background: #ccc; color: #000; border-radius: 6px; cursor: pointer;" id="' + val.id + '" onclick="captura(' + val.id + ', ' + (ul + 1) + ')">' + val.name + '</li>');
                    }
                });
            }
        }).fail(function () {
        });
    }
</script>