<?php
require_once "controlador/usuariosControlador.php";
require_once "modelos/usuariosModelo.php";
require_once "modelos/conexion.php";
  
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Lista de citas</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



    <!-- Data Tables -->
    <link rel="stylesheet" href="vistas/dataTables/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="vistas/dataTables/datatables.net-bs/css/responsive.bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->
    


    <!-- Data Tables -->
    <script src="vistas/dataTables/datatables.net/js/jquery.dataTables.js"></script>
    <script src="vistas/dataTables/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vistas/dataTables/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vistas/dataTables/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="vistas/dataTables/datatables.net-bs/js/responsive.bootstrap.min.js"></script>


    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <!-- archivos personalizados -->
    <link rel='stylesheet' type='text/css' media='screen' href='vistas/css/main.css'>
    <script src='vistas/js/tablaUsuarios.js'></script>
    <script src='vistas/js/tablaEmpresas.js'></script>
    <script src='vistas/js/tablaEmpresaUsuario.js'></script>

</head>


<body class="ana">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="ma-titulo">
                    <h1>Correo</h1>
                </div>

                <b></b>
            </section>
        </div>
    </div>
                    
    <div class="row col-md-12">
    <div class="col-md-1">
    </div>
        
        <div class="col-md-10">
            <section class="content">
                <div class="box-body">
                    <table id="tablaUsuarios" class="table table-bordered table-striped dt-responsive" width="100%">
                         
                        <thead>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Cedula</th>
                            <th>Telefono</th>
                            <th>Edad</th>
                            <th>Correo</th>
                            <th>Mensaje</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </thead>
                        
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </section>
        </div>
       

               

<!-- Modal editar usuario ---------------------------------------------------------------------------------->
<div id="modalEditarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content" id="modal-color">
    <div class="modal-header">
    <h4  class="modal-title">Editar Estado</h4>
    <button id="btn-color" type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
    <form enctype="multipart/form-data">
        <div class="form-group">
            <label for="txtEstado">Estado:</label>
            <select class="form-control" id="txtEditarEstado">
            <option>Confimado</option>
            <option>Espera</option>
            <option>Anulado</option>           
            </select>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary btnGuardar" id="btnEditarUsuarios" idUsuario=" ">Guardar</button>
</div>
</div>

</div>
</div>

 
    <script src='vistas/js/main.js'></script>
    
</body>

</html>