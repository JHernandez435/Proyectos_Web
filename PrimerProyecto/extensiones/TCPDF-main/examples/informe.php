<?php
// incluimos libreria para generar  archivos pdf
require_once('tcpdf_include.php');

//creamos el documento pdf
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Informacion del documento
$pdf->SetCreator('Carlos Felipe Valbuena');
$pdf->SetAuthor('Felipe Valbuena');
$pdf->SetTitle('Informde Usuarios');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('informe, PDF, usuarios');

// remover cabezera y pie por defecto
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// establcer fuente monoespaciado predeterminado
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//establecer margenes
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

//crear saltos de pagina automaticos
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//agregar pagina
$pdf->AddPage();
$html = <<<EOD
<div style="text-aling: rigth: font-size: 18px">
    Informe De Usuarios Registrados
    <hr>
</div>
EOD;

include_once "../../../modelos/usuariosModelo.php";
$objRespuesta = usuariosModelo ::fnMdlCargarUsuarios();



$html .=<<<EOD
<table>
EOD;

foreach($objRespuesta as $key  =>$value){
    $nombre = $value["nombres"];
    $apellido = $value["apellidos"];
    $telefono = $value]["telefono"];
    $imagen = $value["urlimagen"];
    $html .= <<<EOD
    <h1>$nombre  $apellido  </h1>
    <div> <img src="../../../$imagen" style="width:200px;"> </div>
EOD;
}

$html .=<<<EOD
</table>
EOD;






//imprimiir texto usando writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


$pdf->Output('informe de usuarios.pdf','I');
