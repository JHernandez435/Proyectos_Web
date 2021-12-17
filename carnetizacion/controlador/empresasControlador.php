<?php

class empresasControlador
{

    // listar Empresas
    public static function fnCtrCargarEmpresas()
    {
        $objRespuesta = empresasModelo::fnMdlCargarEmpresas();
        return $objRespuesta;
    }

    // listar Usuarios Empresas
    public static function fnCtrCargarUsuariosEmpresas()
    {
        $objRespuesta = empresasModelo::fnMdlCargarUsuariosEmpresas();
        return $objRespuesta;
    }
    
    // Registrar usuarios
    public static function fnCtrRegistrarEmpresas($nombres,$direccion)
    {
        $objRespuesta = empresasModelo::fnMdlRegistrarEmpresas($nombres,$direccion);
        return $objRespuesta;
    }
}
