<?php
include_once "conexion.php";

class usuariosModelo
{

    // metodo de listar todos los usuarios
    public static function fnMdlCargarUsuarios()
    {
        $objRespuesta = Conexion::conectar()->query("SELECT * FROM usuarios");
        $objRespuesta->execute();
        $objUsuarios = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $objUsuarios;
    }
    // metodo de listar todos los usuarios
    public static function fnMdlCargarSistemas()
    {
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM usuarios where dependencia = 'Sistemas'");
        $objRespuesta->execute();
        $objUsuarios = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $objUsuarios;
    }
    // metodo de listar todos los usuarios
    public static function fnMdlCargarContabilidad()
    {
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM usuarios where dependencia = 'Contabilidad'");
        $objRespuesta->execute();
        $objUsuarios = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $objUsuarios;
    }
    // metodo de listar todos los usuarios
    public static function fnMdlCargarSalud()
    {
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM usuarios where dependencia = 'Salud'");
        $objRespuesta->execute();
        $objUsuarios = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $objUsuarios;
    }



    // metodo de registrar usuarios
    public static function fnMdlRegistrarUsuarios($nombres, $apellidos, $dependencias, $salarios)
    {

        $respuesta = "";
        $objRespuesta = Conexion::conectar()->prepare("INSERT INTO usuarios(nombre,apellido,dependencia,salario)VALUES('$nombres','$apellidos','$dependencias','$salarios')");

        if ($objRespuesta->execute()) {
            $respuesta = true;
        }

        return $respuesta;
    }

}
