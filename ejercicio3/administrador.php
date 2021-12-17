<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$result = "";
if (isset($_POST['submit'])) {
    require 'phpmailer/Exception.php';
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'gaway1060@gmail.com';
    $mail->Password = 'G@w@y1060';

    $mail->setFrom($_POST['email'], $_POST['nombre']);
    $mail->addAddress($_POST['email']);
    $mail->addReplyTo($_POST['email'], $_POST['nombre']);

    $mail->isHTML(true);
    $mail->Subject = 'Enviado por ' . $_POST['nombre'];
    $mail->Body = '<h1 align=center>Nombre: ' . $_POST['nombre'] . '<br> Email: ' . $_POST['email'] . '<br>Mensaje: ' . $_POST['mensaje'] . '<br>Telefono: ' . $_POST['telefono'] .'<br>Estado: ' . $_POST['estado'] . '</h1>';

    if (!$mail->send()) {
        $result = "Algo esta mal, intentalo de nuevo por favor";
    } else {
        $result = "Gracias " . $_POST['nombre'] . "por contactarnos, espera la respuesta";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Proyecto | CRUD</title>
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
    <script src="vistas/dataTables/datatables.net-bs/js/dataTables.responsive.min.js"></script>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <!-- archivos personalizados -->
    <link rel='stylesheet' type='text/css' media='screen' href='vistas/css/estilos.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='vistas/css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='vistas/css/scroll.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='vistas/css/json.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='vistas/css/simple-sidebar.css'>
    <script src='vistas/js/main.js'></script>
    <script src='vistas/js/tablaUsuarios.js'></script>
</head>

<body>
    <div class="wrapper-">
        <div class="content-wrapper">
            <section class="content-header">
                <ol id=fondo class="breadcrumb">
                    <li class="breadcrumb-item">Crud Usuarios</li>
                    <li class="breadcrumb-item"><a style="color: red;" href="index.php">Cerrar Sesion</a></li>
                </ol>
                <img id="fondo5" src="vistas/img/logo_sena.png" alt="">
                <h2 id="fondo6">ADSI: 1963923</h2>
                <div class="ma-titulo">
                    <font size="100" color="black" face=" Brush Script MT">
                        Crud de Usuarios
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
                <div class="box-body">
                    <table id="tablaUsuario" class="table table-bordered table-striped dt-responsive" width="100%">
                        <thead>
                            <th>#</th>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Edad</th>
                            <th>Email</th>
                            <th>Mensaje</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                    
                </div>
            </section>

        </div>
    </div>

    <div id="modalEditarUsuario" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmar Cita</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form action="" method="post">

                        <div class="form-group">
                            <center>
                                <br><input name="cedula" type="text" class="form-control" id="txtEditarCedula" readonly>
                                <br><input name="nombre" type="text" class="form-control" id="txtEditarNombre" readonly>
                                <br><input name="telefono" type="number" class="form-control" id="txtEditarTelefono" readonly>
                                <br><input name="edad" type="number" class="form-control" id="txtEditarEdad" readonly>
                                <br><input name="email" type="text" class="form-control" id="txtEditarEmail" readonly>
                                <br><input name="mensaje" type="text" class="form-control" id="txtEditarMensaje" readonly>
                                <div class="form-group">
                                    <label for="sel1">Seleccionar estado:</label>
                                    <select name="estado" class="form-control" id="txtEditarEstado">
                                        <option>Desactivado</option>
                                        <option>Activado</option>
                                    </select>
                                </div>
                            </center>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-primary btnGuardar" id="btnEditarUsuarios">Guardar Usuario</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>