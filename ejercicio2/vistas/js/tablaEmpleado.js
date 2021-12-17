$(document).ready(function() {
    $("#tablaEmpleado").DataTable({
        "ajax": "ajax/dataTable-EmpleadosAjax.php",
        "deferReader": true,
        "retrieve": true,
        "processing": true
    });

})