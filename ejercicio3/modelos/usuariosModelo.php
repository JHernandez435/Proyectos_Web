<?php
include_once "conexion.php";

class usuariosModelo
{

    // metodo de listar todos los usuarios
    public static function fnMdlCargarUsuarios()
    {
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM cita");
        $objRespuesta->execute();
        $objUsuarios = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $objUsuarios;
    }

    // metodo de registrar usuarios
    public static function fnMdlRegistrarUsuarios($cedula, $nombre, $telefono, $edad, $email, $mensaje)
    {

        $respuesta = "";
        $objRespuesta = Conexion::conectar()->prepare("INSERT INTO cita(cedula,nombre,telefono,edad,email,mensaje,estado)VALUES('$cedula','$nombre','$telefono','$edad','$email','$mensaje','espera')");

        if ($objRespuesta->execute()) {
            $respuesta = true;
        }

        return $respuesta;
    }

    // metodo para editar usuarios
    public static function fnMdlEditarUsuarios($idCita, $cedula, $nombre, $telefono, $email, $mensaje, $estado)
    {
        $respuesta = "";
        $objRespuesta = Conexion::conectar()->prepare("UPDATE cita SET cedula = '$cedula',nombre = '$nombre',telefono= '$telefono',email= '$email',mensaje= '$mensaje',estado= '$estado' WHERE idcita ='$idCita'");

        if ($objRespuesta->execute()) {
            $respuesta = true;
        }

        return $respuesta;
    }
}
