<?php
include_once "../controlador/usuariosControlador.php";
include_once "../modelos/usuariosModelo.php";

class usuariosAjax
{
    public $idUsuario;
    public $cedula;
    public $nombre;
    public $apellido;
    public $telefono;
    public $user;
    public $pass;
    public $rol;
    public $imagen;
    public $urlAnterior;

     // insertar usuario
    public function fnPruebaUsuarios()
    {
        $objRespuesta = usuariosControlador::fnCtrPruebaUsuarios($this->cedula, $this->telefono, $this->user, $this->pass,  $this->rol);
        $respuesta['resultado'] = array($objRespuesta);
        echo json_encode($respuesta);
    }

     // insertar usuario
    public function fnInsertarUsuarios()
    {
        $objRespuesta = usuariosControlador::fnCtrRegistrarUsuarios($this->cedula, $this->nombre, $this->apellido, $this->telefono, $this->user, $this->pass,  $this->rol, $this->imagen);
        $respuesta['resultado'] = array($objRespuesta);
        echo json_encode($respuesta);
    }

    // modificar usuario
    public function fnEditarUsuarios()
    {
        $objRespuesta = usuariosControlador::fnCtrEditarUsuarios($this->idUsuario, $this->cedula, $this->nombre, $this->apellido, $this->telefono, $this->user, $this->pass, $this->rol, $this->imagen, $this->urlAnterior);
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
if (isset($_POST["envioNombre"]) && isset($_POST["envioApellido"]) && isset($_POST["envioTelefono"])) {
    $objUsuario = new usuariosAjax();
    $objUsuario->cedula = $_POST["envioCedula"];
    $objUsuario->nombre = $_POST["envioNombre"];
    $objUsuario->apellido = $_POST["envioApellido"];
    $objUsuario->telefono = $_POST["envioTelefono"];
    $objUsuario->user = $_POST["envioUser"];
    $objUsuario->pass = $_POST["envioPass"];
    $objUsuario->rol = $_POST["envioRol"];
    $objUsuario->imagen = $_FILES["envioImagen"];
    $objUsuario->fnInsertarUsuarios();
}

// modificar usuario
if (isset($_POST["idEditarUsuario"]) && isset($_POST["editarNombre"]) && isset($_POST["editarApellido"]) && isset($_POST["editarTelefono"])) {
    $objUsuario = new usuariosAjax();
    $objUsuario->idUsuario = $_POST["idEditarUsuario"];
    $objUsuario->cedula = $_POST["editarCedula"];
    $objUsuario->nombre = $_POST["editarNombre"];
    $objUsuario->apellido = $_POST["editarApellido"];
    $objUsuario->telefono = $_POST["editarTelefono"];
    $objUsuario->user = $_POST["editarUser"];
    $objUsuario->pass = $_POST["editarPass"];
    $objUsuario->rol = $_POST["editarRol"];

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

// Registrar usuario
if (isset($_POST["envioCedula"]) && isset($_POST["envioPass"]) && isset($_POST["envioUser"])) {
    $objUsuario = new usuariosAjax();
    $objUsuario->cedula = $_POST["envioCedula"];
    $objUsuario->telefono = $_POST["envioTelefono"];
    $objUsuario->user = $_POST["envioUser"];
    $objUsuario->pass = $_POST["envioPass"];
    $objUsuario->rol = $_POST["envioRol"];
    $objUsuario->fnPruebaUsuarios();
}