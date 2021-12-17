<?php
include_once "../controlador/usuariosControlador.php";
include_once "../modelos/usuariosModelo.php";

class usuariosAjax
{
    public $idUsuario;
    public $nombres;
    public $apellidos;
    public $telefono;
    public $clave;
    public $idrol;
    public $imagen;
    public $urlAnterior;

    // insertar usuario
    public function fnInsertarUsuarios()
    {
        $objRespuesta = usuariosControlador::fnCtrRegistrarUsuarios($this->nombres, $this->apellidos, $this->telefono,$this->clave,$this->idrol, $this->imagen);
        $respuesta['resultado'] = array($objRespuesta);
        echo json_encode($respuesta);
    }

    // modificar usuario
    public function fnEditarUsuarios()
    {
        $objRespuesta = usuariosControlador::fnCtrEditarUsuarios($this->idUsuario, $this->nombres, $this->apellidos, $this->telefono,$this->clave,$this->idrol, $this->imagen, $this->urlAnterior);
        $respuesta['resultado'] = array($objRespuesta);
        echo json_encode($respuesta);
    }

    // eliminar usuario
    public function fnEliminarUsuarios()
    {
        $objRespuesta = usuariosControlador::fnCtrEliminarUsuarios($this->idUsuario, $this->imagen);
        $respuesta['resultado'] = array($objRespuesta);
        echo json_encode($respuesta);
    }

    public function fnCargarSelect(){
        $objRespuesta = usuariosControlador::fnCtrCargarSelect();
        echo json_encode($objRespuesta);
    }



}

// insertar usuario
if (isset($_POST["envioNombre"]) && isset($_POST["envioApellidos"]) && isset($_POST["envioTelefono"]) && isset($_POST["envioClave"]) && isset($_POST["envioIdrol"])) {
    $objUsuario = new usuariosAjax();
    $objUsuario->nombres = $_POST["envioNombre"];
    $objUsuario->apellidos = $_POST["envioApellidos"];
    $objUsuario->telefono = $_POST["envioTelefono"];
    $objUsuario->clave = $_POST["envioClave"];
    $objUsuario->idrol = $_POST["envioIdrol"];
    $objUsuario->imagen = $_FILES["envioImagen"];
    $objUsuario->fnInsertarUsuarios();
}

// modificar usuario
if (isset($_POST["idEditarUsuario"]) && isset($_POST["editarNombre"]) && isset($_POST["editarApellidos"]) && isset($_POST["editarTelefono"])&& isset($_POST["editarClave"])&& isset($_POST["editarIdrol"])) {
    $objUsuario = new usuariosAjax();
    $objUsuario->idUsuario = $_POST["idEditarUsuario"];
    $objUsuario->nombres = $_POST["editarNombre"];
    $objUsuario->apellidos = $_POST["editarApellidos"];
    $objUsuario->telefono = $_POST["editarTelefono"];
    $objUsuario->clave = $_POST["editarClave"];
    $objUsuario->idrol = $_POST["editarIdrol"];

    if ($_POST["hayArchivo"] == "true") {
        $objUsuario->imagen = $_FILES["editarImagen"];
    } else {
        $objUsuario->imagen = null;
    }

    $objUsuario->urlAnterior = $_POST["eliminarImagenAnterior"];
    $objUsuario->fnEditarUsuarios();
}


// eliminar usuario
if (isset($_POST["idEliminarUsuario"]) && isset($_POST["eliminarImagen"])){
    $objUsuario = new usuariosAjax();
    $objUsuario->idUsuario = $_POST["idEliminarUsuario"];
    $objUsuario->imagen = $_POST["eliminarImagen"];
    $objUsuario->fnEliminarUsuarios();
}


if (isset($_POST["cargarSelect"])){
    $objUsuario = new usuariosAjax();
    $objUsuario->fnCargarSelect();
}