$(document).ready(function() {
  

    // -----------------------------------------------------------
    //       SECCION DE REGISTRO DE USUARIOS
    //------------------------------------------------------------ 
    $("#btnGuardar").click(function() {
        var nombre = $("#txtNombre").val();
        var cedula = $("#txtCedula").val();
        var telefono = $("#txtTelefono").val();
        var edad = $("#txtEdad").val();
        var correo = $("#txtCorreo").val();
        var mensaje = $("#txtMensaje").val();
        var estado = $("#txtEstado").val();
        var lhayError = false;


        if (nombre == "") {
            $("#valida-txtNombre").html("El campo nombre no puede ir vacio");
            $("#valida-txtNombre").slideDown("slow");
            lhayError = true;
        }

        if (cedula == "") {
            $("#valida-txtCedula").html("El campo cedula no puede ir vacio");
            $("#valida-txtCedula").slideDown("slow");
            lhayError = true;
        }

        if (telefono == "") {
            $("#valida-txtTelefono").html("El campo telefono no puede ir vacio");
            $("#valida-txtTelefono").slideDown("slow");
            lhayError = true;
        }
        if (edad == "") {
            $("#valida-txtEdad").html("El campo edad no puede ir vacio");
            $("#valida-txtEdad").slideDown("slow");
            lhayError = true;
        }
        if (correo == "") {
            $("#valida-txtCorreo").html("El campo correo no puede ir vacio");
            $("#valida-txtCorreo").slideDown("slow");
            lhayError = true;
        }

        if (mensaje == "") {
            $("#valida-txtMensaje").html("El campo mensaje no puede ir vacio");
            $("#valida-txtMensaje").slideDown("slow");
            lhayError = true;
        }
        if (estado == "") {
            $("#valida-txtEstado").html("El campo Salario no puede ir vacio");
            $("#valida-txtEstado").slideDown("slow");
            lhayError = true;
        }

        if (!lhayError) {
            var objData = new FormData();
            objData.append("envioNombre", nombre);
            objData.append("envioCedula", cedula);
            objData.append("envioTelefono", telefono);
            objData.append("envioEdad", edad);
            objData.append("envioCorreo", correo);
            objData.append("envioMensaje", mensaje);
            objData.append("envioEstado", estado);
            
            
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
    $("#txtNombre").click(function() {
        $("#valida-txtNombre").slideUp("slow");
    })

    $("#txtApellidos").click(function() {
        $("#valida-txtApellidos").slideUp("slow");
    })

    $("#txtSalario").click(function() {
        $("#valida-txtSalario").slideUp("slow");
    })
// -----------------------------------------------------------
    //       VISUALIZAR USUARIOS EN VENTANA MODAL DE EDICION  
    //------------------------------------------------------------ 
    $("#tablaUsuarios").on("click", "#btnEditar", function() {
        var idUsuario = $(this).attr("idusuario");
        var estado = $(this).attr("estado");
        
        $("#txtEditarEstado").val(estado);
        
        $("#btnEditarUsuarios").attr("idusuario", idUsuario);
    })
     // -----------------------------------------------------------
    //       EDITAR USUARIOS 
    //------------------------------------------------------------ 
    $("#btnEditarUsuarios").click(function() {

        var idUsuario = $(this).attr("idUsuario");
        var estado = $("#txtEditarEstado").val();

        var lhayError = false; // variable logica

        if(estado ==""){
            $("#valida-txtEditarEstado").html("El campo editado estado no puede ir vacio")
            $("#valida-txtEditarEstado").slideDown("slow");
            lhayError =true;
        }
        
        if(!lhayError){ 


        var objData = new FormData();
        objData.append("idEditarUsuario", idUsuario);
        objData.append("editarEstado", estado);


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
                    window.location = "tabla.php";
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: respuesta.resultado[0]
                    })
                }
            }
        })
    }
    })


    

});