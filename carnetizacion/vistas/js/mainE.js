$(document).ready(function() {

    

    $("#btnGuardarEmpresa").click(function() {
        var nombres = $("#txtNombre").val();
        var direccion = $("#txtDireccion").val();
        var lhayError = false;


        if (nombres == "") {
            $("#valida-txtNombre").html("El campo nombres no puede ir vacio");
            $("#valida-txtNombre").slideDown("slow");
            lhayError = true;
        }

        if (direccion == "") {
            $("#valida-txtDireccion").html("El campo Direccion no puede ir vacio");
            $("#valida-txtDireccion").slideDown("slow");
            lhayError = true;
        }

        alert(nombres)

        if (!lhayError) {
            var objData = new FormData();
            objData.append("envioNombre", nombres);
            objData.append("envioDireccion", direccion);
            
            
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


    

});