<?php
include_once "conexion.php";

class productosModelo{

    public static function mdlActualizarProductos($listaProductos){

        $respuesta = "";
        $mensaje = "";
        $totalElementos = count($listaProductos);
        for ($i=0; $i < $totalElementos; $i++) { 
            $idProducto = $listaProductos[$i]->idproductos;
            $cantidadStock = intval($listaProductos[$i]->cantidadStock);
            $cantidadCompra = intval($listaProductos[$i]->cantidades);
            $nuevoStock = $cantidadStock - $cantidadCompra;


            $objRespuesta = Conexion::conectar()->prepare("UPDATE productos SET cantidad='$nuevoStock' WHERE idproductos ='$idProducto'");
        }

        // if ($i = $totalElementos){
        //     //$i = $totalElementos
        //     $respuesta = "actualizado";
        // }
        if ($objRespuesta->execute()) {
            $respuesta = true;
        }

        //return $mensaje;
        return $respuesta;

    }

}