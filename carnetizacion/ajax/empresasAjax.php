<?php
include_once "../controlador/empresasControlador.php";
include_once "../modelos/empresasModelo.php";

class empresasAjax
{
    public $nombres;
    public $direccion;

    // insertar usuario
    public function fnInsertarEmpresas()
    {
        $objRespuesta = empresasControlador::fnCtrRegistrarEmpresas($this->nombres,$this->direccion);
        $respuesta['resultado'] = array($objRespuesta);
        echo json_encode($respuesta);
    }
}
// insertar usuario
if (isset($_POST["envioNombre"]) && isset($_POST["envioDireccion"])) {
    $objUsuario = new empresasAjax();
    $objUsuario->nombres = $_POST["envioNombre"];
    $objUsuario->direccion = $_POST["envioDireccion"];
    $objUsuario->fnInsertarEmpresas();
}

