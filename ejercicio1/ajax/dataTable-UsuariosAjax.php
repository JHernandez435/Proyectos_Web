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
                    $dependencia = $objRespuesta[$i]["dependencia"];                    
                    $salario= $objRespuesta[$i]["salario"];

                    $objJson .='[
                        "'.($i+1).'",
                        "'.$nombre.'",
                        "'.$apellido.'",
                        "'.$dependencia.'",
                        "'.$salario.'"
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