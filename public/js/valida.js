$(document).ready(function(){
    $("#email").click(function(){
       if($(this).val()=='Digite seu email'){
           $(this).val('');
       }; 
    });
    $("#senha").click(function(){
       if($(this).val()=='Senha'){
           $(this).val('');
       }; 
    });
});