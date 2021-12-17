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
    public static function fnCtrRegistrarUsuarios($nombres,$apellidos,$dependencia,$salario)
    {
        $objRespuesta = usuariosModelo::fnMdlRegistrarUsuarios($nombres, $apellidos,$dependencia,$salario);
        return $objRespuesta;
    }
    
    public static function fnCtrCargarSelect(){
        $objRespuesta = usuariosModelo::fnMdlCargarSelect();  
        return $objRespuesta;
    }
    public static function fnCtrCargarSistemas(){
        $objRespuesta = usuariosModelo::fnMdlCargarSistemas();  
        return $objRespuesta;
    }
    public static function fnCtrCargarContabilidad(){
        $objRespuesta = usuariosModelo::fnMdlCargarContabilidad();  
        return $objRespuesta;
    }
    public static function fnCtrCargarSalud(){
        $objRespuesta = usuariosModelo::fnMdlCargarSalud();  
        return $objRespuesta;
    }
}