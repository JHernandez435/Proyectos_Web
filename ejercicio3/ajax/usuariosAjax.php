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
        $objRespuesta = usuariosControlador::fnCtrRegistrarUsuarios($this->cedula, $this->nombre, $this->telefono, $this->edad, $this->email, $this->mensaje);
        $respuesta['resultado'] = array($objRespuesta);
        echo json_encode($respuesta);
    }

    // modificar usuario
    public function fnEditarUsuarios()
    {
        $objRespuesta = usuariosControlador::fnCtrEditarUsuarios($this->idCita, $this->cedula, $this->nombre, $this->telefono, $this->email, $this->mensaje, $this->estado);
        $respuesta['resultado'] = array($objRespuesta);
        echo json_encode($respuesta);
    }
}

// insertar usuario
if (isset($_POST["envioNombre"])) {
    $objUsuario = new usuariosAjax();
    $objUsuario->cedula = $_POST["envioCedula"];
    $objUsuario->nombre = $_POST["envioNombre"];
    $objUsuario->telefono = $_POST["envioTelefono"];
    $objUsuario->edad = $_POST["envioEdad"];
    $objUsuario->email = $_POST["envioEmail"];
    $objUsuario->mensaje = $_POST["envioMensaje"];
    $objUsuario->fnInsertarUsuarios();
}

// modificar usuario
if (isset($_POST["idEditarCita"]) && isset($_POST["editarCedula"])) {
    $objUsuario = new usuariosAjax();
    $objUsuario->idCita = $_POST["idEditarCita"];
    $objUsuario->cedula = $_POST["editarCedula"];
    $objUsuario->nombre = $_POST["editarNombre"];
    $objUsuario->telefono = $_POST["editarTelefono"];
    $objUsuario->email = $_POST["editarEmail"];
    $objUsuario->mensaje = $_POST["editarMensaje"];
    $objUsuario->estado = $_POST["editarEstado"];
    $objUsuario->fnEditarUsuarios();
}
