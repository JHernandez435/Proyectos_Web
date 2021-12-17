<?php

class empresasControlador
{

    // listar  empresas
    public static function fnCtrCargarEmpresas()
    {
        $objRespuesta = empresasModelo::fnMdlCargarEmpresas();
        return $objRespuesta;
    }

    // listar empresas
    public static function fnCtrCargarEmpleado()
    {
        $objRespuesta = empresasModelo::fnMdlCargarEmpleado();
        return $objRespuesta;
    }

    // Registrar empresas
    public static function fnCtrRegistrarEmpresas($nombres, $direccion, $telefono, $correo, $imagen)
    {
        $objRespuesta = empresasModelo::fnMdlRegistrarEmpresas($nombres, $direccion, $telefono, $correo, $imagen);
        return $objRespuesta;
    }

}
