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
                    $nombre = $objRespuesta[$i]["nombres"];
                    $apellido = $objRespuesta[$i]["apellidos"];
                    $telefono = $objRespuesta[$i]["telefono"];
                    $imagen = $objRespuesta[$i]["urlimagen"];

                    $objBotones = "<div class='btn-group'>";
                    $objBotones .= "<center><button id='btnEditar' class='btn btn-sm btn-success' title='editar' data-toggle='modal' data-target='#modalEditarUsuario' idUsuario='".$objRespuesta[$i]["idusuario"]."' nombre='".$nombre."' apellido='".$apellido."' telefono='".$telefono."' imagen='".$imagen."'><i class='fa fa-edit'></i></button>";
                    $objBotones .= "<button id='btnEliminar' class='btn btn-sm btn-danger' title='eliminar' idUsuario='".$objRespuesta[$i]["idusuario"]."' imagen='".$imagen."'><i class='far fa-window-close'></i></button></center>";
                    $objBotones .= "</div>";

                    $objImagen = "<img src='".$imagen."' width='80' heigth='80'>";

                    $objJson .='[
                        "'.($i+1).'",
                        "'.$nombre.'",
                        "'.$apellido.'",
                        "'.$telefono.'",
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