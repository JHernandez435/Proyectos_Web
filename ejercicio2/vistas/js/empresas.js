$(document).ready(function() {


    // -----------------------------------------------------------
    //       SECCION DE REGISTRO DE USUARIOS
    //------------------------------------------------------------ 
    $("#empresa").click(function() {
        var nombres = $("#txtNombresEmpresa").val();
        var direccion = $("#txtDireccionEmpresa").val();
        var telefono = $("#txtTelefonoEmpresa").val();
        var correo = $("#txtCorreoEmpresa").val();
        var imagen = document.getElementById("txtImagenEmpresa").files[0];
        var lhayError = false;

        if (nombres == "") {
            $("#valida-txtNombresEmpresa").html("El campo nombres no puede ir vacio");
            $("#valida-txtNombresEmpresa").slideDown("slow");
            lhayError = true;
        }

        if (direccion == "") {
            $("#valida-txtDireccionEmpresa").html("El campo Apellidos no puede ir vacio");
            $("#valida-txtDireccionEmpresa").slideDown("slow");
            lhayError = true;
        }

        if (telefono == "") {
            $("#valida-txtTelefonoEmpresa").html("El campo Apellidos no puede ir vacio");
            $("#valida-txtTelefonoEmpresa").slideDown("slow");
            lhayError = true;
        }
        if (correo == "") {
            $("#valida-txtCorreoEmpresa").html("El campo Apellidos no puede ir vacio");
            $("#valida-txtCorreoEmpresa").slideDown("slow");
            lhayError = true;
        }

        if (imagen == "") {
            $("#valida-txtImagenEmpresa").html("El campo Especialidad no puede ir vacio");
            $("#valida-txtImagenEmpresa").slideDown("slow");
            lhayError = true;
        }


        if (!lhayError) {
            var objData = new FormData();
            objData.append("envioNombres", nombres);
            objData.append("envioDireccion", direccion);
            objData.append("envioTelefono", telefono);
            objData.append("envioCorreo", correo);
            objData.append("envioImagen", imagen);
            $.ajax({
                async: true,
                url: "ajax/empresasAjax.php",
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

    $("#txtTelefono").click(function() {
        $("#valida-txtTelefono").slideUp("slow");
    })

    $("#txtEspecialidad").click(function() {
        $("#valida-txtEspecialidad").slideUp("slow");
    })

    $("#txtImagen").click(function() {
        $("#valida-txtImagen").slideUp("slow");
    })

});