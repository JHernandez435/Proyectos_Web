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
                    $nombre = $objRespuesta[$i]["nombre"];
                    $direccion = $objRespuesta[$i]["direccion"];
                    $telefono = $objRespuesta[$i]["telefono"];
                    $correo = $objRespuesta[$i]["correo"];                    
                    $imagen = $objRespuesta[$i]["urlimagen"];     

                    $objBotones = "<div class='btn-group'>";
                    $objBotones .= "<button id='btnEmpleado' data-toggle='modal' data-target='#modalEmpleado' class='btn btn-sm btn-success'><i class='fa fa-edit'></i></button>";
                    $objBotones .= "</div>";
                    
                    $objImagen = "<img src='".$imagen."' width='80' heigth='80'>";

                    $objJson .='[
                        "'.($i+1).'",
                        "'.$objImagen.'",
                        "'.$nombre.'",
                        "'.$direccion.'",
                        "'.$telefono.'",
                        "'.$correo.'",
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