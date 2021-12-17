$(document).ready(function() {

    $("#tablaUsuarios").DataTable({
        "ajax": "ajax/dataTable-UsuariosAjax.php",
        "deferReader": true,
        "retrieve": true,
        "processing": true
    });

})