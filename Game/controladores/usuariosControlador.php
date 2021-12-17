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
    public static function fnCtrRegistrarUsuarios($loginUser, $loginPass)
    {
        $objRespuesta = usuariosModelo::fnMdlRegistrarUsuarios($loginUser, $loginPass);
        return $objRespuesta;
    }
    
}