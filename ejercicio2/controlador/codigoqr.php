<?php 
require "../phpqrcode/qrlib.php";    

class codigoqr{ 

    public $idusuario;
    public $nombres;

    public function generarqr(){
        $dir = '../archivos/';

        if (!file_exists($dir))
        mkdir($dir);

        $filename = $dir.$this->nombres.'test.png';

        $tamaño = 8; //Tamaño de Pixel
	    $level = 'H'; //Precisión Baja
	    $framSize = 3; //Tamaño en blanco
	    $contenido =  $this->nombres ; //Texto

        QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 

        $respuesta['resultado']=array($dir.basename($filename));

        echo json_encode($respuesta);
    }
}
	
if(isset($_POST["idusuarioqr"])){
    $objqr= new codigoqr();
    $objqr->idusuario=$_POST["idusuarioqr"];
    $objqr->nombres=$_POST["nombreqr"];
    $objqr->generarqr();
}