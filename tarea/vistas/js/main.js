$(document).ready(function() {

// -----------------------------------------------------------
    //       GUARDAR USUARIOS
    //------------------------------------------------------------ 
    $("#btnGuardarUsuarios").click(function() {
        var nombres = $("#inputNombre").val();
        var apellidos = $("#inputApellido").val();
        var dependencia = $("#inputDependecias").val();
        var salario = $("#inputSalario").val();
        var lhayError = false;



        if (nombres == "") {
            $("#valida-inputNombre").html("El campo nombres no puede ir vacio");
            $("#valida-inputNombre").slideDown("slow");
            lhayError = true;
        }

        if (apellidos == "") {
            $("#valida-inputApellido").html("El campo Apellidos no puede ir vacio");
            $("#valida-inputApellido").slideDown("slow");
            lhayError = true;
        }

        
        if (dependencia == "") {
            $("#valida-inputDependencia").html("El campo dependencia no puede ir vacio");
            $("#valida-inputDependencia").slideDown("slow");
            lhayError = true;
        }
        if (salario == null) {
            $("#valida-inputSalario").html("El campo salario no puede ir vacio");
            $("#valida-inputSalario").slideDown("slow");
            lhayError = true;
        }

        if (!lhayError) {
            var objData = new FormData();
            objData.append("envioNombre", nombres);
            objData.append("envioApellidos", apellidos);
            objData.append("envioDependencia", dependencia);
            objData.append("envioSalario", salario);
            
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
                        window.location = "index.html";
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
    //       RESTABLECIMIENTO DE MENSAJES DE ERROR
    //------------------------------------------------------------ 
    $("#inputNombre").click(function() {
        $("#valida-inputNombre").slideUp("slow");
    })

    $("#inputApellido").click(function() {
        $("#valida-inputApellido").slideUp("slow");
    })

    $("#inputDependecias").click(function() {
        $("#valida-inputDependencia").slideUp("slow");
    })
    $("#inputSalario").click(function() {
        $("#valida-inputSalario").slideUp("slow");
    })

    



    







})