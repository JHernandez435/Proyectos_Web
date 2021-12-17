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
    <title>My proyecto</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

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

    <!-- Data Tables -->
    <script src="vistas/dataTables/datatables.net/js/jquery.dataTables.js"></script>
    <script src="vistas/dataTables/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vistas/dataTables/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vis"></script>
    <script src="vistas/dataTables/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- archivos personalizados -->
    <link rel="stylesheet" href="vistas/css/estilos.css">
    <link rel="stylesheet" href="vistas/css/panel.css">
    <link rel="stylesheet" href="vistas/css/main.css">
    <link rel="stylesheet" href="vistas/css/scroll.css">
    <link rel="stylesheet" type="text/css" href="estilos.css">

</head>

<body>

    <div class="wrapper-">
        <div class="content-wrapper">
            <section class="content-header">
                <ol id=fondo class="breadcrumb">
                    <li class="breadcrumb-item"><a style="color: aqua;" href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item">Nomina</li>
                    <li class="breadcrumb-item"><a style="color: red;" href="index.php">Cerrar Sesion</a></li>

                    <button  type="button" data-toggle="modal" data-target="#modalSistemas" class="btn btn-primary" style="text-align:left">Sistemas</button>
                    <button  type="button" data-toggle="modal" data-target="#modalSalud" class="btn btn-primary">Salud</button>
                    <button  type="button" data-toggle="modal" data-target="#modalContabilidad" class="btn btn-primary">Contabilidad</button>
                </ol>
                <img id="fondo5" src="images/logo_sena.png" alt="">
                <h2 id="fondo6">ADSI: 1963923</h2>
                <div class="ma-titulo">
                    <font size="20" color="black" face=" Brush Script MT">
                        PROYECTO ADSI
                    </font>
                </div>
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

                <div class=" box-body">
                    <table id="tablaEjemplo" class="table table-bordered table-striped dt-responsive" width="100%">
                        <thead>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Dependecia</th>
                            <th>Salario</th>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>

            </section>
        </div>
    </div>

<!-- Modal -->
<div id="modalSalud" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Salud</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                <div class="box-body">
                    <table id="tablaEjemploSalud" class="table table-bordered table-striped dt-responsive" width="100%">
                        
                        
                        <thead>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Dependencia</th>
                            <th>Salario</th>
                        </thead>
                        
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div id="modalContabilidad" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Contabilidad</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                <div class="box-body">
                    <table id="tablaEjemploContabilidad" class="table table-bordered table-striped dt-responsive" width="100%">
                        
                        
                        <thead>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Dependencia</th>
                            <th>Salario</th>
                        </thead>
                        
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="modalSistemas" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sistemas</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="box-body">
                        <table id="tablaEjemploSistemas" class="table table-bordered table-striped dt-responsive" width="100%">


                            <thead>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Dependencia</th>
                                <th>Salario</th>
                            </thead>

                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php
    $datos = Conexion::conectar()->query("SELECT * FROM usuarios");
    $datos1 = Conexion::conectar()->query("SELECT * FROM usuarios where dependencia = 'Sistemas'");
    $datos2 = Conexion::conectar()->query("SELECT * FROM usuarios where dependencia = 'Contabilidad'");
    $datos3 = Conexion::conectar()->query("SELECT * FROM usuarios where dependencia = 'Salud'");
    $total = $datos->rowCount();
    $total1 = $datos1->rowCount();
    $total2 = $datos2->rowCount();
    $total3 = $datos3->rowCount();
    ?>

    <?php
    $objusuarios = usuariosControlador::fnCtrCargarUsuarios();
    $totalUsuarios = 0;
    $mayor = 0;
    foreach ($objusuarios as $key => $value) {
        $idusuario = $value['idusuario'];
        $salario = $value['salario'];
        $totalUsuarios = $salario + $totalUsuarios;
        if ($salario > $mayor) {
            $mayor = $salario;
        }
    }
    ?>

    <?php
    $objusuarios = usuariosControlador::fnCtrCargarSistemas();
    $totalUsuarios1 = 0;
    $mayor1 = 0;
    foreach ($objusuarios as $key => $value) {
        $idusuario = $value['idusuario'];
        $salario = $value['salario'];
        $totalUsuarios1 = $salario + $totalUsuarios1;
        if ($salario > $mayor1) {
            $mayor1 = $salario;
        }
    }

    ?>
    <?php
    $objusuarios = usuariosControlador::fnCtrCargarContanbilidad();
    $totalUsuarios2 = 0;
    $mayor2 = 0;
    foreach ($objusuarios as $key => $value) {
        $idusuario = $value['idusuario'];
        $salario = $value['salario'];
        $totalUsuarios2 = $salario + $totalUsuarios2;
        if ($salario > $mayor2) {
            $mayor2 = $salario;
        }
    }

    ?>
    <?php
    $objusuarios = usuariosControlador::fnCtrCargarSalud();
    $totalUsuarios3 = 0;
    $mayor3 = 0;
    foreach ($objusuarios as $key => $value) {
        $idusuario = $value['idusuario'];
        $salario = $value['salario'];
        $totalUsuarios3 = $salario + $totalUsuarios3;
        if ($salario > $mayor3) {
            $mayor3 = $salario;
        }
    }
    ?>
    <div class="container">
        <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario1">
            <form action="">
                <div class="form-group mx-sm-4 pt-3">
                    <label for="txtNombres">Total Empleados:</label>
                    <input style="color: white" type="text" class="form-control" value="<?php echo $total; ?>">
                    <label for="txtNombres">Suma Salarios</label>
                    <input style="color: white" type="text" class="form-control" value="<?php echo $mayor; ?>">
                </div>
                <ul>----------------------------------------------------------------------------------------------------------------</ul>
                <div class="form-group mx-sm-4 pt-3">
                    <label for="txtNombres">Empleados Sistemas:</label>
                    <input style="color: white" type="text" class="form-control" value="<?php echo $total1; ?>">
                    <label for="txtNombres">Suma Salarios Sistemas</label>
                    <input style="color: white" type="text" class="form-control" value="<?php echo $mayor1; ?>">
                </div>
                <ul>----------------------------------------------------------------------------------------------------------------</ul>
                <div class="form-group mx-sm-4 pt-3">
                    <label for="txtNombres">Empleados Contabilidad:</label>
                    <input style="color: white" type="text" class="form-control" value="<?php echo $total2; ?>">
                    <label for="txtNombres">Suma Salarios Contabilidad</label>
                    <input style="color: white" type="text" class="form-control" value="<?php echo $mayor2; ?>">
                </div>
                <ul>----------------------------------------------------------------------------------------------------------------</ul>
                <div class="form-group mx-sm-4 pt-3">
                    <label for="txtNombres">Empleados Salud:</label>
                    <input style="color: white" type="text" class="form-control" value="<?php echo $total3; ?>">
                    <label for="txtNombres">Suma Salarios Salud</label>
                    <input style="color: white" type="text" class="form-control" value="<?php echo $mayor3; ?>">
                </div>
            </form>
        </div>
    </div>
    </div>


    <div class="  container">
        <div class=" col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario2">
            <form action="">
                <div class="form-group mx-sm-4 pt-3">
                    <label for="txtNombres">Total Nomina:</label>
                    <input style="color: white" type="text" class="form-control" value="<?php echo $totalUsuarios; ?>">
                    <label for="txtNombres">Salario Maximo Usuarios</label>
                </div>
                <div class="form-group mx-sm-4 pt-3">
                    <label for="txtNombres">Total Nomina:</label>
                    <input style="color: white" type="text" class="form-control" value="<?php echo $totalUsuarios1; ?>">
                    <label for="txtNombres">Salario Maximo Sistemas</label>
                </div>
                <div class="form-group mx-sm-4 pt-3">
                    <label for="txtNombres">Total Nomina:</label>
                    <input style="color: white" type="text" class="form-control" value="<?php echo $totalUsuarios2; ?>">
                    <label for="txtNombres">Salario Maximo Contabilidad</label>
                </div>
                <div class="form-group mx-sm-4 pt-3">
                    <label for="txtNombres">Total Nomina:</label>
                    <input style="color: white" type="text" class="form-control" value="<?php echo $totalUsuarios3 ?>">
                    <label for="txtNombres">Salario Maximo Salud</label>
                </div>
            </form>
        </div>
    </div>
    </div>

    <input type="checkbox" class="checkbox" id="check">
    <label class="menu" for="check">|||</label>
    <div class="left-panel">

        <!-- Modal -->
        <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario">

            <form enctype="multipart/form-data">
                <div class="form-group">
                    <label for="txtNombres">Nombres:</label>
                    <input style="color: white" type="text" class="form-control" id="txtNombres">
                    <div class="errores" id="valida-txtNombres"></div>
                </div>

                <div class="form-group">
                    <label for="txtApellidos">Apellidos:</label>
                    <input style="color: white" type="text" class="form-control" id="txtApellidos">
                    <div class="errores" id="valida-txtApellidos"></div>
                </div>

                <div class="form-group">
                    <label for="txtSalarios">Salario:</label>
                    <input style="color: white" type="text" class="form-control" id="txtSalarios">
                    <div class="errores" id="valida-txtSalarios"></div>
                </div>

                <div class="form-group">
                    <label for="sel1">Seleccionar rol:</label>
                    <select style="color: white" class="form-control" id="txtDependencias">
                        <option>Sistemas</option>
                        <option>Contabilidad</option>
                        <option>Salud</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btnGuardar" id="btnGuardarUsuarios">Guardar Usuario</button>
                </div>

            </form>

        </div>

    </div>



    <script src='vistas/js/main.js'></script>
    <script src='vistas/js/tablaUsuarios.js'></script>
</body>

</html>