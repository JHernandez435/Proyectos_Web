$(document).ready(function () {


    // -----------------------------------------------------------
    //       SECCION DE REGISTRO DE USUARIOS
    //------------------------------------------------------------ 
    $("#btnGuardarUsuarios").click(function () {
        var cedula = $("#txtCedula").val();
        var nombre = $("#txtNombre").val();
        var telefono = $("#txtTelefono").val();
        var edad = $("#txtEdad").val();
        var email = $("#txtEmail").val();
        var mensaje = $("#txtMensaje").val();

            var objData = new FormData();
            objData.append("envioCedula", cedula);
            objData.append("envioNombre", nombre);
            objData.append("envioTelefono", telefono);
            objData.append("envioEdad", edad);
            objData.append("envioEmail", email);
            objData.append("envioMensaje", mensaje);

            $.ajax({
                async: true,
                url: "ajax/usuariosAjax.php",
                method: "POST",
                data: objData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
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
    })

    // -----------------------------------------------------------
    //       RESTABLECIMIENTO DE MENSAJES DE ERROR
    //------------------------------------------------------------ 
    $("#txtNombres").click(function () {
        $("#valida-txtNombres").slideUp("slow");
    })

    $("#txtApellidos").click(function () {
        $("#valida-txtApellidos").slideUp("slow");
    })

    $("#txtDependecias").click(function () {
        $("#valida-txtDependecias").slideUp("slow");
    })
    $("#txtSalarios").click(function () {
        $("#valida-txtSalarios").slideUp("slow");
    })

    $("#tablaUsuario").on("click", "#btnEditar", function () {
        var idCita = $(this).attr("idCita");
        var cedula = $(this).attr("cedula");
        var nombre = $(this).attr("nombre");
        var telefono = $(this).attr("telefono");
        var edad = $(this).attr("edad");
        var email = $(this).attr("email");
        var mensaje = $(this).attr("mensaje");
        var estado = $(this).attr("estado");

        $("#txtEditarCedula").val(cedula);
        $("#txtEditarNombre").val(nombre);
        $("#txtEditarTelefono").val(telefono);
        $("#txtEditarEdad").val(edad);
        $("#txtEditarEmail").val(email);
        $("#txtEditarMensaje").val(mensaje);
        $("#txtEditarEstado").val(estado);
        $("#btnEditarUsuarios").attr("idCita", idCita);
    })

     // -----------------------------------------------------------
    //       EDITAR USUARIOS 
    //------------------------------------------------------------ 
    $("#btnEditarUsuarios").click(function() {
        var idCita = $(this).attr("idCita");
        var cedula = $("#txtEditarCedula").val();
        var nombre = $("#txtEditarNombre").val();
        var telefono = $("#txtEditarTelefono").val();
        var edad = $("#txtEditarEdad").val();
        var email = $("#txtEditarEmail").val();
        var mensaje = $("#txtEditarMensaje").val();
        var estado = $("#txtEditarEstado").val();

        var objData = new FormData();
        objData.append("idEditarCita", idCita);
        objData.append("editarCedula", cedula);
        objData.append("editarNombre", nombre);
        objData.append("editarTelefono", telefono);
        objData.append("editarEdad", edad);
        objData.append("editarEmail", email);
        objData.append("editarMensaje", mensaje);
        objData.append("editarEstado", estado);

        alert(cedula)
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
                    window.location = "administrador.php";
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: respuesta.resultado[0]
                    })
                }
            }
        })

    })


});