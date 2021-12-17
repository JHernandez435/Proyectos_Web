    // -----------------------------------------------------------
    //       GUARDAR USUARIOS
    //------------------------------------------------------------ 
    $("#formulario").on("click", "#registrar", function() {
        alert("Escogiste");
        var nombres = $(this).parent("#formulario").children("#nombreApellido").children("#grupoNombre").children("#inputNombre").val();
        var apellidos = $(this).parent("#formulario").children("#nombreApellido").children("#grupoApellido").children("#inputApellido").val();
        var dependencia = $(this).parent("#formulario").children("#dependencias").children("#grupoDependecias").children("#inputDependecias").val();
        var salario = $(this).parent("#formulario").children("#salario").children("#inputSalario").val();
        var lhayError = false;

        if (!lhayError) {

            var objData = new FormData();
            objData.append("envioNombre", nombres);
            objData.append("envioApellidos", apellidos);
            objData.append("envioDependencia", dependencia);
            objData.append("envioSalario", salario);
            alert(nombres + apellidos + dependencia + salario)

            $.ajax({
                async: true,
                url: "ajax/usuariosAjax.php",
                method: "POST",
                data: objData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta) {
                    if (respuesta.resultado[0] == 1) {
                        window.location = "index.php";
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...Falta rellenar campos',
                            text: respuesta.resultado[0]
                        })
                    }
                }
            })
        }

    })
    
    // -----------------------------------------------------------
    //       listar Usuarios
    //------------------------------------------------------------ 
    $("#botones").on("click","#totalUsuariosBtn",  function() {
        alert("total usuarios")
        $("#tablaUsuarioTotal").css({"visibility":"visible"});
        $("#tablaSistemas").css({"visibility":"hidden"});
        $("#tablaContabilidad").css({"visibility":"hidden"});
        $("#tablaSalud").css({"visibility":"hidden"});
        var amira = $(this).parent("#botones").parent("#padreBotones").parent("#primeraColumna").children("#segundaCol").children("#totalUsuarios").html();
        alert(amira)
    })
    $("#botones").on("click","#sistemas",  function() {
        alert("sistemas")
        $("#tablaSistemas").css({"visibility":"visible"});
        $("#tablaUsuarioTotal").css({"visibility":"hidden"});
        $("#tablaContabilidad").css({"visibility":"hidden"});
        $("#tablaSalud").css({"visibility":"hidden"});
        var amira = $(this).parent("#botones").parent("#padreBotones").parent("#primeraColumna").children("#segundaCol").children("#totalSistemas").html();
        alert(amira)
    })
    $("#botones").on("click","#contabilidad",  function() {
        alert("contabilidad")
        $("#tablaContabilidad").css({"visibility":"visible"});
        $("#tablaSistemas").css({"visibility":"hidden"});
        $("#tablaUsuarioTotal").css({"visibility":"hidden"});
        $("#tablaSalud").css({"visibility":"hidden"});
        var amira = $(this).parent("#botones").parent("#padreBotones").parent("#primeraColumna").children("#segundaCol").children("#totalContabilidad").html();
        alert(amira)
    })
    $("#botones").on("click","#salud",  function() {
        alert("salud")
        $("#tablaSalud").css({"visibility":"visible"});
        $("#tablaContabilidad").css({"visibility":"hidden"});
        $("#tablaSistemas").css({"visibility":"hidden"});
        $("#tablaUsuarioTotal").css({"visibility":"hidden"});
        var amira = $(this).parent("#botones").parent("#padreBotones").parent("#primeraColumna").children("#segundaCol").children("#totalSalud").html();
        alert(amira)
    })