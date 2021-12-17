<?php
include_once "../controlador/productosControlador.php";
include_once "../modelos/productosModelo.php";


class productosAjax{

    public $listaProductos;

    public function actualizarProductos(){
        $objRespuesta = productosControlador::ctrActualizarProductos($this->listaProductos);
        $respuesta['resultado'] = array($objRespuesta);
        echo json_encode($respuesta);
    }

}

if (isset($_POST["listaCarrito"])){
    $objProductos = new productosAjax();
    $objProductos->listaProductos =  json_decode($_POST["listaCarrito"]);
    $objProductos->actualizarProductos();
}