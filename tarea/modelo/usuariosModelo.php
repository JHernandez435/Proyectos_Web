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

    // metodo de listar todos los Sistemas
    public static function fnMdlCargarSistemas()
    {
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE dependencia = 'sistemas' ");
        $objRespuesta->execute();
        $objUsuarios = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $objUsuarios;
    }

    // metodo de listar contabilidad
    public static function fnMdlCargarContabilidad()
    {
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE dependencia = 'contabilidad' ");
        $objRespuesta->execute();
        $objUsuarios = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $objUsuarios;
    }

    // metodo de listar salud
    public static function fnMdlCargarSalud()
    {
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE dependencia = 'salud' ");
        $objRespuesta->execute();
        $objUsuarios = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $objUsuarios;
    }


    // metodo de registrar usuarios
    public static function fnMdlRegistrarUsuarios($nombres,$apellidos,$dependencia,$salario)
    {
    $objRespuesta = Conexion::conectar()->prepare("INSERT INTO usuario(nombres,apellidos,dependencia,salario)VALUES('$nombres','$apellidos','$dependencia','$salario')");
    if ($objRespuesta->execute()) {
        $respuesta = true;
    }
        return $respuesta;
    }

    

}