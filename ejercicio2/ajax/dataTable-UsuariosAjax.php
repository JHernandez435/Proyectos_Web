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
                    $apellido = $objRespuesta[$i]["apellido"];
                    $telefono = $objRespuesta[$i]["telefono"];
                    $especialidad = $objRespuesta[$i]["especialidad"];                    
                    $empresa= $objRespuesta[$i]["empresa"];
                    $imagen= $objRespuesta[$i]["urlimagen"];

                    $objBotones = "<div class='btn-group'>";
                    $objBotones .= "<button id='btnImprimir' class='btn btn-sm btn-primary' title='editar' data-toggle='modal' data-target='#modalEditarUsuario' idUsuario='".$objRespuesta[$i]["idusuario"]."' nombre='".$nombre."' apellido='".$apellido."' telefono='".$telefono."' especialidad='".$especialidad."' empresa='".$empresa."' imagen='".$imagen."'><i class='fa fa-edit'></i></button>";
                    $objBotones .= "</div>";

                    $objImagen = "<img src='".$imagen."' width='80' heigth='80'>";

                    $objJson .='[
                        "'.($i+1).'",
                        "'.$nombre.'",
                        "'.$apellido.'",
                        "'.$telefono.'",
                        "'.$especialidad.'",
                        "'.$empresa.'",
                        "'.$objImagen.'",
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