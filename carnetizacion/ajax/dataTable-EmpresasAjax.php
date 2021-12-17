<?php
include_once "../controlador/empresasControlador.php";
include_once "../modelos/empresasModelo.php";

class dataTableEmpresas{
    public function fnCargarTabla(){
        $objRespuesta = empresasControlador::fnCtrCargarEmpresas();
        if (count($objRespuesta) >= 1){
            $objJson = '{
                "data": [';
                for ($i=0; $i < count($objRespuesta); $i++) { 
                    $nombres = $objRespuesta[$i]["nombre"];
                    $direccion = $objRespuesta[$i]["direccion"];
                    $objBotones = "<div class='btn-group'>";
                    $objBotones .= "<button id='btnEditar' class='btn btn-sm btn-primary' title='editar' data-toggle='modal' data-target='#modalEmpresaUsuario' idempresa='".$objRespuesta[$i]["idempresa"]."' nombre='".$nombres."' direccion='".$direccion."'><i class='fa fa-edit'></i></button>";
                    
                    $objBotones .= "</div>";

                    $objJson .='[
                        "'.($i+1).'",
                        "'.$nombres.'",
                        "'.$direccion.'",
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
                    ""
                  ]
                ]
              }';
        }

        echo $objJson;

    }
}

$objTabla = new dataTableEmpresas();
$objTabla->fnCargarTabla();