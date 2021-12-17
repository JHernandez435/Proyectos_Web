$(document).ready(function() {

    $("#tablaEjemplo").DataTable({
        "ajax": "ajax/dataTable-UsuariosAjax.php",
        "deferReader": true,
        "retrieve": true,
        "processing": true
    });

    $("#tablaEjemploSistemas").DataTable({
        "ajax": "ajax/dataTable-Sistemas.php",
        "deferReader": true,
        "retrieve": true,
        "processing": true
    });
    
    $("#tablaEjemploContabilidad").DataTable({
        "ajax": "ajax/dataTable-Contabilidad.php",
        "deferReader": true,
        "retrieve": true,
        "processing": true
    });

    $("#tablaEjemploSalud").DataTable({
        "ajax": "ajax/dataTable-Salud.php",
        "deferReader": true,
        "retrieve": true,
        "processing": true
    });

})