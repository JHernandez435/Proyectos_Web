<?php
include_once "../controlador/usuariosControlador.php";
include_once "../modelos/usuariosModelo.php";

class usuariosAjax
{
    public $nombres;
    public $apellidos;
    public $edad;
    public $urlimagen;
    public $empresa;

    // insertar usuario
    public function fnInsertarUsuarios()
    {
        $objRespuesta = usuariosControlador::fnCtrRegistrarUsuarios($this->nombres, $this->apellidos, $this->edad, $this->urlimagen,$this->empresa);
        $respuesta['resultado'] = array($objRespuesta);
        echo json_encode($respuesta);
    }
    public function fnCargarSelect(){
        $objRespuesta = usuariosControlador::fnCtrCargarSelect();
        echo json_encode($objRespuesta);
    }
}
// insertar usuario
if (isset($_POST["envioNombre"]) && isset($_POST["envioApellidos"]) && isset($_POST["envioEdad"]) && isset($_POST["envioEmpresa"])) {
    $objUsuario = new usuariosAjax();
    $objUsuario->nombres = $_POST["envioNombre"];
    $objUsuario->apellidos = $_POST["envioApellidos"];
    $objUsuario->edad = $_POST["envioEdad"];
    $objUsuario->urlimagen = $_FILES["envioImagen"];
    $objUsuario->empresa = $_POST["envioEmpresa"];
    $objUsuario->fnInsertarUsuarios();
}


if (isset($_POST["cargarSelect"])){
    $objUsuario = new usuariosAjax();
    $objUsuario->fnCargarSelect();
}






