$(document).ready(function() {
    cargarSelect();

    // -----------------------------------------------------------
    //       SECCION DE REGISTRO DE USUARIOS
    //------------------------------------------------------------ 
    $("#btnGuardarUsuarios").click(function() {
        var nombres = $("#txtNombres").val();
        var apellidos = $("#txtApellidos").val();
        var edad = $("#txtEdad").val();
        var idempresa = $("#selectEmpresa").val();
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

        if (edad == "") {
            $("#valida-txtEdad").html("El campo Edad no puede ir vacio");
            $("#valida-txtEdad").slideDown("slow");
            lhayError = true;
        }
        if (idempresa == "") {
            $("#valida-selectEmpresa").html("El campo empresa no puede ir vacio");
            $("#valida-selectEmpresa").slideDown("slow");
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
            objData.append("envioEdad", edad);
            objData.append("envioImagen", imagen);
            objData.append("envioEmpresa", idempresa);


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

    $("#txtSalario").click(function() {
        $("#valida-txtSalario").slideUp("slow");
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
                $("#selectEmpresa").html('<option value=>Seleccione Empresa</option>')
                respuesta.forEach(funcionForeach);

                function funcionForeach(item, index) {
                    $("#selectEmpresa").append('<option value="' + item.idempresa + '">' + item.nombre + '</option>')

                }
            }
        })
    }
    // -----------------------------------------------------------
    //        USUARIOS 
    //------------------------------------------------------------ 
    $("#tablaEjemplo").on("click", "#btnEditar", function() {

        var idUsuario = $(this).attr("idUsuario");
        var nombres = $(this).attr("nombres");
        var apellidos = $(this).attr("apellidos");
        var edad = $(this).attr("edad");
        var urlimagen = $(this).attr("urlimagen");
        $("#imgImagen").attr("src", urlimagen);

        $("#txtEditarNombres").html("Nombre: " + nombres);
        $("#txtEditarApellidos").html("Apellidos: " + apellidos);
        $("#txtEditarEdad").html("Edad: " + edad);

        var objData = new FormData();
        objData.append("idusuarioqr", idUsuario);
        objData.append("nombreqr", nombres);
        $.ajax({
            async: true,
            url: "controlador/codigoqr.php",
            method: "POST",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                var url = respuesta.resultado[0].substr(3, respuesta.resultado[0].length);
                $("#imgImagenQr").attr("src", url);
            }
        })

    })

    document.querySelector("#btnImprimir").addEventListener("click", function() {
        var div = document.querySelector("#imprimible");
        imprimirElemento(div);
    });

    function imprimirElemento(elemento) {
        var ventana = window.open('', 'PRINT', 'height=400,width=600');
        ventana.document.write('<html><head><title>' + document.title + '</title>');
        ventana.document.write('</head><body >');
        ventana.document.write(elemento.innerHTML);
        ventana.document.write('</body></html>');
        ventana.document.close();
        ventana.focus();
        ventana.print();
        ventana.close();
        return true;
    }

})