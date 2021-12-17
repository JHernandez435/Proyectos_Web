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
    public static function fnCtrRegistrarUsuarios($nombres,$apellidos,$telefono, $empresa, $especialidad, $imagen)
    {
        $objRespuesta = usuariosModelo::fnMdlRegistrarUsuarios($nombres,$apellidos,$telefono, $empresa, $especialidad, $imagen);
        return $objRespuesta;
    }

}
