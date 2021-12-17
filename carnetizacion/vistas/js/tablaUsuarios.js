$(document).ready(function() {

    $("#tablaEjemplo").DataTable({
        "ajax": "ajax/dataTable-UsuariosAjax.php",
        "deferReader": true,
        "retrieve": true,
        "processing": true
    });
})