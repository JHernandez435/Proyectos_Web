<?php
include_once "../controlador/usuariosControlador.php";
include_once "../modelo/usuariosModelo.php";

class usuariosAjax{
    public $idusuario;
    public $nombres;
    public $apellidos;
    public $dependencia;
    public $salario;

    // insertar usuario
    public function fnInsertarUsuarios(){
        $objRespuesta = usuariosControlador::fnCtrRegistrarUsuarios($this->nombres, $this->apellidos, $this->dependencia,$this->salario);
        $respuesta['resultado'] = array($objRespuesta);
        echo json_encode($respuesta);
    }
     public function fnCargarSelect(){
        $objRespuesta = usuariosControlador::fnCtrCargarSelect();
        echo json_encode($objRespuesta);
    }

}

// insertar usuario
if (isset($_POST["envioNombre"]) && isset($_POST["envioApellidos"]) && isset($_POST["envioDependencia"]) && isset($_POST["envioSalario"])) {
    $objUsuario = new usuariosAjax();
    $objUsuario->nombres = $_POST["envioNombre"];
    $objUsuario->apellidos = $_POST["envioApellidos"];
    $objUsuario->dependencia = $_POST["envioDependencia"];
    $objUsuario->salario = $_POST["envioSalario"];
    $objUsuario->fnInsertarUsuarios();
}

if (isset($_POST["cargarSelect"])){
    $objUsuario = new usuariosAjax();
    $objUsuario->fnCargarSelect();
}