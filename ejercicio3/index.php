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
    $mail->Body = '<h1>Cedula: ' . $_POST['cedula'] . '<br> Nombre: ' . $_POST['nombre']  . '<br>Mensaje: ' . $_POST['mensaje'] . '<br>Telefono: ' . $_POST['telefono'] .  '<br>Estado: ' . $_POST['estado'] . '<br> Email: ' . $_POST['email'] .'</h1> <h1 align=center>Cedula: ' . $_POST['cedula'] . '<br> Nombre: ' . $_POST['nombre']  . '<br>Mensaje: ' . $_POST['mensaje'] . '<br>Telefono: ' . $_POST['telefono'] .  '<br>Estado: ' . $_POST['estado'] . '<br> Email: ' . $_POST['email'] .'</h1>';

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <!-- archivos personalizados -->
    <link rel="stylesheet" type="text/css" href="vistas/css/styles.css">
    <link rel="stylesheet" type="text/css" href="vistas/css/scroll.css">
    <link rel="stylesheet" type="text/css" href="vistas/css/main.css">
    <link rel="stylesheet" type="text/css" href="vistas/css/panel.css">
    <script src='vistas/js/main.js'></script>
    <script src='vistas/js/tablaUsuarios.js'></script>

</head>

<body>


    <div class="container" id="registration-form">
        <center>
            <div class="ma-titulo">
                <font size="50" color="white" face=" Brush Script MT">
                    PROYECTO ADSI
                </font>
            </div>
        </center>
        <div class="image"></div>
        <div class="frm">
            <h1>Peticion de Cita</h1>
            <!-- Modal -->
            <form action="" method="post">
                <div class="form-group">
                    <label for="cedula">Cedula:</label>
                    <input type="text" class="form-control" name="cedula" id="txtCedula" placeholder="Enter cedula">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="txtNombre" placeholder="Enter nombre">
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono:</label>
                    <input type="number" class="form-control" name="telefono" id="txtTelefono" placeholder="Enter telefono">
                </div>
                <div class="form-group">
                    <label for="edad">Edad:</label>
                    <input type="text" class="form-control" name="edad" id="txtEdad" placeholder="Enter Edad">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" id="txtEmail" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="mensaje">Mensaje:</label>
                    <input type="text" class="form-control" name="mensaje" id="txtMensaje" placeholder="Enter Mensaje">
                    <input type="hidden" name="estado" value="Desactivado">
                </div>

                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary btnGuardar" id="btnGuardarUsuarios">Guardar Usuario</button>
                </div>

            </form>


        </div>
    </div>

    <input type="checkbox" class="checkbox" id="check">
    <label class="menu" for="check">|||</label>
    <div class="left-panel">

        <!-- Modal -->
        <div>

            <form enctype="multipart/form-data">
                <div class="form-group">
                    <label for="txtNombres">Usuario:</label>
                    <input style="color: black" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="txtApellidos">Password:</label>
                    <input style="color: black" type="text" class="form-control">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btnGuardar" onclick="location.href='administrador.php'">Entrada Administador</button>
                </div>

            </form>

        </div>

    </div>


</body>

</html>