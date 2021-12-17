$(document).ready(function() {

    $("#tablaUsuario").DataTable({
        "ajax": "ajax/dataTable-UsuariosAjax.php",
        "deferReader": true,
        "retrieve": true,
        "processing": true
    });

})