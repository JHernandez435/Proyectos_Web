<?php
include_once "../controlador/usuariosControlador.php";
include_once "../modelos/usuariosModelo.php";

class dataTableUsuarios{
    public function fnCargarTabla(){
        $objRespuesta = usuariosControlador::fnCtrCargarUsuarios();
        if (count($objRespuesta) >= 1){
            $objJson = '{
                "data": [';
                for ($i=0; $i < count($objRespuesta); $i++) { 
                    $cedula = $objRespuesta[$i]["cedula"];
                    $nombre = $objRespuesta[$i]["nombre"];
                    $telefono = $objRespuesta[$i]["telefono"];
                    $edad = $objRespuesta[$i]["edad"];                    
                    $email = $objRespuesta[$i]["email"];
                    $mensaje = $objRespuesta[$i]["mensaje"];
                    $estado = $objRespuesta[$i]["estado"];

                    $objBotones = "<div class='btn-group'>";
                    $objBotones .= "<button id='btnEditar' class='btn btn-sm btn-primary' title='editar' data-toggle='modal' data-target='#modalEditarUsuario' idCita='".$objRespuesta[$i]["idcita"]."' cedula='".$cedula."' nombre='".$nombre."' telefono='".$telefono."' edad='".$edad."' email='".$email."'mensaje='".$mensaje."' estado='".$estado."'><i class='fa fa-edit'></i></button>";
                    $objBotones .= "</div>";

                    $objJson .='[
                        "'.($i+1).'",
                        "'.$cedula.'",
                        "'.$nombre.'",
                        "'.$telefono.'",
                        "'.$edad.'",
                        "'.$email.'",
                        "'.$mensaje.'",
                        "'.$estado.'",
                        "'.$objBotones.'"
                      ],';
                }
                $objJson = substr($objJson,0,-1);
                $objJson .=']}';

        }else{
            $objJson = '{
                "data": [
                  [
                    "No hay registros disponibles",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    ""
                  ]
                ]
              }';
        }

        echo $objJson;

    }
}

$objTabla = new dataTableUsuarios();
$objTabla->fnCargarTabla();