<?php

class productosControlador{


    public static function ctrActualizarProductos($listaProductos){
        $objRespuesta = productosModelo::mdlActualizarProductos($listaProductos);
        return $objRespuesta;
    }



}