<?php

include_once "vistas/modulos/cabecera.php";

if (isset($_GET["ruta"])){
   if ($_GET["ruta"] == "inicio" ||
       $_GET["ruta"] == "quienesSomos" ||
       $_GET["ruta"] == "contactenos"){

        include_once "vistas/modulos/".$_GET["ruta"].".php";

   }else{
        include_once "vistas/modulos/404.php";
   }

}else{
    include_once "vistas/modulos/inicio.php";
}



include_once "vistas/modulos/pie.php";