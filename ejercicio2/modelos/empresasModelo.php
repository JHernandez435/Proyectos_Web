<?php
include_once "conexion.php";

class empresasModelo
{

    // metodo de listar todos los empresas
    public static function fnMdlCargarEmpresas()
    {
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM empresa");
        $objRespuesta->execute();
        $objEmpresas = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $objEmpresas;
    }
    //TODO metodo de listar todos los empresas
    public static function fnMdlCargarEmpleado()
    {
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM empresa INNER JOIN usuario ON usuario.empresa=empresa.idempresa");
        $objRespuesta->execute();
        $objEmpresas = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $objEmpresas;
    }

    // metodo de registrar usuarios
    public static function fnMdlRegistrarEmpresas($nombres, $direccion, $telefono, $correo, $imagen)
    {
        $respuesta = empresasModelo::subirArchivo($imagen);
        $urlImagen = "archivos/" . $imagen['name'];

        if ($respuesta == "") {
            try {
                $objRespuesta = Conexion::conectar()->prepare("INSERT INTO empresa(nombre,direccion,telefono,correo,urlimagen)VALUES('$nombres','$direccion','$telefono','$correo','$urlImagen')");

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
