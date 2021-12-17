$(document).ready(function() {

    $("#botones").on("click","#totalUsuario", function(){
        $("#tablaUsuario").css({"visibility": "visible"});
        $("#tablaEmpresa").css({"visibility": "hidden"});
        var amira = $(this).parent("#botones").parent("#padreBotones").children("#segundaCol").children("#totalUsuarios").html();
    });

    $("#botones").on("click","#totalEmpresa", function(){
        $("#tablaUsuario").css({"visibility": "hidden"});
        $("#tablaEmpresa").css({"visibility": "visible"});
        var amira = $(this).parent("#botones").parent("#padreBotones").children("#segundaCol").children("#totalEmpresa").html();
    });

})