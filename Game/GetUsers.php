<?php
require_once "controladores/usuariosControlador.php";
require_once "modelos/usuariosModelo.php";

    $objusuarios = usuariosControlador::fnCtrCargarUsuarios();
    $totalUsuarios = 0;
    $mayor = 0;
    foreach ($objusuarios as $key => $value) {
        $id = $value['id'];
        $nombre = $value['username'];
        $password = $value['password'];
        $level = $value['level'];
        $coins = $value['coins'];
    }

    echo "Usuario: " . $nombre . " ";
    echo "password: " . $password . " ";
    echo "level: " . $level . " ";
    echo "coins: " . $coins . " ";
