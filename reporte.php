<?php
    //-----------------------------------------------------------------------------------
    //    Ejemplo básico de utilización de fPDF
    //-----------------------------------------------------------------------------------
    require('fpdf/fpdf.php');
  //  include('bd/conex.php');  

    $pdf=new FPDF(); 
    $pdf->AddPage();
   // $pdf->Cell(40,10,'Hola Mundo!'); 
   // Inserta un logo en la esquina superior izquierda a 300 ppp
$pdf->Image('_img/banner2.png',10,10,190,-120);

$str_conexao='dbname=dictamun port=5432 user=postgres password=12345';
$conexao=pg_connect($str_conexao) or die('lA conexion ao banco de dados falhou!');
$folio = pg_exec($conexao,'SELECT max(id_con)ultimo FROM contribuyentedatos_v2;');
$folio2 = pg_result($folio,'ultimo');

$consulta=pg_exec($conexao,'select a.id_con,a.id_dictaminador, a.nombredenominacion, a.apaterno, a.amaterno, a.fecha_registro,
 d.nombre as dictaminador, a.rfc,
d.ap_paterno as ap_paterno2, d.ap_materno as ap_materno2, d.rfc as rfc2, 
b.cve_catastral, b.valor_catastral, 
c.calle, c.no_exterior ,c.no_interior, c.colonia, c.codigo_p, c.referencia1, 
d.rfc as rcf2, 
b.aniodictaminar, e.nombre as tipoDictamen 
from contribuyentedatos_v2 as a 
join inmuebles_v2 as b on a.id_inmueble = b.id_inmueble
join domicilio_v2 as c on b.id_domicilio = c.id_domicilio
join dictaminadores_v2 as d on a.id_dictaminador = d.no_reg_autorizado
join dictamen_tipo_v2 as e on a.tipodictamen = e.id_tipo
WHERE id_con=43');
 $numregs=pg_numrows($consulta); 
//$pdf->Cell(40,10,$numregs);
//Build table
/*$fill=false;
$i=0;
while($i<$numregs)
{
    $siape=pg_result($consulta,$i,'id_contribuyente');
    $nome=pg_result($consulta,$i,'nombre');
    $pdf->Cell(20,40,$siape,1,0,'R',$fill); 
    $pdf->Cell(50,40,$nome,1,1,'L',$fill);
    $fill=!$fill;
    $i++; 
} */ 
    $pdf->SetFont('Arial','B',14);
	$pdf->Cell(50,50,'            ACUSE DE PRESENTACION DEL AVISO DE DICTAMEN SOBRE LA',0,0,'L',0,0);
	$pdf->Cell(50,63,'                               DETERMINACION DE LA BASE DEL IMPUESTO PREDIAL',0,0,'C',0,0);
	$pdf->Multicell(0,2,""); 
	$pdf->SetFont('Arial','B',12);
	$nome=pg_result($consulta,0,'nombredenominacion');
	$a_paterno=pg_result($consulta,0,'apaterno');
	$a_materno=pg_result($consulta,0,'amaterno'); 
    $pdf->Cell(0,90,utf8_decode('Contribuyente:                                           '.$nome.' '.$a_paterno.' '.$a_materno),0,0,'L',0,0);
    //$pdf->Multicell(0,2,"This is a multi-line text string\nNew line\nNew line");
    $rfc=pg_result($consulta,0,'rfc'); 
    $pdf->Multicell(0,2,""); 
    $pdf->Cell(0,100,'RFC:                                                            '.$rfc,0,0,'L',0,0);

    $pdf->Multicell(0,2,""); 
    $folio=pg_result($consulta,0,'id_con');
    $pdf->Cell(0,110,utf8_decode('Folio de Presentación:                              AD/').$folio.'/2020',0,0,'L',0,0);
    $pdf->Multicell(0,2,"");
    $fechaHora=pg_result($consulta,0,'fecha_registro');
 	$pdf->Cell(0,120,utf8_decode('Fecha y Hora de Presentación:                ').$fechaHora,0,0,'L',0,0);

 	$pdf->Multicell(0,2,"");
    $anioDic=pg_result($consulta,0,'anioDictaminar');
 	$pdf->Cell(0,130,utf8_decode('Año a Dictaminar:                                      ').$anioDic,0,0,'L',0,0); 
 	$pdf->Multicell(0,2,"");
    $tipoD=pg_result($consulta,0,'tipoDictamen');
 	$pdf->Cell(0,140,'Tipo de Dictamen:                                      '.$tipoD,0,0,'L',0,0);   
 	$pdf->Multicell(0,2,"");
    //$anioDic=pg_result($consulta,0,'');
 	$pdf->Cell(0,150,utf8_decode('Tipo de Presentación:                               A'),0,0,'L',0,0);
 	
 	$pdf->Multicell(0,2,"");
    $dictaminador=pg_result($consulta,0,'dictaminador');
    $apDic=pg_result($consulta,0,'ap_paterno2');
    $amDic=pg_result($consulta,0,'ap_materno2');
 	$pdf->Cell(0,160,utf8_decode('Dictaminador:                                            '.$dictaminador.' '.$apDic.' '.$amDic),0,0,'L',0,0);
 	$pdf->Multicell(0,2,"");
    $rfc2=pg_result($consulta,0,'rfc2');
 	$pdf->Cell(0,170,'RFC:                                                            '.$rfc2,0,0,'L',0,0);
 	$pdf->Multicell(0,2,"");
    //$anioDic=pg_result($consulta,0,'');
 	$pdf->Cell(0,180,'No. Registro:                                             A',0,0,'L',0,0);
       
 	$pdf->Multicell(0,2,"");
    //$anioDic=pg_result($consulta,0,'');

 	$pdf->Cell(0,230,'Inmuebles Objetos a Dictaminar               ',0,0,'L',0,0);
  //  for ($i=0; $i <=$numregs ; $i++) { 
    //    $cont = $i ; 
 	$clab=pg_result($consulta,0,'cve_catastral'); 
 	$valor=pg_result($consulta,0,'valor_catastral');

 	$pdf->Multicell(0,125,"");
    $pdf->Cell(25,10,'',0,0,'C');
 	$pdf->Cell(20,10,'No.',1,0,'C'); 
    $pdf->Cell(60,10,'Clave Catastral',1,0,'C');
    $pdf->Cell(60,10,'Valor Catastral.',1,0,'C'); 
    $pdf->Cell(25,10,'',0,0,'C');
    $pdf->ln(); 
    $pdf->Cell(25,20,'',0,0,'C'); 
    $pdf->Cell(20,20,'1',1,0,'C');    
    $pdf->Cell(60,20,$clab,1,0,'C');
    $pdf->Cell(60,20,$valor,1,0,'C'); 
    $pdf->Cell(25,20,'',0,0,'C'); 
    $pdf->Multicell(0,23,"");
    //Datos del Domicilio
    $calle=pg_result($consulta,0,'calle');
    $noEx=pg_result($consulta,0,'no_exterior');
    $noInt=pg_result($consulta,0,'no_interior');
    $colonia=pg_result($consulta,0,'colonia');
    //$muni=pg_result($consulta,0,'municipio');
    $cp=pg_result($consulta,0,'codigo_p');
    $ref1=pg_result($consulta,0,'referencia1');
    //$ref2=pg_result($consulta,0,'referencia2');
    $pdf->Cell(60,10,'Domicilio: ',0,0); 
    $pdf->ln(); 
    $pdf->Cell(60,10,'Calle '.$calle.' No.'.$noEx.', Interior: '.$noInt.',  Colonia '.$colonia.' C.P: '.$cp,0,0);
    $pdf->ln(); 
    $pdf->Cell(60,10,'Municipio: ',0,0); 
    $pdf->ln(); 
   // $pdf->Cell(60,10,'Referencias: '.$ref1.' y '.$ref2,0,0); 
    $pdf->Cell(60,10,'Referencias: '.$ref1,0,0); 
// }

$pdf->Output();
 ?>