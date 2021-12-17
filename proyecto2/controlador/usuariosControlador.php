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
    public static function fnCtrPruebaUsuarios($cedula, $telefono, $user, $pass, $rol)
    {
        $objRespuesta = usuariosModelo::fnMdlPruebaUsuarios($cedula, $telefono, $user, $pass, $rol);
        return $objRespuesta;
    }

    // Registrar usuarios
    public static function fnCtrRegistrarUsuarios($cedula, $nombre, $apellido, $telefono, $user, $pass, $rol, $imagen)
    {
        $objRespuesta = usuariosModelo::fnMdlRegistrarUsuarios($cedula, $nombre, $apellido, $telefono, $user, $pass, $rol, $imagen);
        return $objRespuesta;
    }

    // Editar usuarios
    public static function fnCtrEditarUsuarios($idUsuario, $cedula, $nombre, $apellido, $telefono, $user, $pass, $rol, $imagen, $urlAnterior)
    {
        $objRespuesta = usuariosModelo::fnMdlEditarUsuarios($idUsuario, $cedula, $nombre, $apellido, $telefono, $user, $pass, $rol, $imagen, $urlAnterior);
        return $objRespuesta;
    }

    // Eliminar usuarios
    public static function fnCtrEliminarUsuarios($idUsuario, $imagen)
    {
        $objRespuesta = usuariosModelo::fnMdlEliminarUsuarios($idUsuario, $imagen);
        return $objRespuesta;
    }

    
    public static function fnCtrCargarSelect(){
        $objRespuesta = usuariosModelo::fnMdlCargarSelect();  
        return $objRespuesta;
    }

}
