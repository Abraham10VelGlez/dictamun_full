
<?php

$totales =$_GET['num'];
$totOrdenes = explode("-", $totales);
$totOr = $totOrdenes[0];
$folTodo = $totOrdenes[1]; 
require_once 'tcpdf/tcpdf.php';
$page_formate = array('MediaBox' => array('llx' => 0, 'lly' => 0, 'urx' => 180, 'ury' => 180));
$pdf = new TCPDF('P', 'mm', $page_formate, true, 'UTF-8', false);


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

// set auto page break
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->AddPage(); 
$pdf->Image('_img/encabezadoDoc.PNG',10,6,160,20);
//$str_conexao='host=10.10.68.31 dbname=dictamun port=5432 user=postgres password=j7cr3a';
//$str_conexao='host=localhost dbname=dictamun port=5432 user=postgres password=Igecem2018';
//$conexao=pg_connect($str_conexao) or die('lA conexion ao banco de dados falhou!');


//$consulta=pg_exec($conexao,'');
 //$numregs=pg_numrows($consulta);

$dia = date('d');
$mes = date('n');
$anio = date('Y'); 
$mes2 = "";

if ($mes == 1) {
	$mes2="Enero";
}else if ($mes == 2) {
	$mes2="Febrero";
}else if ($mes == 3) {
	$mes2="Marzo";
}else if ($mes == 4) {
	$mes2="Abril";
}else if ($mes == 5) {
	$mes2="Mayo";
}else if ($mes == 6) {
	$mes2="Junio";
}else if ($mes == 7) {
	$mes2="Julio";
}else if ($mes == 8) {
	$mes2="Agosto";
}else if ($mes == 9) {
	$mes2="Septiembre";
}else if ($mes == 10) {
	$mes2="Octubre";
}else if ($mes == 11) {
	$mes2="Noviembre";
}else if ($mes == 12) {
	$mes2="Diciembre";
}




$txt = <<<EOD
<p style="text-align: center; font-size: small;">2020. “Año de Laura Méndez de Cuenca; emblema de la mujer mexiquense”</p>
<br>
<p style="text-align: right; font-size: x-small;">Toluca de Lerdo, México, $mes2 $dia de $anio<br>
<b style="text-align: right; font-size: x-small; font-weight: bold;">$folTodo</b></p><br>
EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$txt3 = <<<EOD
<p style="text-align: left; font-size: small; font-weight: bold;"><b>LIC. JOSE GOMEZ PLATA<br>
DIRECTOR DE SERVICIOS DE INFORMACIÓN<br>
P R E S E N T E
</b>
<br></p>
EOD;

$pdf->writeHTML($txt3, true, false, false, false, '');

$txt4 = <<<EOD
<p style="text-align: justify; font-size: small;">A efecto de dar cumplimiento a lo que establece las Normas Generales en Materia Catastral para Dictaminar la Determinación de la Base del Impuesto Predial del Instituto de Información e Investigación Geográfica, Estadística y Catastral del Estado de México (IGECEM), aprobado por el Consejo Directivo del Instituto, anexo me permito enviar a usted, la relación y documentación de $totOr órdenes de pagos, para su cobro y entrega a los correspondientes Especialistas en Valuación Inmobiliaria Registrado ante el Instituto.</p>
<br>
<p style="text-align: justify; font-size: small;">Sin otro particular, le envío un cordial saludo.</p>
<br>
<p style="text-align: center; font-size: small; font-weight: bold;">A T E N T A M E N T E.</p><br>
<br><br><br>
EOD;

$pdf->writeHTML($txt4, true, false, false, false, '');

$txt5 = <<<EOD
<p style="text-align: center; font-size: small; font-weight: bold;">AARÓN LÓPEZ RIVERA<br>
DIRECTOR DE CATASTRO
</p>
<br>
<p style="text-align: left; font-size: xx-small;">C.c.p. Archivo</p>
EOD;

$pdf->writeHTML($txt5, true, false, false, false, '');


$pdf_name='Oficio_OrdenesDePago.pdf';
$foliotoemail = 'Oficio_OrdenesDePago'.$totOr.'.pdf';
ob_end_clean();
$pdf->Output("C:/xampp/htdocs/dictamun/oficios/".$foliotoemail, 'F');
$pdf->Output($pdf_name, 'I');
?>