<?php
include_once "../controlador/empresasControlador.php";
include_once "../modelos/empresasModelo.php";

class empresasAjax
{
    public $idEmpresa;
    public $nombres;
    public $direccion;
    public $telefono;
    public $correo;
    public $imagen;

    // insertar usuario
    public function fnInsertarEmpresas()
    {
        $objRespuesta = empresasControlador::fnCtrRegistrarEmpresas($this->nombres, $this->direccion, $this->telefono, $this->correo, $this->imagen);
        $respuesta['resultado'] = array($objRespuesta);
        echo json_encode($respuesta);
    }


}

// insertar usuario
if (isset($_POST["envioNombres"])) {
    $objEmpresa = new empresasAjax();
    $objEmpresa->nombres = $_POST["envioNombres"];
    $objEmpresa->direccion = $_POST["envioDireccion"];
    $objEmpresa->telefono = $_POST["envioTelefono"];
    $objEmpresa->correo = $_POST["envioCorreo"];
    $objEmpresa->imagen = $_FILES["envioImagen"];
    $objEmpresa->fnInsertarEmpresas();
}

