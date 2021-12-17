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
                    $nombre = $objRespuesta[$i]["nombre"];
                    $cedula = $objRespuesta[$i]["cedula"];
                    $telefono = $objRespuesta[$i]["telefono"];                    
                    $edad= $objRespuesta[$i]["edad"];
                    $correo = $objRespuesta[$i]["correo"];
                    $mensaje = $objRespuesta[$i]["mensaje"];                    
                    $estado= $objRespuesta[$i]["estado"];
                    $objBotones = "<div class='btn-group'>";
                    $objBotones .= "<button id='btnEditar' class='btn btn-sm btn-primary' title='editar' data-toggle='modal' data-target='#modalEditarUsuario' idUsuario='".$objRespuesta[$i]["idusuario"]."'estado='".$estado."'><i class='fa fa-edit'></i></button>";
                    $objBotones .= "</div>";

                    $objJson .='[
                        "'.($i+1).'",
                        "'.$nombre.'",
                        "'.$cedula.'",
                        "'.$telefono.'",
                        "'.$edad.'",
                        "'.$correo.'",
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