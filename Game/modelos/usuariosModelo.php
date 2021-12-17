<?php
include_once "conexion.php";

class usuariosModelo
{

    // metodo de listar todos los usuarios
    public static function fnMdlCargarUsuarios()
    {
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM users");
        $objRespuesta->execute();
        $objUsuarios = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $objUsuarios;
    }
    
    // metodo de registrar usuarios
    public static function fnMdlRegistrarUsuarios($loginUser, $loginPass)
    {
            try {
                $objRespuesta = Conexion::conectar()->prepare("INSERT INTO users(username,password)VALUES('$loginUser','$loginPass')");
                if ($objRespuesta->execute()) {
                    $respuesta = true;
                }
            } catch (Exception $e) {
                $respuesta =  $e;
            }

        return $respuesta;
    }

}