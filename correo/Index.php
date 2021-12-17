<?php
require_once "controlador/usuariosControlador.php";
require_once "modelos/usuariosModelo.php";
require_once "modelos/conexion.php";
?>
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

    $mail->setFrom($_POST['correo'], $_POST['nombre']);
    $mail->addAddress('anamariacipagauta@gmail.com');
    $mail->addReplyTo($_POST['correo'], $_POST['nombre']);

    $mail->isHTML(true);
    $mail->Subject = 'Enviado por ' . $_POST['nombre'];
    $mail->Body = '<h1 align=center>Nombre: ' . $_POST['nombre'] . '<br> Email: ' . $_POST['correo'] . '<br>Mensaje: ' . $_POST['mensaje'] . '<br>Telefono: ' . $_POST['telefono'] . '</h1>';

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
    <title>Correo</title>
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
        <div class="col-md-4">
        </div>

        <div class="col-md-4">

            <form action="" method="post" class="resgistrar">
                <div class="form-group">
                    <label for="txtNombre">Nombres:</label>
                    <input type="text" name="nombre" class="form-control" id="txtNombre">
                    <div class="errores" id="valida-txtNombre"></div>
                </div>

                <div class="form-group">
                    <label for="txtCedula">Cedula:</label>
                    <input type="number" name="cedula" class="form-control" id="txtCedula">
                    <div class="errores" id="valida-txtCedula"></div>
                </div>
                <div class="form-group">
                    <label for="txtTelefono">Telefono:</label>
                    <input type="number" name="telefono" class="form-control" id="txtTelefono">
                    <div class="errores" id="valida-txtTelefono"></div>
                </div>
                <div class="form-group">
                    <label for="txtEdad">Edad:</label>
                    <input type="number" name="edad" class="form-control" id="txtEdad">
                    <div class="errores" id="valida-txtEdad"></div>
                </div>
                <div class="form-group">
                    <label for="txtCorreo">Correo:</label>
                    <input type="text" name="correo" class="form-control" id="txtCorreo">
                    <div class="errores" id="valida-txtCorreo"></div>
                </div>
                <div class="form-group">
                    <label for="txtMensaje">Mensaje:</label>
                    <input type="text" name="mensaje" class="form-control" id="txtMensaje">
                    <div class="errores" id="valida-txtMensaje"></div>
                </div>
                <div class="form-group">
                    <label for="txtEstado">Estado:</label>
                    <input type="text" name="estado" class="form-control" id="txtEstado" value="Espera" disabled>
                    <div class="errores" id="valida-txtEstado"></div>
                </div>

                <button name="submit" type="submit"  class="btn btn-danger btnGuardar" id="btnGuardar">Enviar</button>
                <a type="button" href='tabla.php' class="btn btn-danger">Lista</a>
            </form>
        </div>


        <script src='vistas/js/main.js'></script>

</body>

</html>