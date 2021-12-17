<?php

class usuariosControlador
{

    // listar usuarios
    public static function fnCtrCargarUsuarios()
    {
        $objRespuesta = usuariosModelo::fnMdlCargarUsuarios();
        return $objRespuesta;
    }

    

    // Registrar usuarios
    public static function fnCtrRegistrarUsuarios($nombre, $cedula,$telefono,$edad,$correo,$mensaje,$estado)
    {
        $objRespuesta = usuariosModelo::fnMdlRegistrarUsuarios($nombre, $cedula,$telefono,$edad,$correo,$mensaje,$estado);
        return $objRespuesta;
    }

    public static function fnCtrEditarUsuarios($idUsuario,$estado){
        $objRespuesta = usuariosModelo::fnMdlEditarUsuarios($idUsuario,$estado);
        return $objRespuesta;
    }


}
