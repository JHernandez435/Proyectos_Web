<?php

class usuariosControlador
{

    // listar usuarios
    public static function fnCtrCargarUsuarios()
    {
        $objRespuesta = usuariosModelo::fnMdlCargarUsuarios();
        return $objRespuesta;
    }

    // listar usuarios
    public static function fnCtrCargarSistemas()
    {
        $objRespuesta = usuariosModelo::fnMdlCargarSistemas();
        return $objRespuesta;
    }

    // listar usuarios
    public static function fnCtrCargarContanbilidad()
    {
        $objRespuesta = usuariosModelo::fnMdlCargarContabilidad();
        return $objRespuesta;
    }

    // listar usuarios
    public static function fnCtrCargarSalud()
    {
        $objRespuesta = usuariosModelo::fnMdlCargarSalud();
        return $objRespuesta;
    }

    // Registrar usuarios
    public static function fnCtrRegistrarUsuarios($nombres,$apellidos,$dependencias, $salarios)
    {
        $objRespuesta = usuariosModelo::fnMdlRegistrarUsuarios($nombres, $apellidos,$dependencias, $salarios);
        return $objRespuesta;
    }

}
