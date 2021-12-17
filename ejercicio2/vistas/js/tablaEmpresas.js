$(document).ready(function() {
    $("#tablaEmpresa").DataTable({
        "ajax": "ajax/dataTable-EmpresasAjax.php",
        "deferReader": true,
        "retrieve": true,
        "processing": true
    });

})