<?php

ob_start();

 $folio = $_GET["var"];
include '../../bd/conex.php';
$conexao = $coxx;

$consulta=pg_exec($conexao,'

select a.id_con,a.id_dictaminador, UPPER(a.nombredenominacion) as nombredenominacion, UPPER(a.apaterno) as apaterno, UPPER(a.amaterno) as amaterno, a.fecha_registro,
 UPPER(d.nombre) as dictaminador, UPPER(a.rfc) as rfc,
UPPER(d.ap_paterno) as ap_paterno2, UPPER(d.ap_materno) as ap_materno2, UPPER(d.rfc) as rfc2,
b.cve_catastral, b.valor_catastral,
UPPER(c.calle) as calle , UPPER(c.no_exterior) as no_exterior ,UPPER(c.no_interior) as no_interior, UPPER(c.colonia) as colonia, c.codigo_p, UPPER(c.referencia1) as referencia1,
UPPER(d.rfc) as rcf2, d.no_reg_autorizado,
b.aniodictaminar, UPPER(e.nombre) as tipoDictamen, a.tipod, a.folio,UPPER(d.nombre_especialista) as nombre_especialista,
a.nombrerep ,a.apaternorep ,a.amaternorep, rfcrep , curprep
from (select * from contribuyentedatos_v2 where folio = '.$folio.') as a
join (select * from inmuebles_v2 where folio = '.$folio.') as b on a.folio = b.folio

join domicilio_v2 as c on b.id_domicilio = c.id_domicilio

join (select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as d on a.id_dictaminador = d.no_reg_autorizado

join dictamen_tipo_v2 as e on a.tipodictamen = e.id_tipo

WHERE d.tipo_usuariofk =2 and a.folio='.$folio);


$numregs=pg_numrows($consulta);

$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$days = $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');



$folioPresentacion=pg_result($consulta,0,'folio');
$anioAc = date("Y");
$folioCompleto=str_pad($folioPresentacion, 5, "0", STR_PAD_LEFT);
$anioAdictaminar=pg_result($consulta,0,'aniodictaminar');
$folioPresentacion = "AD/".$folioCompleto."/".$anioAdictaminar;


$fechaHora = pg_result($consulta,0,'fecha_registro');

$date = date_create($fechaHora);
$fecha_h = date_format($date,"d/m/Y h:i:s");

$fisicaMoral=pg_result($consulta,0,'tipod');
if ($fisicaMoral == 1) {
$contribuyente=pg_result($consulta,0,'nombredenominacion');
$aPaterno=$a_paterno=pg_result($consulta,0,'apaterno');
$aMaterno=$a_paterno=pg_result($consulta,0,'amaterno');

$nombreCompleto = $contribuyente." ".$aPaterno." ".$aMaterno;
$nombreCompleto = strtoupper($nombreCompleto);

}else if ($fisicaMoral == 2) {
$nombreCompleto=pg_result($consulta,0,'nombredenominacion');
$nombreCompleto = strtoupper($nombreCompleto);
}

//echo $nombreCompleto;
$rfcContri=pg_result($consulta,0,'rfc');
$rfcContri = strtoupper($rfcContri);
$noRegistro=pg_result($consulta,0,'no_reg_autorizado');
$dictaminador=pg_result($consulta,0,'nombre_especialista');
$gg = mb_strtoupper($dictaminador,'UTF-8');
$rfcDic=pg_result($consulta,0,'rfc2');
$TipoDic=pg_result($consulta,0,'tipodictamen');


$TipoDic=pg_result($consulta,0,'tipodictamen');
if ($TipoDic == 'NORMAL') {
 $descripcion='Obligatorio, Unicamente por tener uno o más inmuebles con valor catastral igual o superior a $20,000,000.00';

}else if ($TipoDic == 'COMPLEMENTARIO') {
 $descripcion='Obligatorio, por tener inmuebles con valor catastral igual o superior a $5,000,000.00 y que en suma tiene un valor catastral igual o superior a $20,000,000.00';

}else if ($TipoDic == 'NORMAL*') {
 $descripcion='Opcional, de acuerdo con el artículo 47 bis tercer párrafo del código financiero del estado de México y municipios';

}else if ($TipoDic == 'COMPLEMENTARIO ADICIONAL') {
	 $descripcion='Opcional, de acuerdo con el artículo 47 bis tercer párrafo del código financiero del estado de México y municipios.';

}
$mmm = mb_strtoupper($descripcion,'UTF-8');

// datos de representante legal

$representante1=pg_result($consulta,0,'nombrerep');
$representante2=pg_result($consulta,0,'apaternorep');
$representante3=pg_result($consulta,0,'amaternorep');
$representanteFinish = $representante1 ." ". $representante2." ".$representante3;

$rfcReprest=pg_result($consulta,0,'rfcrep');
$rfcReprest = strtoupper($rfcReprest);
$curpReprest = pg_result($consulta,0,'curprep');
$curpReprest = strtoupper($curpReprest);
$QR = "";

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information

// set default header data


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// NOTE: 2D barcode algorithms must be implemented on 2dbarcode.php class file.


// add a page
$pdf->AddPage();



$pdf->SetFont('helvetica', '', 10);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// set style for barcode
$style = array(

);

// write RAW 2D Barcode

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

$imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');

// The '@' character is used to indicate that follows an image data stream and not an image file name

$pdf->Image('images/tcpdf_logo3.jpg', 15, 5, 182, 17, 'JPG','' , '', true, 150, '', false, false, 0, false, false, false);

$html_tittle = '
<center style="text-align: center;">
<h3 style="text-align: center;">ACUSE DE PRESENTACION DEL AVISO DE DICTAMEN SOBRE LA<br>
DETERMINACION DE LA BASE DEL IMPUESTO PREDIAL</h3>
</center>';
$pdf->writeHTML($html_tittle, true, 0, true, 0);
$html_fechas = '<html>
<body style="font-size: 12px;">
<br>
<p style="text-align: right;font-size: 8px;" id="fechayhora" name="fechayhora" >
<meta charset="utf-8">
'.$days.'
</p><br><br>';
$pdf->writeHTML($html_fechas, true,0, true, 0);


$html_datos1 = '
<p style="text-align: left;font-size: 8px;">Folio de presentación:
'.$folioPresentacion.'
</p>
<p style="text-align: left;font-size: 8px;">Año a dictaminar:
'.$anioAdictaminar.'
</p>

<p style="text-align: left;font-size: 8px;">Fecha y hora de aviso presentación:
'.$fecha_h.'
</p>';
$pdf->writeHTML($html_datos1, true,0, true, 0);



$html_Datos2 ='
<br>
<h4 style="font-size: 12px;"> DATOS DEL CONTRIBUYENTE </h4>
<p style="text-align: left;font-size: 8px;">Contribuyente:
 '.$nombreCompleto.'
</p>
<p style="text-align: left;font-size: 8px;">RFC:
'.$rfcContri.'
</p>

<br>
<p style="text-align: right;font-size: 8px;"  >
<meta charset="utf-8">
'.$QR.'
</p>
<br>
<br>
';

/*
$folio_encrypt = password_hash($folioCompleto, PASSWORD_DEFAULT);
$vowels1 = array("/");
$onlyconsonants1 = str_replace($vowels1, "_igcm", $folio_encrypt );
$vowels2 = array("$");
$onlyconsonants2 = str_replace($vowels2, "_igcem2", $onlyconsonants1 );
$vowels3 = array( ".");
$onlyconsonants3 = str_replace($vowels3, "_3igEcem", $onlyconsonants2 );
$vowels4 = array(",");
$onlyconsonants4 = str_replace($vowels4, "_ig4", $onlyconsonants3 );

*/

function encrypt($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;

      
   }
   return base64_encode($result);
}

$cadena_encriptada = encrypt($folioCompleto,"IGECEM_IGECEM2");
//$curp_encrypt = password_hash($curpReprest, PASSWORD_DEFAULT);
//$rfc_encrypt = password_hash($rfcReprest, PASSWORD_DEFAULT);
$pdf->writeHTML($html_Datos2, true,0, true, 0);
//$pdf->write2DBarcode('https://dictamunigecem.edomex.gob.mx/pdfx/certificationIGECEM/'.$folioCompleto.'/'.$curp_encrypt.'/'.$rfc_encrypt, 'QRCODE,M', 165, 75, 25, 25, $style, 'N');
$pdf->write2DBarcode('https://dictamunigecem.edomex.gob.mx/pdfx/certificationIGECEM/'.$cadena_encriptada, 'QRCODE,M', 165, 75, 25, 25, $style, 'N');


$html_Datos3 = '
<br>
<h4 style="font-size: 12px;"> DATOS DEL REPRESENTANTE LEGAL </h4>
<p style="text-align: left;font-size: 8px;">Nombre:
'.$representanteFinish.'
</p>
<p style="text-align: left;font-size: 8px;">CURP:
'.$curpReprest.'
</p>
<p style="text-align: left;font-size: 8px;">RFC:
'.$rfcReprest.'
</p>
<br>
';
$pdf->writeHTML($html_Datos3, true,0, true, 0);


$html_Datos4 ='
<h4 style="font-size: 12px;">DATOS DEL DICTAMINADOR</h4>

<p style="text-align: left;font-size: 8px;">No. Registro:
'.$noRegistro.'
</p>
<p style="text-align: left;font-size: 8px;">Dictaminador:
'.$gg.'
</p>
<p style="text-align: left;font-size: 8px;">RFC:
'.$rfcDic.'
 </p>
<br>
<p style="text-align: left;font-size: 8px;">Tipo de dictamen: '.$TipoDic.' </p>
<p style="text-align: left;font-size: 8px;">Tipo de presentación:
 '.$mmm.'
</p>
<center>
<h5 style="text-align: center;font-size: 12px;">INMUEBLES OBJETOS A DICTAMINAR</h5>
</center>
<br>
<center>';
$pdf->writeHTML($html_Datos4, true,0, true, 0);

$html ='

<table  border="1" style="text-align: center; font-size: 8px;">

<tr bgcolor="#CCCCCC">
    <td style="width:5%;text-align: center ;  ">No.</td>
    <td style="width:18%;text-align: center;  ">Clave catastral</td>
    <td style="width:18%;text-align: center;  ">Valor catastral</td>
    <td style="width:59%;text-align: center;  ">Domicilio del Estado de México</td>

</tr>
';

		$num = 0;
		$tbl = "";
		for ($i=0; $i < $numregs; $i++) {
			$num = $i + 1;
			$claveCa=pg_result($consulta,$i,'cve_catastral');
			$valorCa=pg_result($consulta,$i,'valor_catastral');

			$calle=pg_result($consulta,$i,'calle');
			$NoExt=pg_result($consulta,$i,'no_exterior');
			$NoInt=pg_result($consulta,$i,'no_interior');
			$colonia=pg_result($consulta,$i,'colonia');

			$cp=pg_result($consulta,$i,'codigo_p');
			$referencia=pg_result($consulta,$i,'referencia1');

			$tbl.= '
		<tr>
				<td style="width:5%;text-align: center;" >'.$num.'</td>
				<td style="width:18%;text-align: center;">'.$claveCa.'</td>
				<td style="width:18%;text-align: center;">$ '.$valorCa.'</td>
				<td style="width:59%;text-align: center;">Calle: '.$calle.' ,No.Exterior: '.$NoExt.' ,No.Interior: '.$NoInt .',Colonia: '.$colonia.' ,CP: '.$cp .',Referencias: '.$referencia.'</td>
		</tr>';
$html2 = $tbl;

		}
		$html3 = '
</table>
</center>
</body>
</html>';
$html5 = $html.$html2.$html3;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html5, 0, 1, 0, true, '', true);

/*$html_Datos5 ='
<p style="text-align: left;font-size: 8px;">
&nbsp;
</p>
<p style="text-align: left;font-size: 8px;">
&nbsp;
</p>
<center>
<h5 style="text-align: center;font-size: 12px;">____________________________</h5>
</center>
<center>
<h5 style="text-align: center;font-size: 12px;">Dirección de Catastro,IGECEM</h5>
</center>
<br>
<center>';
$pdf->writeHTML($html_Datos5, true,0, true, 0);*/


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('AcuseDeDictamen.pdf', 'I');

die();
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator("AVG");
$pdf->SetAuthor('MTRO ABRAHAMVG');
$pdf->SetTitle('AcuseDeDictamen');
$pdf->SetSubject('DICTAMUN');
$pdf->SetKeywords('TCPDF, PDF, AcuseDeDictamen, avg, avg');

// set default header data

$pdf->SetHeaderData('../images/tcpdf_logo.jpg', 180,20,  '', true, 50, '', false, false, 1, false, false, false);


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/spa.php')) {
	require_once(dirname(__FILE__).'/lang/spa.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print

ob_start();

 $folio = $_GET["var"];
include '../../bd/conex.php';
$conexao = $coxx;

$consulta=pg_exec($conexao,'

select a.id_con,a.id_dictaminador, UPPER(a.nombredenominacion) as nombredenominacion, UPPER(a.apaterno) as apaterno, UPPER(a.amaterno) as amaterno, a.fecha_registro,
 UPPER(d.nombre) as dictaminador, UPPER(a.rfc) as rfc,
UPPER(d.ap_paterno) as ap_paterno2, UPPER(d.ap_materno) as ap_materno2, UPPER(d.rfc) as rfc2,
b.cve_catastral, b.valor_catastral,
UPPER(c.calle) as calle , UPPER(c.no_exterior) as no_exterior ,UPPER(c.no_interior) as no_interior, UPPER(c.colonia) as colonia, c.codigo_p, UPPER(c.referencia1) as referencia1,
UPPER(d.rfc) as rcf2, d.no_reg_autorizado,
b.aniodictaminar, UPPER(e.nombre) as tipoDictamen, a.tipod, a.folio,UPPER(d.nombre_especialista) as nombre_especialista,
a.nombrerep ,a.apaternorep ,a.amaternorep, rfcrep , curprep
from (select * from contribuyentedatos_v2 where folio = '.$folio.') as a
join (select * from inmuebles_v2 where folio = '.$folio.') as b on a.folio = b.folio

join domicilio_v2 as c on b.id_domicilio = c.id_domicilio

join (select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as d on a.id_dictaminador = d.no_reg_autorizado

join dictamen_tipo_v2 as e on a.tipodictamen = e.id_tipo

WHERE d.tipo_usuariofk =2 and a.folio='.$folio);

$numregs=pg_numrows($consulta);

$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$days = $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');



$folioPresentacion=pg_result($consulta,0,'folio');
$anioAc = date("Y");
$folioCompleto=str_pad($folioPresentacion, 5, "0", STR_PAD_LEFT);
$anioAdictaminar=pg_result($consulta,0,'aniodictaminar');
$folioPresentacion = "AD/".$folioCompleto."/".$anioAdictaminar;


$fechaHora = pg_result($consulta,0,'fecha_registro');

$date = date_create($fechaHora);
$fecha_h = date_format($date,"d/m/Y h:i:s");

$fisicaMoral=pg_result($consulta,0,'tipod');
if ($fisicaMoral == 1) {
$contribuyente=pg_result($consulta,0,'nombredenominacion');
$aPaterno=$a_paterno=pg_result($consulta,0,'apaterno');
$aMaterno=$a_paterno=pg_result($consulta,0,'amaterno');

$nombreCompleto = $contribuyente." ".$aPaterno." ".$aMaterno;
$nombreCompleto = strtoupper($nombreCompleto);

}else if ($fisicaMoral == 2) {
$nombreCompleto=pg_result($consulta,0,'nombredenominacion');
$nombreCompleto = strtoupper($nombreCompleto);
}

//echo $nombreCompleto;
$rfcContri=pg_result($consulta,0,'rfc');
$rfcContri = strtoupper($rfcContri);
$noRegistro=pg_result($consulta,0,'no_reg_autorizado');
$dictaminador=pg_result($consulta,0,'nombre_especialista');
$gg = mb_strtoupper($dictaminador,'UTF-8');
$rfcDic=pg_result($consulta,0,'rfc2');
$TipoDic=pg_result($consulta,0,'tipodictamen');


$TipoDic=pg_result($consulta,0,'tipodictamen');
if ($TipoDic == 'NORMAL') {
 $descripcion='Obligatorio, Unicamente por tener uno o más inmuebles con valor catastral igual o superior a $20,000,000.00';

}else if ($TipoDic == 'COMPLEMENTARIO') {
 $descripcion='Obligatorio, por tener inmuebles con valor catastral igual o superior a $5,000,000.00 y que en suma tiene un valor catastral igual o superior a $20,000,000.00';

}else if ($TipoDic == 'NORMAL*') {
 $descripcion='Opcional, de acuerdo con el artículo 47 bis tercer párrafo del código financiero del estado de México y municipios';

}else if ($TipoDic == 'COMPLEMENTARIO ADICIONAL') {
	 $descripcion='Opcional, de acuerdo con el artículo 47 bis tercer párrafo del código financiero del estado de México y municipios.';

}
$mmm = mb_strtoupper($descripcion,'UTF-8');

// datos de representante legal

$representante1=pg_result($consulta,0,'nombrerep');
$representante2=pg_result($consulta,0,'apaternorep');
$representante3=pg_result($consulta,0,'amaternorep');
$representanteFinish = $representante1 ." ". $representante2." ".$representante3;

$rfcReprest=pg_result($consulta,0,'rfcrep');
$rfcReprest = strtoupper($rfcReprest);
$curpReprest = pg_result($consulta,0,'curprep');
$curpReprest = strtoupper($curpReprest);


$QR = "";
//$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,L', 180, 24, 250, 250);
$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,Q', 180, 50, 250, 250);


$html ='
<html>
<body style="font-size: 12px;">

<center>
<img alt="" width="800px;" src="../_img/banner2.png">
</center>
<center style="text-align: center;">
<h4 style="text-align: center;">ACUSE DE PRESENTACION DEL AVISO DE DICTAMEN SOBRE LA<br>
DETERMINACION DE LA BASE DEL IMPUESTO PREDIAL</h4>
</center>
<br>
<p style="text-align: right;font-size: 8px;" id="fechayhora" name="fechayhora" >
<meta charset="utf-8">
'.$days.'
</p>

<p style="text-align: left;font-size: 8px;">Folio de presentación:
'.$folioPresentacion.'
</p>
<p style="text-align: left;font-size: 8px;">Año a dictaminar:
'.$anioAdictaminar.'
</p>

<p style="text-align: left;font-size: 8px;">Fecha y hora de aviso presentación:
'.$fecha_h.'
</p>
<br>
<p style="text-align: right;font-size: 8px;"  >
<meta charset="utf-8"> hsjhkjsdf
'.$QR.'
</p>
<br>
<h4 style="font-size: 12px;"> DATOS DEL CONTRIBUYENTE </h4>
<p style="text-align: left;font-size: 8px;">Contribuyente:
 '.$nombreCompleto.'
</p>
<p style="text-align: left;font-size: 8px;">RFC:
'.$rfcContri.'
</p>

<br>
<p style="text-align: right;font-size: 8px;"  >
<meta charset="utf-8"> hsjhkjsdf
'.$QR.'
</p>
<br>

<h4 style="font-size: 12px;"> DATOS DEL REPRESENTANTE LEGAL </h4>
<p style="text-align: left;font-size: 8px;">Nombre:
'.$representanteFinish.'
</p>
<p style="text-align: left;font-size: 8px;">CURP:
'.$curpReprest.'
</p>
<p style="text-align: left;font-size: 8px;">RFC:
'.$rfcReprest.'
</p>
<br>
<p style="text-align: right;font-size: 8px;" id="fechayhora" name="fechayhora" >
<meta charset="utf-8"> hsjhkjsdf
'.$QR.'
</p>
<br>
<h4 style="font-size: 12px;">DATOS DEL DICTAMINADOR</h4>

<p style="text-align: left;font-size: 8px;">No. Registro:
'.$noRegistro.'
</p>
<p style="text-align: left;font-size: 8px;">Dictaminador:
'.$gg.'
</p>
<p style="text-align: left;font-size: 8px;">RFC:
'.$rfcDic.'
 </p>
<br>
<p style="text-align: left;font-size: 8px;">Tipo de dictamen: '.$TipoDic.' </p>
<p style="text-align: left;font-size: 8px;">Tipo de presentación:
 '.$mmm.'
</p>
<center>
<h5 style="text-align: center;font-size: 12px;">INMUEBLES OBJETOS A DICTAMINAR</h5>
</center>
<br>
<center>
<table  border="1" style="text-align: center; font-size: 8px;">

    <tr bgcolor="#CCCCCC">
        <td>No.</td>
        <td>Clave catastral</td>
        <td>Valor catastral</td>
        <td>Domicilio del Estado de México</td>

    </tr>
';

		$num = 0;
		$tbl = "";
		for ($i=0; $i < $numregs; $i++) {
			$num = $i + 1;
			$claveCa=pg_result($consulta,$i,'cve_catastral');
			$valorCa=pg_result($consulta,$i,'valor_catastral');

			$calle=pg_result($consulta,$i,'calle');
			$NoExt=pg_result($consulta,$i,'no_exterior');
			$NoInt=pg_result($consulta,$i,'no_interior');
			$colonia=pg_result($consulta,$i,'colonia');

			$cp=pg_result($consulta,$i,'codigo_p');
			$referencia=pg_result($consulta,$i,'referencia1');

			$tbl.= '
		<tr>
				<td style="width:5%;text-align: center;" >'.$num.'</td>
				<td style="width:18%;text-align: center;">'.$claveCa.'</td>
				<td style="width:18%;text-align: center;">$ '.$valorCa.'</td>
				<td style="width:59%;text-align: center;">Calle: '.$calle.' ,No.Exterior: '.$NoExt.' ,No.Interior: '.$NoInt .',Colonia: '.$colonia.' ,CP: '.$cp .',Referencias: '.$referencia.'</td>
		</tr>';
$html2 = $tbl;

		}
		$html3 = '
</table>
</center>
</body>
</html>';
$html5 = $html.$html2.$html3;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html5, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
