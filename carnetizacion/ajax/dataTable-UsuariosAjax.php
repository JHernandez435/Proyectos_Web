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
                    $nombres = $objRespuesta[$i]["nombres"];
                    $apellidos = $objRespuesta[$i]["apellidos"];
                    $edad = $objRespuesta[$i]["edad"];                    
                    $urlimagen= $objRespuesta[$i]["urlimagen"];
                    $empresa= $objRespuesta[$i]["empresa"];
                    $objBotones = "<div class='btn-group'>";
                    $objBotones .= "<button id='btnEditar' class='btn btn-sm btn-primary' title='editar' data-toggle='modal' data-target='#modalCarnet' idusuario='".$objRespuesta[$i]["idusuario"]."' nombres='".$nombres."' apellidos='".$apellidos."' edad='".$edad."' urlimagen='".$urlimagen."'><i class='fa fa-edit'></i></button>";
                    $objBotones .= "</div>";
                    $objImagen = "<img src='".$urlimagen."' width='80' heigth='80'>";

                    $objJson .='[
                        "'.($i+1).'",
                        "'.$nombres.'",
                        "'.$apellidos.'",
                        "'.$edad.'",
                        "'.$objImagen.'",
                        "'.$empresa.'",
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