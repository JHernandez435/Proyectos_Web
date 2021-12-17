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
                    $cedula = $objRespuesta[$i]["cedula"];
                    $nombre = $objRespuesta[$i]["nombre"];
                    $apellido = $objRespuesta[$i]["apellido"];
                    $telefono = $objRespuesta[$i]["telefono"];
                    $user = $objRespuesta[$i]["user"];
                    $pass = $objRespuesta[$i]["pass"];
                    $rol = $objRespuesta[$i]["rol_idrol"];
                    $nombrerol = $objRespuesta[$i]["nombrerol"];
                    $imagen = $objRespuesta[$i]["urlimagen"];

                    $objBotones = "<div class='btn-group'>";
                    $objBotones .= "<button id='btnEditar' class='btn btn-sm btn-primary' title='editar' data-toggle='modal' data-target='#modalEditarUsuario' idUsuario='".$objRespuesta[$i]["idusuario"]."' cedula='".$cedula."' nombre='".$nombre."' apellido='".$apellido."' telefono='".$telefono."' user='".$user."' pass='".$pass."' rol='".$rol."' imagen='".$imagen."'><i class='fa fa-edit'></i></button>";
                    $objBotones .= "<button id='btnEliminar' class='btn btn-sm btn-danger' title='eliminar' idUsuario='".$objRespuesta[$i]["idusuario"]."' imagen='".$imagen."'><i class='far fa-window-close'></i></button>";
                    $objBotones .= "</div>";

                    $objImagen = "<img src='".$imagen."' width='80' heigth='80'>";

                    $objJson .='[
                        "'.($i+1).'",
                        "'.$cedula.'",
                        "'.$nombre.'",
                        "'.$apellido.'",
                        "'.$telefono.'",
                        "'.$user.'",
                        "'.$pass.'",
                        "'.$nombrerol.'",
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