<?php
include_once "../controlador/usuariosControlador.php";
include_once "../modelos/usuariosModelo.php";

class usuariosAjax
{
    public $idUsuario;
    public $nombres;
    public $apellidos;
    public $telefono;
    public $empresa;
    public $especialidad;
    public $imagen;

    // insertar usuario
    public function fnInsertarUsuarios()
    {
        $objRespuesta = usuariosControlador::fnCtrRegistrarUsuarios($this->nombres, $this->apellidos, $this->telefono, $this->empresa, $this->especialidad, $this->imagen );
        $respuesta['resultado'] = array($objRespuesta);
        echo json_encode($respuesta);
    }


}

// insertar usuario
if (isset($_POST["envioNombres"])) {
    $objUsuario = new usuariosAjax();
    $objUsuario->nombres = $_POST["envioNombres"];
    $objUsuario->apellidos = $_POST["envioApellidos"];
    $objUsuario->telefono = $_POST["envioTelefono"];
    $objUsuario->empresa = $_POST["envioEmpresa"];
    $objUsuario->especialidad = $_POST["envioEspecialidad"];
    $objUsuario->imagen = $_FILES["envioImagen"];
    $objUsuario->fnInsertarUsuarios();
}

