<?php

// incluimos archivos para generar archivos pdf //
require_once('tcpdf_include.php');

// creamos el documento pdf //
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// informacion pdf
$pdf->SetCreator('Marco Antonio Cipagauta');
$pdf->SetAuthor('Marco Antonio');
$pdf->SetTitle('Informe Usuarios');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remover cabecera y pie por defecto
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// iipo de fuente
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Establecer fuente monoespaciado predeterminada
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Establecer margenes
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// Saltos de pagina automaticos 
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// agregar una pagina
$pdf->AddPage();

$html = <<<EOO
<div style="text-aling: right; font-size: 18px">
    Informe de Usuarios Registrados
    <hr>
</div>
<h3>Hola mundo</h3>
EOO;


include_once "../../../modelos/usuariosModelo.php";
$objRespuesta = usuariosModelo::fnMdlCargarUsuarios();


$html .= <<<EOD
<table>
EOD;

foreach ($objRespuesta as $key => $value) {
    $nombre = $value["nombres"];
    $apellidos = $value["apellidos"];
    $telefono = $value["telefono"];
    $ruta = "../../../".$value["urlimagen"];

    $html .= <<<EOD
        <tr>
            <td width="170">
                <img src="$ruta" height="100" width="150">
                <br>
            </td>
            <td width="370">
                <div style="text-aling: left; color: red">
                    Informacion General
                </div>
                <div>
                    <i> Nombres: $nombre $apellidos</i>
                    <br>
                    <i> telefono: $telefono</i>
                    <br>
                    <i> ruta: $ruta </i>
                </div>
            </td>
        </tr>
    EOD;
}

$html .= <<<EOD
</table>
EOD;


// Imprimir texto usando writeHTMLCell ()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


// Cerrar y generar documento PDF
$pdf->Output('Informe Usuarios.pdf', 'I');