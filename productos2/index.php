<?php
    $estado = "";
    if (isset($_GET["transactionState"])){
        $estado = $_GET["transactionState"]; 
    }
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>My proyecto</title>
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


    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" /> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.3/css/buttons.bootstrap4.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.3/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.3/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.3/js/buttons.print.min.js"></script>-->

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <!-- archivos personalizados -->
    <link rel='stylesheet' type='text/css' media='screen' href='vistas/css/main.css'>
    <script src='vistas/js/main.js'></script>
    <script src='vistas/js/tablaUsuarios.js'></script>
</head>

<body id="cuerpo" class="brayam" estado="<?php echo $estado;?>">

    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="ma-titulo">
                    <h1>Articulos Logitech</h1>
                </div>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                    <li class="breadcrumb-item">Gaming</li>
                </ol>
            </section>
        </div>
    </div>

    <div class="row col-md-12">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalUsuarios">Agregar Usuarios</button>--->
                    </div>
                    <br><br>
                </div>

                <div class="box-body">
                    <table id="tablaEjemplo" class="table table-bordered table-striped dt-responsive" width="100%">
                        <thead>
                            <th>#</th>
                            <th>codigo</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>comprar</th>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>

                <div class="box-footer">
                    <button id="btn-carrito" type="button" class="btn btn-danger">Carrito de Compras</button>
                </div>
            </section>
        </div>
    </div>



    <!-- Modal -->
    <div id="modalUsuarios" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Usuarios</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form enctype="multipart/form-data">
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
                            <label for="txtTelefono">Telefono:</label>
                            <input type="number" class="form-control" id="txtTelefono">
                            <div class="errores" id="valida-txtTelefono"></div>
                        </div>
                        <div class="form-group">
                            <label for="txtClave">Clave:</label>
                            <input type="password" class="form-control" id="txtClave">
                            <div class="errores" id="valida-txtClave"></div>
                        </div>


                        <div class="form-group">
                            <label for="sel1">Seleccionar rol:</label>
                            <select class="form-control" id="selectRol">
                            <option>Seleccione</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="txtImagen">Imagen:</label>
                            <input type="file" class="form-control" id="txtImagen">
                            <div class="errores" id="valida-txtImagen"></div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btnGuardar" id="btnGuardarUsuarios">Guardar Usuario</button>
                </div>
            </div>
        </div>
    </div>





</body>

</html>