<?php
include_once "../controlador/usuariosControlador.php";
include_once "../modelos/usuariosModelo.php";

class usuariosAjax
{
    public $nombres;
    public $cedula;
    public $telefono;
    public $edad;
    public $correo;
    public $mensaje;
    public $estado;

    // insertar usuario
    public function fnInsertarUsuarios()
    {
        $objRespuesta = usuariosControlador::fnCtrRegistrarUsuarios($this->nombre, $this->cedula, $this->telefono, $this->edad,$this->correo,$this->mensaje,$this->estado);
        $respuesta['resultado'] = array($objRespuesta);
        echo json_encode($respuesta);
    }
    // modificar usuario
    public function fnEditarUsuarios(){
        $objRespuesta = usuariosControlador::fnCtrEditarUsuarios($this->idUsuario,$this->estado);
        $respuesta['resultado'] = array($objRespuesta);
        echo json_encode( $respuesta);
    }

}

// insertar usuario
if (isset($_POST["envioNombre"]) && isset($_POST["envioCedula"]) && isset($_POST["envioTelefono"]) && isset($_POST["envioEdad"]) && isset($_POST["envioCorreo"])&& isset($_POST["envioMensaje"])&& isset($_POST["envioEstado"])) {
    $objUsuario = new usuariosAjax();
    $objUsuario->nombre = $_POST["envioNombre"];
    $objUsuario->cedula = $_POST["envioCedula"];
    $objUsuario->telefono = $_POST["envioTelefono"];
    $objUsuario->edad = $_POST["envioEdad"];
    $objUsuario->correo = $_POST["envioCorreo"];
    $objUsuario->mensaje = $_POST["envioMensaje"];
    $objUsuario->estado = $_POST["envioEstado"];
    $objUsuario->fnInsertarUsuarios();
}

if (isset($_POST["idEditarUsuario"]) && isset($_POST["editarEstado"])){
    $objUsuario = new usuariosAjax();
    $objUsuario->idUsuario = $_POST["idEditarUsuario"];
    $objUsuario->estado = $_POST["editarEstado"];

    $objUsuario->fnEditarUsuarios();

}

