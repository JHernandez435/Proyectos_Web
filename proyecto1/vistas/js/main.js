$(document).ready(function() {
    // -----------------------------------------------------------
    //       SECCION DE REGISTRO DE USUARIOS
    //------------------------------------------------------------ 
    $("#btnGuardarUsuarios").click(function() {
        var nombres = $("#txtNombres").val();
        var apellidos = $("#txtApellidos").val();
        var telefono = $("#txtTelefono").val();
        var imagen = document.getElementById("txtImagen").files[0];
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

        if (telefono == "") {
            $("#valida-txtTelefono").html("El campo Telefono no puede ir vacio");
            $("#valida-txtTelefono").slideDown("slow");
            lhayError = true;
        }

        if (imagen == null) {
            $("#valida-txtImagen").html("El campo imagen no puede ir vacio");
            $("#valida-txtImagen").slideDown("slow");
            lhayError = true;
        }

        if (!lhayError) {
            var objData = new FormData();
            objData.append("envioNombre", nombres);
            objData.append("envioApellidos", apellidos);
            objData.append("envioTelefono", telefono);
            objData.append("envioImagen", imagen);
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
                            title: 'Oops...',
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

    $("#txtImagen").click(function() {
        $("#valida-txtImagen").slideUp("slow");
    })


    // -----------------------------------------------------------
    //       VISUALIZAR USUARIOS EN VENTANA MODAL DE EDICION  
    //------------------------------------------------------------ 
    $("#tablaEjemplo").on("click", "#btnEditar", function() {
        var idUsuario = $(this).attr("idUsuario");
        var nombre = $(this).attr("nombre");
        var apellido = $(this).attr("apellido");
        var telefono = $(this).attr("telefono");
        var imagen = $(this).attr("imagen");


        $("#txtEditarNombres").val(nombre);
        $("#txtEditarApellidos").val(apellido);
        $("#txtEditarTelefono").val(telefono);
        $("#imgImagen").attr("src", imagen);
        $("#imgImagen").attr("urlAnterior", imagen);
        $("#etiquetaImagen").html("Imagen: " + imagen);
        $("#btnEditarUsuarios").attr("idUsuario", idUsuario);
    })


    // -----------------------------------------------------------
    //       EDITAR USUARIOS 
    //------------------------------------------------------------ 
    $("#btnEditarUsuarios").click(function() {
        var idUsuario = $(this).attr("idUsuario");
        var nombres = $("#txtEditarNombres").val();
        var apellidos = $("#txtEditarApellidos").val();
        var telefono = $("#txtEditarTelefono").val();
        
        var urlAnterior = $("#imgImagen").attr("urlAnterior");
        var hayArchivo = true;
        var imagen = document.getElementById("txtEditarImagen").files[0];
        if (imagen == undefined) {
            hayArchivo = false;
        }

        var objData = new FormData();
        objData.append("idEditarUsuario", idUsuario);
        objData.append("editarNombre", nombres);
        objData.append("editarApellidos", apellidos);
        objData.append("editarTelefono", telefono);
        objData.append("editarImagen", imagen);
        objData.append("eliminarImagenAnterior", urlAnterior);
        objData.append("hayArchivo", hayArchivo);
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
                        title: 'Oops...',
                        text: respuesta.resultado[0]
                    })
                }
            }
        })

    })


    // -----------------------------------------------------------
    //      ELIMINAR USUARIOS 
    //------------------------------------------------------------ 
    $("#tablaEjemplo").on("click", "#btnEliminar", function() {
        Swal.fire({
            title: 'Esta Usted Seguro?',
            text: "Al realizar esta acción no podra revertirse!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borrar registro!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                var idUsuario = $(this).attr("idUsuario");
                var rutaImagen = $(this).attr("imagen");
                var objData = new FormData();
                objData.append("idEliminarUsuario", idUsuario);
                objData.append("eliminarImagen", rutaImagen);
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
                                title: 'Oops...',
                                text: respuesta.resultado[0]
                            })
                        }
                    }
                })
            }
        })
    })

    // -----------------------------------------------------------
    //       GENERAR PDF
    //------------------------------------------------------------ 
    $("#btn-pdf").click(function(){

        window.open("extensiones/TCPDF-main/examples/informe.php")
    })
});