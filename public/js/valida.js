$(document).ready(function(){
    $("#email").click(function(){
       if($(this).val()=='Digite seu email'){
           $(this).val('');
       }; 
    });
});
$(document).ready(function(){
    document.getElementById('cnpj').style.display = 'none';
    document.getElementById('razao').style.display = 'none';
    document.getElementById('cpf').style.display = 'none';
    document.getElementById('loja').style.display = 'none';
    document.getElementById('alert_pf').style.display = 'none';
});
function exibir_ocultar(){
    var valor = $("#tipo_id").val();

    if(valor == '3'){
        $("#cnpj").show();
        $("#razao").show();
        $("#loja").show();
        $("#cpf").hide();
        $("#select").hide();
        $("#alert_pf").hide();
        document.getElementById("cpf").value = "";
    } else {
        $("#cnpj").hide();
        $("#loja").hide();
        $("#razao").hide();
        $("#cpf").show();
        $("#select").hide();
        $("#alert_pf").show();
        document.getElementById("cnpj").value = "";
    }
};
