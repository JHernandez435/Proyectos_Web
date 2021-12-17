$(document).ready(function() {


    // cargarSelect();
    // -----------------------------------------------------------
    //       SECCION DE REGISTRO DE USUARIOS
    //------------------------------------------------------------ 
    $("#btnGuardarUsuarios").click(function() {
        var nombres = $("#txtNombres").val();
        var apellidos = $("#txtApellidos").val();
        var dependencias = $("#txtDependencias").val();
        var salarios = $("#txtSalarios").val();
        var lhayError = false;

        if (nombres == "") {
            $("#valida-txtNombres").html("El campo nombres no puede ir vacio");
            $("#valida-txtNombres").slideDown("slow");
            lhayError = true;
        }

        if (apellidos == "") {
            $("#valida-txtApellidos").html("El campo Apellidos no puede ir vacio");
            $("#valida-txtApellidos").slideDown("slow");
            lhayError = true;
        }

        if (dependencias == "") {
            $("#valida-txtDependencias").html("El campo Dependencias no puede ir vacio");
            $("#valida-txtDependencias").slideDown("slow");
            lhayError = true;
        }

        if (salarios == "") {
            $("#valida-txtSalarios").html("El campo Salarios no puede ir vacio");
            $("#valida-txtSalarios").slideDown("slow");
            lhayError = true;
        }

        if (!lhayError) {
            var objData = new FormData();
            objData.append("envioNombres", nombres);
            objData.append("envioApellidos", apellidos);
            objData.append("envioDependencias", dependencias);
            objData.append("envioSalarios", salarios);

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
    //       RESTABLECIMIENTO DE MENSAJES DE ERROR
    //------------------------------------------------------------ 
    $("#txtNombres").click(function() {
        $("#valida-txtNombres").slideUp("slow");
    })

    $("#txtApellidos").click(function() {
        $("#valida-txtApellidos").slideUp("slow");
    })

    $("#txtDependecias").click(function() {
        $("#valida-txtDependecias").slideUp("slow");
    })
    $("#txtSalarios").click(function() {
        $("#valida-txtSalarios").slideUp("slow");
    })
});