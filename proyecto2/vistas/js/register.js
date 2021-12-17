$(document).ready(function() {

    // -----------------------------------------------------------
    //       SECCION DE REGISTRO DE USUARIOS
    //------------------------------------------------------------ 
    $("#btnRegistrarUsuarios").click(function() {
        var cedula = $("#txtCedula").val();
        var telefono = $("#txtTelefono").val();
        var user = $("#txtUser").val();
        var pass = $("#txtPass").val();
        var rol = $("#txtRol").val();

        var lhayError = false;

        if (!lhayError) {
            var objData = new FormData();
            objData.append("envioCedula", cedula);
            objData.append("envioTelefono", telefono);
            objData.append("envioUser", user);
            objData.append("envioPass", pass);
            objData.append("envioRol", rol);
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
                        window.location = "login.html";
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