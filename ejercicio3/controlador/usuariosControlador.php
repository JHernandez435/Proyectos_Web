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
    public static function fnCtrRegistrarUsuarios($cedula, $nombre, $telefono, $edad, $email, $mensaje)
    {
        $objRespuesta = usuariosModelo::fnMdlRegistrarUsuarios($cedula, $nombre, $telefono, $edad, $email, $mensaje);
        return $objRespuesta;
    }

    // Editar usuarios
    public static function fnCtrEditarUsuarios($idCita, $cedula, $nombre, $telefono, $email, $mensaje, $estado)
    {
        $objRespuesta = usuariosModelo::fnMdlEditarUsuarios($idCita, $cedula, $nombre, $telefono, $email, $mensaje, $estado);
        return $objRespuesta;
    }
}
