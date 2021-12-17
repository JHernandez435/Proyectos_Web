<?php
include_once "../controlador/usuariosControlador.php";
include_once "../modelo/usuariosModelo.php";

class dataTableUsuarios{
    public function fnCargarTabla(){
        $objRespuesta = usuariosControlador::fnCtrCargarUsuarios();
        if (count($objRespuesta) >= 1){
            $objJson = '{
                "data": [';
                for ($i=0; $i < count($objRespuesta); $i++) { 
                    $nombres = $objRespuesta[$i]["nombres"];
                    $apellidos = $objRespuesta[$i]["apellidos"];
                    $dependencia = $objRespuesta[$i]["dependencia"];                    
                    $salario= $objRespuesta[$i]["salario"];

                    $objBotones = "<div class='btn-group'>";
                    $objBotones .=  "<button id='btnComprar' class='btn btn-sm btn-danger' title='Comprar' idproductos='".$objRespuesta[$i]["idproductos"]."' nombres='".$nombres."' apellidos='".$apellidos."' dependencia='".$dependencia."' salario=' ".$salario."'><i class='far fa- btn-danger'>Comprar</i></button>";
                    
                    $objBotones .= "</div>";


                    $objJson .='[
                        "'.($i+1).'",
                        "'.$nombres.'",
                        "'.$apellidos.'",
                        "'.$dependencia.'",
                        "'.$salario.'",
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