<?php
include_once "conexion.php";

class usuariosModelo
{

    // metodo de listar todos los usuarios
    public static function fnMdlCargarUsuarios()
    {
        $objRespuesta = Conexion::conectar()->prepare("SELECT usuario.idusuario,usuario.cedula,usuario.nombre,usuario.apellido,usuario.telefono,usuario.user,usuario.pass,usuario.rol_idrol,usuario.urlimagen, rol.idrol,rol.nombrerol FROM usuario INNER JOIN rol ON usuario.rol_idrol = rol.idrol");
        $objRespuesta->execute();
        $objUsuarios = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $objUsuarios;
    }


    // metodo de registrar usuarios
    public static function fnMdlPruebaUsuarios($cedula, $telefono, $user, $pass, $rol){
        $respuesta = "";
        if ($respuesta == ""){
            try {
                $objRespuesta = Conexion::conectar()->prepare("INSERT INTO usuario(cedula,telefono,user,pass,rol_idrol)VALUES('$cedula','$telefono','$user','$pass','$rol')");
                if ($objRespuesta->execute()) {
                    $respuesta = true;
                }
            } catch (Exception $e) {
                $respuesta =  $e;
            }
        return $respuesta;
        }
    }

    // metodo de registrar usuarios
    public static function fnMdlRegistrarUsuarios($cedula, $nombre, $apellido, $telefono, $user, $pass, $rol, $imagen)
    {        $respuesta = usuariosModelo::subirArchivo($imagen);
        $urlImagen = "archivos/" . $imagen['name'];

        if ($respuesta == "") {
            try {
                $objRespuesta = Conexion::conectar()->prepare("INSERT INTO usuario(cedula,nombre,apellido,telefono,user,pass,rol_idrol,urlimagen)VALUES('$cedula','$nombre','$apellido','$telefono','$user','$pass','$rol','$urlImagen')");
                if ($objRespuesta->execute()) {
                    $respuesta = true;
                }
            } catch (Exception $e) {
                $respuesta =  $e;
            }
        }
        return $respuesta;
    }

    
    // metodo para editar usuarios
    public static function fnMdlEditarUsuarios($idUsuario, $cedula, $nombre, $apellido, $telefono, $user, $pass, $rol, $imagen ,$urlAnterior)
    {
        $respuesta = "";
        $urlImagen = "";
        if ($imagen != null){
            $urlImagen = "archivos/" . $imagen['name'];
            $respuesta = usuariosModelo::subirArchivo($imagen);
        }else{
            $urlImagen = $urlAnterior;
        }
        if ($respuesta == ""){
            try {
                $objRespuesta = Conexion::conectar()->prepare("UPDATE usuario SET cedula = '$cedula',nombre = '$nombre',apellido='$apellido',telefono='$telefono',user='$user',pass='$pass',rol_idrol='$rol',urlimagen='$urlImagen' WHERE idusuario ='$idUsuario'");
                if ($objRespuesta->execute()) {
                    $respuesta = true;
                    usuariosModelo::eliminarArchivo($urlAnterior);
                }
            } catch (Exception $e) {
                $respuesta =  $e;
            }
        }
        return $respuesta;
    }

    // eliminar usuarios
    public static function fnMdlEliminarUsuarios($idUsuario,$imagen){
        $respuesta = "";
        if ($imagen != null){
            $respuesta = usuariosModelo::eliminarArchivo($imagen);
        }

        if ($respuesta == ""){
            try {
                $objRespuesta = Conexion::conectar()->prepare("DELETE FROM usuario WHERE idusuario=:$idUsuario");
                $objRespuesta->bindParam(":".$idUsuario,$idUsuario);
                if ($objRespuesta->execute()) {
                    $respuesta = true;
                }

            } catch (Exception $e) {
                $respuesta = $e;
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


    // metodo para eliminar archivos
    public static function eliminarArchivo($urlAnterior){
        $respuesta = "";
        if ($urlAnterior != ""){
            try {
                $respuesta = unlink("../".$urlAnterior);
                if (!$respuesta){
                    $respuesta = "error al eliminar el archivo,no se encontro en el directorio";
                }else{
                    $respuesta = "";
                }
            } catch (Exception $e) {
                $respuesta = $e;
            }
        }
        return $respuesta;
    }

    public static function fnMdlCargarSelect(){
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM rol");
        $objRespuesta->execute();
        $objUsuarios = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $objUsuarios;
    }

}
