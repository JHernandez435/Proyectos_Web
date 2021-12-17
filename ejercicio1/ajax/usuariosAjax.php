<?php
include_once "../controlador/usuariosControlador.php";
include_once "../modelos/usuariosModelo.php";

class usuariosAjax
{
    public $idUsuario;
    public $nombres;
    public $apellidos;
    public $dependencias;
    public $salarios;

    // insertar usuario
    public function fnInsertarUsuarios()
    {
        $objRespuesta = usuariosControlador::fnCtrRegistrarUsuarios($this->nombres, $this->apellidos, $this->dependencias, $this->salarios);
        $respuesta['resultado'] = array($objRespuesta);
        echo json_encode($respuesta);
    }


}

// insertar usuario
if (isset($_POST["envioNombres"])) {
    $objUsuario = new usuariosAjax();
    $objUsuario->nombres = $_POST["envioNombres"];
    $objUsuario->apellidos = $_POST["envioApellidos"];
    $objUsuario->dependencias = $_POST["envioDependencias"];
    $objUsuario->salarios = $_POST["envioSalarios"];
    $objUsuario->fnInsertarUsuarios();
}

