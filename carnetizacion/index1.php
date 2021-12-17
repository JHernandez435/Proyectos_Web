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
    <title>Carnetizacion</title>
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
                    <h1>Empresa</h1>
                </div>

                <b></b>
            </section>
        </div>
    </div>
                    
    <div class="row col-md-12">
        <br><br> <br><br> 
        <div class="col-md-2">
        <button type="button" data-toggle="modal" data-target="#modalUsuarios" class="btn btn-danger">Agregar Usuarios</button>
        <br><br><br><br> 
        <button type="button" data-toggle="modal" data-target="#modalEmpresa" class="btn btn-danger">Agregar Empresas</button>
        <br><br><br><br> 
        <a type="button" href='Index.php' class="btn btn-danger">Usuarios</a>

        </div>
        <div class="col-md-8">
            <section class="content">
                
                
                

                <div class="box-body">
                    <table id="tablaEmpresa" class="table table-bordered table-striped dt-responsive" width="100%">
                         
                        <thead>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Acciones</th>
                        </thead>
                        
                        <tbody>

                        </tbody>
                    </table>
                </div>


    <!-- Modal -->
<div id="modalEmpresa" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Empresa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                <div class="form-group">
                            <label for="txtNombre">Nombre:</label>
                            <input type="text" class="form-control" id="txtNombre">
                            <div class="errores" id="valida-txtNombre"></div>
                        </div>
                        <div class="form-group">
                            <label for="txtDireccion">Direccion:</label>
                            <input type="text" class="form-control" id="txtDireccion">
                            <div class="errores" id="valida-txtDireccion"></div>
                        </div>         
                        <button type="button" class="btn btn-danger btnGuardar" id="btnGuardarEmpresa">Guardar Empresa</button> 

            </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div id="modalUsuarios" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Usuarios</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                <form enctype="multipart/form-data" class="resgistrar">

                        <div class="form-group">
                            <label for="txtNombres">Nombres:</label>
                            <input type="text" class="form-control" id="txtNombres">
                            <div class="errores" id="valida-txtNombres"></div>
                        </div>

                        <div class="form-group">
                            <label for="txtApellidos">Apellidos:</label>
                            <input type="text" class="form-control" id="txtApellidos">
                            <div class="errores" id="valida-txtApellidos"></div>
                        </div>
                        <div class="form-group">
                            <label for="txtEdad">Edad:</label>
                            <input type="text" class="form-control" id="txtEdad">
                            <div class="errores" id="valida-txtEdad"></div>
                        </div>
                        <div class="form-group">
                            <label for="txtImagen">Imagen:</label>
                            <input type="file" class="form-control" id="txtImagen">
                            <div class="errores" id="valida-txtImagen"></div>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Empresa:</label>
                            <select class="form-control" id="selectEmpresa">
                            <option>Seleccione</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-danger btnGuardar" id="btnGuardarUsuarios">Imprimir</button>
                    </form>
                </div>

            </div>
            </div>
        </div>
    </div>

<!-- Modal editar usuario ---------------------------------------------------------------------------------->
<div id="modalEmpresaUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content" id="modal-color">
    <div class="modal-header">
    <h4  class="modal-title">Usuarios</h4>
    <button id="btn-color" type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
    
    </div>
    <div class="modal-body">
    <form enctype="multipart/form-data">
    <table id="tablaEmpresaUsuario" class="table table-bordered table-striped dt-responsive" width="100%">
                         
                         <thead>
                             <th>#</th>
                             <th>Empresa</th>
                             <th>Idempresa</th>
                             <th>Usuario</th>
                         </thead>
                         
                         <tbody>
 
                         </tbody>
                     </table>
        

    </form>
</div>

</div>

</div>
</div>



</div>

    <script src='vistas/js/main.js'></script>
    <script src='vistas/js/mainE.js'></script>
    
</body>

</html>