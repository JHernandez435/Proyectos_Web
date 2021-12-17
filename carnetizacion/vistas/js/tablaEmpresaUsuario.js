$(document).ready(function() {

    $("#tablaEmpresaUsuario").DataTable({
        "ajax": "ajax/dataTable-EmpresaUsuarios.php",
        "deferReader": true,
        "retrieve": true,
        "processing": true
    });
})