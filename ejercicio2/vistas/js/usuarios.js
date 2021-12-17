$(document).ready(function () {


    // -----------------------------------------------------------
    //       SECCION DE REGISTRO DE USUARIOS
    //------------------------------------------------------------ 
    $("#btnGuardarUsuarios").click(function () {
        var nombres = $("#txtNombres").val();
        var apellidos = $("#txtApellidos").val();
        var telefono = $("#txtTelefono").val();
        var empresa = $("#txtEmpresa").val();
        var especialidad = $("#txtEspecialidad").val();
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
            $("#valida-txtTelefono").html("El campo Apellidos no puede ir vacio");
            $("#valida-txtTelefono").slideDown("slow");
            lhayError = true;
        }

        if (imagen == "") {
            $("#valida-txtImagen").html("El campo Especialidad no puede ir vacio");
            $("#valida-txtImagen").slideDown("slow");
            lhayError = true;
        }


        if (!lhayError) {
            var objData = new FormData();
            objData.append("envioNombres", nombres);
            objData.append("envioApellidos", apellidos);
            objData.append("envioTelefono", telefono);
            objData.append("envioEmpresa", empresa);
            objData.append("envioEspecialidad", especialidad);
            objData.append("envioImagen", imagen);
            alert(imagen)
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
        }
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

    $("#txtTelefono").click(function () {
        $("#valida-txtTelefono").slideUp("slow");
    })

    $("#txtEspecialidad").click(function () {
        $("#valida-txtEspecialidad").slideUp("slow");
    })

    $("#txtImagen").click(function () {
        $("#valida-txtImagen").slideUp("slow");
    })


    $("#tablaUsuario").on("click", "#btnImprimir", function () {
        var idUsuario = $(this).attr("idUsuario");
        var nombre = $(this).attr("nombre");
        var apellido = $(this).attr("apellido");
        var telefono = $(this).attr("telefono");
        var especialidad = $(this).attr("especialidad");
        var empresa = $(this).attr("empresa");
        var imagen = $(this).attr("imagen");
        $("#imgImagen").attr("src", imagen);

        $("#txtEditarId").html("Id: " + idUsuario);
        $("#txtEditarNombres").html("Nombre: " + nombre);
        $("#txtEditarApellidos").html("Apellidos: " + apellido);
        $("#txtEditarTelefono").html("Telefono: " + telefono);
        $("#txtEditarEspecialidad").html("Especialidad: " + especialidad);
        $("#txtEditarEmpresa").html("Empresa: " + empresa);

        var objData = new FormData();
        objData.append("idusuarioqr", idUsuario);
        objData.append("nombreqr", nombre);
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


    document.querySelector("#btnImprimir").addEventListener("click", function () {
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


});

// $("#footer").on("click", "#btnImprimir", function () {
//     alert("imprimiendo")
//     imprim1();
//     function imprim1(modalEditarUsuario) {

//         var printContents = document.getElementById('modalEditarUsuario').innerHTML;
//         w = window.open();
//         w.document.write(printContents);
//         w.document.close(); // necessary for IE >= 10
//         w.focus(); // necessary for IE >= 10
//         w.print();
//         w.close();
//         return true;
//     }
// });
