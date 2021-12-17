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
    public static function fnCtrRegistrarUsuarios($nombres, $apellidos, $telefono, $imagen)
    {
        $objRespuesta = usuariosModelo::fnMdlRegistrarUsuarios($nombres, $apellidos, $telefono, $imagen);
        return $objRespuesta;
    }

    // Editar usuarios
    public static function fnCtrEditarUsuarios($idUsuario, $nombres, $apellidos, $telefono, $imagen, $urlAnterior)
    {
        $objRespuesta = usuariosModelo::fnMdlEditarUsuarios($idUsuario, $nombres, $apellidos, $telefono, $imagen, $urlAnterior);
        return $objRespuesta;
    }

    // Eliminar usuarios
    public static function fnCtrEliminarUsuarios($idUsuario, $imagen)
    {
        $objRespuesta = usuariosModelo::fnMdlEliminarUsuarios($idUsuario, $imagen);
        return $objRespuesta;
    }



}
