jQuery(function () {

    jQuery("#form").submit(function () {
        var dadosForm = jQuery(this).serialize();
        var getForm = jQuery("input[name!=_token], select", this).serialize();
        jQuery.ajax({
            url: url,
            data: dadosForm,
            method: 'PUT',
            cache: false,
            beforeSend: preloader()
        }).done(function (data) {
            jQuery(".display-danger").fadeOut();
            jQuery(".display-success").html("Atualizado com sucesso !");
            setTimeout('jQuery(".display-success").fadeIn();', 1000);
            setTimeout('jQuery(".display-success").fadeOut();', 2000);
            enable();
            setTimeout('location.reload();', 2500);
        }).fail(function () {
            jQuery(".display-danger").html("Falha ao Atualizar!");
            jQuery(".display-danger").fadeIn();
            enable();
            setTimeout('jQuery(".display-danger").fadeOut();', 1000);
        }).complete(function () {
            endloader();
        });

        return false;
    });
});

function preloader() {
    jQuery(".display-warning").html('<h1><i class="fa fa-spin fa-spinner"></i> Aguarde</h1>');
    jQuery(".display-warning").fadeIn();
    disable();
}

function endloader() {
    jQuery(".display-warning").fadeOut();
}


function disable() {
    jQuery("#form :input, #form select, #form button").prop('disabled', true);
}

function enable() {
    jQuery("#form :input, #form select, #form button").prop('disabled', false);
}