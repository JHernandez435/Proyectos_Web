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
    public static function fnCtrRegistrarUsuarios($nombres, $apellidos,$edad,$urlimagen,$empresa)
    {
        $objRespuesta = usuariosModelo::fnMdlRegistrarUsuarios($nombres, $apellidos,$edad,$urlimagen,$empresa);
        return $objRespuesta;
    }


    public static function fnCtrCargarSelect(){
        $objRespuesta = usuariosModelo::fnMdlCargarSelect();  
        return $objRespuesta;
    }
}
