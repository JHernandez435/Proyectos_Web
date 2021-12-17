<?php
include_once "../controlador/empresasControlador.php";
include_once "../modelos/empresasModelo.php";

class dataTableEmpresasU{
    public function fnCargarTabla(){
        $objRespuesta = empresasControlador::fnCtrCargarUsuariosEmpresas();
        if (count($objRespuesta) >= 1){
            $objJson = '{
                "data": [';
                for ($i=0; $i < count($objRespuesta); $i++) { 
                    $empresa = $objRespuesta[$i]["empresa"];
                    $idempresa = $objRespuesta[$i]["idempresa"];
                    $nombreus=  $objRespuesta[$i]["nombres"];

                    $objJson .='[
                        "'.($i+1).'",
                        "'.$empresa.'",
                        "'.$idempresa.'",
                        "'.$nombreus.'"

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
                    ""
                  ]
                ]
              }';
        }

        echo $objJson;

    }
}

$objTabla = new dataTableEmpresasU();
$objTabla->fnCargarTabla();