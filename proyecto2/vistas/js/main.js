$(document).ready(function() {

    cargarSelect();

    // -----------------------------------------------------------
    //       SECCION DE REGISTRO DE USUARIOS
    //------------------------------------------------------------ 
    $("#btnGuardarUsuarios").click(function() {
        var cedula = $("#txtCedula").val();
        var nombre = $("#txtNombre").val();
        var apellido = $("#txtApellido").val();
        var telefono = $("#txtTelefono").val();
        var user = $("#txtUser").val();
        var pass = $("#txtPass").val();
        var idRol = $("#selectRol").val();

        var imagen = document.getElementById("txtImagen").files[0];
        var lhayError = false;


        if (cedula == "") {
            $("#valida-txtCedula").html("El campo nombres no puede ir vacio");
            $("#valida-txtCedula").slideDown("slow");
            lhayError = true;
        }
        if (nombre == "") {
            $("#valida-txtNombre").html("El campo nombres no puede ir vacio");
            $("#valida-txtNombre").slideDown("slow");
            lhayError = true;
        }

        if (apellido == "") {
            $("#valida-txtApellido").html("El campo Apellidos no puede ir vacio");
            $("#valida-txtApellido").slideDown("slow");
            lhayError = true;
        }

        if (telefono == "") {
            $("#valida-txtTelefono").html("El campo Telefono no puede ir vacio");
            $("#valida-txtTelefono").slideDown("slow");
            lhayError = true;
        }
        if (user == "") {
            $("#valida-txtUser").html("El campo Telefono no puede ir vacio");
            $("#valida-txtUser").slideDown("slow");
            lhayError = true;
        }
        if (pass == "") {
            $("#valida-txtPass").html("El campo Telefono no puede ir vacio");
            $("#valida-txtPass").slideDown("slow");
            lhayError = true;
        }

        if (idRol == "") {
            $("#valida-selectRol").html("El campo Telefono no puede ir vacio");
            $("#valida-selectRol").slideDown("slow");
            lhayError = true;
        }

        if (imagen == null) {
            $("#valida-txtImagen").html("El campo imagen no puede ir vacio");
            $("#valida-txtImagen").slideDown("slow");
            lhayError = true;
        }

        if (!lhayError) {
            var objData = new FormData();
            objData.append("envioCedula", cedula);
            objData.append("envioNombre", nombre);
            objData.append("envioApellido", apellido);
            objData.append("envioTelefono", telefono);
            objData.append("envioUser", user);
            objData.append("envioPass", pass);
            objData.append("envioRol", idRol);
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
    $("#txtCedula").click(function() {
        $("#valida-txtCedula").slideUp("slow");
    })

    $("#txtNombre").click(function() {
        $("#valida-txtNombre").slideUp("slow");
    })

    $("#txtApellido").click(function() {
        $("#valida-txtApellido").slideUp("slow");
    })

    $("#txtTelefono").click(function() {
        $("#valida-txtTelefono").slideUp("slow");
    })

    $("#txtUser").click(function() {
        $("#valida-txtUser").slideUp("slow");
    })

    $("#txtPass").click(function() {
        $("#valida-txtPass").slideUp("slow");
    })

    $("#txtRol").click(function() {
        $("#valida-txtRol").slideUp("slow");
    })

    $("#txtImagen").click(function() {
        $("#valida-txtImagen").slideUp("slow");
    })
    

    // -----------------------------------------------------------
    //       VISUALIZAR USUARIOS EN VENTANA MODAL DE EDICION  
    //------------------------------------------------------------ 
    $("#tablaEjemplo").on("click", "#btnEditar", function() {
        var idUsuario = $(this).attr("idUsuario");
        var cedula = $(this).attr("cedula");
        var nombre = $(this).attr("nombre");
        var apellido = $(this).attr("apellido");
        var telefono = $(this).attr("telefono");
        var user = $(this).attr("user");
        var pass = $(this).attr("pass");
        var rol = $(this).attr("rol");
        var imagen = $(this).attr("imagen");


        $("#txtEditarCedula").val(cedula);
        $("#txtEditarNombre").val(nombre);
        $("#txtEditarApellido").val(apellido);
        $("#txtEditarTelefono").val(telefono);
        $("#txtEditarUser").val(user);
        $("#txtEditarPass").val(pass);
        $("#txtEditarRol").val(rol);
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
        var cedula = $("#txtEditarCedula").val();
        var nombre = $("#txtEditarNombre").val();
        var apellido = $("#txtEditarApellido").val();
        var telefono = $("#txtEditarTelefono").val();
        var user = $("#txtEditarUser").val();
        var pass = $("#txtEditarPass").val();
        var rol = $("#txtEditarRol").val();
        var urlAnterior = $("#imgImagen").attr("urlAnterior");
        var hayArchivo = true;
        var imagen = document.getElementById("txtEditarImagen").files[0];
        if (imagen == undefined) {
            hayArchivo = false;
        }

        var objData = new FormData();
        objData.append("idEditarUsuario", idUsuario);
        objData.append("editarCedula", cedula);
        objData.append("editarNombre", nombre);
        objData.append("editarApellido", apellido);
        objData.append("editarTelefono", telefono);
        objData.append("editarUser", user);
        objData.append("editarPass", pass);
        objData.append("editarRol", rol);
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

    function cargarSelect() {
        var objData = new FormData();
        objData.append("cargarSelect", "ok");
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
                $("#selectRol").html('<option value="">Seleccione rol</option>');
                respuesta.forEach(funcionForeach);
                function funcionForeach(item, index) {
                    $("#selectRol").append('<option value="' + item.idrol + '">' + item.nombrerol + '</option>')
                    $("#txtEditarRol").append('<option value="' + item.idrol + '">' + item.nombrerol + '</option>')
                }
            }
        })
    }
});