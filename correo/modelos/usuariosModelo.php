<?php
include_once "conexion.php";

class usuariosModelo
{

    // metodo de listar todos los usuarios
    public static function fnMdlCargarUsuarios()
    {
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM usuario");
        $objRespuesta->execute();
        $objUsuarios = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $objUsuarios;
    }

    


    // metodo de registrar usuarios
    public static function fnMdlRegistrarUsuarios($nombre, $cedula,$telefono,$edad,$correo,$mensaje,$estado)
    {
        $respuesta = "";

        if ($respuesta == "") {
            try {
                $objRespuesta = Conexion::conectar()->prepare("INSERT INTO usuario(nombre,cedula,telefono,edad,correo,mensaje,estado)VALUES('$nombre','$cedula','$telefono','$edad','$correo','$mensaje','$estado')");
                if ($objRespuesta->execute()) {
                    $respuesta = true;
                }
            } catch (Exception $e) {
                $respuesta =  $e;
            }
        }

        return $respuesta;
    }

    // metodo para editar usuarios
    public static function fnMdlEditarUsuarios($idUsuario,$estado)
    {
        $respuesta = "";
        if ($respuesta == ""){
            try {
                $objRespuesta = Conexion::conectar()->prepare("UPDATE usuario SET estado = '$estado' WHERE idusuario ='$idUsuario'");
                if ($objRespuesta->execute()) {
                    $respuesta = true;
                }
            } catch (Exception $e) {
                $respuesta =  $e;
            }
        }
        return $respuesta;
    }

    

}