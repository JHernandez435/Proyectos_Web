<?php
include_once "conexion.php";

class empresasModelo
{
 // metodo de listar empresas
 public static function fnMdlCargarEmpresas()
 {
     $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM empresa");
     $objRespuesta->execute();
     $objUsuarios = $objRespuesta->fetchAll();
     $objRespuesta = null;
     return $objUsuarios;
 }

 public static function fnMdlCargarUsuariosEmpresas()
 {
     $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM empresa INNER JOIN
      usuario  ON usuario.empresa=empresa.idempresa ");
     $objRespuesta->execute();
     $objUsuarios = $objRespuesta->fetchAll();
     $objRespuesta = null;
     return $objUsuarios;
 }

  // metodo de registrar empresas
  public static function fnMdlRegistrarEmpresas($nombre, $direccion)
  {
      $respuesta = "";

      if ($respuesta == "") {
          try {
              $objRespuesta = Conexion::conectar()->prepare("INSERT INTO empresa(nombre,direccion)VALUES('$nombre','$direccion')");
              if ($objRespuesta->execute()) {
                  $respuesta = true;
              }
          } catch (Exception $e) {
              $respuesta =  $e;
          }
      }

      return $respuesta;
  }

 

}