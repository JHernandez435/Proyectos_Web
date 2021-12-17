<?php
include_once "conexion.php";

class usuariosModelo
{

    // metodo de listar todos los usuarios
    public static function fnMdlCargarUsuarios()
    {
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM usuario");
        $objRespuesta->execute();
        $objUsuarios = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $objUsuarios;
    }

    // metodo de registrar usuarios
    public static function fnMdlRegistrarUsuarios($nombres,$apellidos,$telefono, $empresa, $especialidad, $imagen)
    {
        $respuesta = usuariosModelo::subirArchivo($imagen);
        $urlImagen = "archivos/" . $imagen['name'];

        if ($respuesta == "") {
            try {
                $objRespuesta = Conexion::conectar()->prepare("INSERT INTO usuario(nombre,apellido,especialidad,telefono,empresa,urlimagen)VALUES('$nombres','$apellidos','$especialidad','$telefono','$empresa','$urlImagen')");

                if ($objRespuesta->execute()) {
                    $respuesta = true;
                }
            } catch (Exception $e) {
                $respuesta =  $e;
            }
        }

        return $respuesta;
    }

    
    // Metodo encargado de subir archivos
    public static function subirArchivo($objArchivo)
    {
        $respuesta = "";
        $ruta = "../archivos/";
        $nombreImagen = $objArchivo['name'];
        $logitudTotal = strlen($nombreImagen);
        $extencion = substr($nombreImagen, $logitudTotal - 4, $logitudTotal);

        if ($extencion == ".jpg" || $extencion == ".png" || $extencion == "jpeg") {
            if (move_uploaded_file($objArchivo['tmp_name'], $ruta . $nombreImagen)) {
                $respuesta = "";
            } else {
                $respuesta = "error al subir el archivo";
            }
        } else {
            $respuesta = "no es posible subir archivos diferentes a  .jpg,.png,.jpeg";
        }

        return $respuesta;
    }

}
