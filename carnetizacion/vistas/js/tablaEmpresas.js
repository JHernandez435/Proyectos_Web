$(document).ready(function() {

    $("#tablaEmpresa").DataTable({
        "ajax": "ajax/dataTable-empresasAjax.php",
        "deferReader": true,
        "retrieve": true,
        "processing": true
    });
})