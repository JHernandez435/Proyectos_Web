<?php
include_once "../controlador/usuariosControlador.php";
include_once "../modelos/usuariosModelo.php";

class dataTableUsuariosSistemas{
    public function fnCargarTablaSistemas(){
        $objRespuesta = usuariosControlador::fnCtrCargarSistemas();
        if (count($objRespuesta) >= 1){
            $objJson = '{
                "data": [';
                for ($i=0; $i < count($objRespuesta); $i++) { 
                    $nombres = $objRespuesta[$i]["nombre"];
                    $apellidos = $objRespuesta[$i]["apellido"];
                    $dependencia = $objRespuesta[$i]["dependencia"];                    
                    $salario= $objRespuesta[$i]["salario"];

                    $objJson .='[
                        "'.($i+1).'",
                        "'.$nombres.'",
                        "'.$apellidos.'",
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
                    ""
                  ]
                ]
              }';
        }

        echo $objJson;

    }
}

$objTabla = new dataTableUsuariosSistemas();
$objTabla->fnCargarTablaSistemas();