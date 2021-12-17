<?php

// incluimos libreria  para generar archivos pdf
require_once('tcpdf_include.php');

// creamos el documento pdf
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//informacion del documento
$pdf->SetCreator('Ana Maria ');
$pdf->SetAuthor('Ana Maria');
$pdf->SetTitle('Carnet');
$pdf->SetSubject('Terminos y condiciones'); //breve descriccion 
$pdf->SetKeywords('Informe , PDF, usuarios, test, guide');


// remover cabecera y pie por defecto
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);


// establecer fuete monoespaciada predeterminada
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// establecer margenes 
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);


//salto de pagina auto
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// agregar una pagina 
$pdf->AddPage();
 
echo '<script type="text/javascript">'
   , '$("#tablaEjemplo").on("click", "#btnEditar", function() {

    var idUsuario = $(this).attr("idUsuario");
    var nombres = $(this).attr("nombres");
    $("#txtEditarNombres").val(nombres);
    alert(nombres);

})'
   , '</script>'
;

$html= <<<EOD
<div style="text-align: right; font-size: 18px">
Carnet
<hr>
</div>
EOD;



$html .= <<<EOD
<table>
EOD;



    $html .= <<<EOD
    <tr>
    <td width="20">
    
    <br>
    </td>
    <td width="496">
            
            <div>
            <div class="form-group">
                            <label for="txtNombres">Nombres:</label>
                            <input type="text" class="form-control" id="txtEditarNombress">
                            <div class="errores" id="valida-txtNombres"></div>
               </div>
            </div>
        </td>
    </tr>  
    EOD;
    
$html .= <<<EOD
</table>
<hr>
EOD;

// Imprimir texto usado writeHTMLcell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// Cerrar y generar documentos PDF
$pdf->Output('informe usuarios.pdf', 'I');
