<?php
require_once "controladores/usuariosControlador.php";
require_once "modelos/usuariosModelo.php";

$objusuarios = usuariosControlador::fnCtrCargarUsuarios();
$totalUsuarios = 0;
$mayor = 0;
foreach ($objusuarios as $key => $value) {
    $id = $value['id'];
    $cedula = $value['cedula'];
    $nombre = $value['username'];
    $password = $value['password'];
    $ficha = $value['ficha'];

}

    echo "Usuario: " . $nombre . " ";
    echo "password: " . $password . " ";
    echo "cedula: " . $cedula . " ";
    echo "ficha: " . $ficha . " ";